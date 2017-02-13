<?php 

/*$dir = dirname(__FILE__);*/
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
require_once(BASE_PATH."/app/classes/statistics/Browser.php");
require_once(BASE_PATH."/app/classes/DbManager.php");


class NavigationStatistics extends DbManager{
	

	private $guest_id;
	private $guest_ip;
	private $request_time;
	private $guest_current_page;
	private $guest_prev_page;
	private $guest_browser;
	private $guest_browser_version;
	private $guest_platform;
	private $guest_AOL_version;
	private $guest_is_mobile;
	private $guest_is_robot;

    public $conn = null;
	

	
	//======================================================================================================================================================================================================================
	//							START USER NAVIGATION RECORDING 
	//======================================================================================================================================================================================================================
	public function Start(){

		$this->getUserInfo();
		
		if($this->guest_browser == "GoogleBot" && $this->guest_browser!="MSN Bot" && $this->guest_browser!="Yahoo! Slurp")return;
		
		$this->initDb();
		
		if(!isset($_COOKIE["guest_id"])){
			$unique_id 				= uniqid();
			setcookie("guest_id", $unique_id, mktime(24,0,0));
			$_COOKIE['guest_id'] 	= $unique_id;
			$this->guest_id 		= $unique_id;
			//SE LE TABELLE NON ESISTONO LE CREO
			
			// SE NUOVO UTENTE LO SALVO
			$this->saveNewUser();
		}else{
			$this->guest_id 		= $_COOKIE["guest_id"];
		}
		
		$this->saveNavigation();
        parent::openConnection();
	}
	
	public function saveNewUser(){

		$query = "INSERT IGNORE INTO session_visitators  	
				(session_id,ip,browser,browser_version,platform,
				aol_version,is_mobile,is_robot,date)
				VALUES
				('" . $this->guest_id . "','".$this->guest_ip . "','" . $this->guest_browser . "','" . $this->guest_browser_version . "','" . $this->guest_platform ."' ,'" . $this->guest_AOL_version ."','" . $this->guest_is_mobile ."','" . $this->guest_is_robot ."','".$this->request_time."');";
		//Flog::logError($query,"test.php");
		parent::executeNonQuery($query);
			//Flog::logError($query. " - error saving new guest -> ".mysqli_error($this->conn),"navigationStatistic.php");
	 }
	 
	public function saveNavigation(){
		 $query = "INSERT INTO session_pages_visited (session_id,prev_page,current_page) values('".$this->guest_id."','".$this->guest_prev_page."','".$this->guest_current_page."')";
		 //echo $query;
		 parent::executeNonQuery($query);
			 //Flog::logError("error saving statistic".mysqli_error($this->conn),"navigationStatistic.php");
	}

	/* --------------------------------------------
	---------------- GET VISITATOR COUNT ---------
	---------------------------------------------*/
	function getVisitatorCount($date_start,$date_end =null){
		$start_day_time = " 00:00:01";
		$end_day_time = " 23:59:59";
		
		$query = "select count(id) as CNT from session_visitators where browser not in('Yahoo! Slurp','MSN Bot','GoogleBot') AND `date` between ";
		$query.= " '" . $date_start . $start_day_time . "' " ;
		$query.= " AND '" . ($date_end==null?$date_start:$date_end) . $end_day_time . "' " ;

		$res = parent::executeQuery($query);

		return $res[0]["CNT"];
	}
	
	function getPageVisitors($page,$date_start,$date_end =null){
		$start_day_time = " 00:00:01";
		$end_day_time = " 23:59:59";
		
		$query = "select count(distinct session_id) as CNT from session_pages_visited where current_page='".$page."' ";

		$query.= " AND date >='" . $date_start . $start_day_time . "' " ;
		$query.= " AND date <='" . ($date_end==null?$date_start:$date_end) . $end_day_time . "' " ;
		
		//echo($query);
		$res = parent::executeQuery($query);

        return $res[0]["CNT"];
	}
	/* retrive the user info */
	private function getUserInfo(){
		$this->guest_ip = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:0;
		
		$this->request_time = isset($_SERVER['REQUEST_TIME'])?date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME']):date("Y-m-d H:i:s");
		
		$this->guest_current_page = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$this->guest_prev_page = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:0;
		if ($this->guest_prev_page == "") {
			$this->guest_prev_page = "direct";
		}
		$browser = new Browser();
		$this->guest_browser 			= $browser->getBrowser();
		$this->guest_browser_version 	= $browser->getVersion();
		$this->guest_platform 			= $browser->getPlatform();
		$this->guest_AOL_version 		= $browser->isAol()?$browser->getAolVersion():Null;
		$this->guest_is_mobile 			= intval($browser->isMobile());
		$this->guest_is_mobile 			= intval($browser->isRobot());
		$this->guest_is_robot 			= intval($browser->isRobot());
	}
	
	 
	function initDb(){

		$query = "CREATE TABLE IF NOT EXISTS session_pages_visited (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  session_id varchar(100) CHARACTER SET utf8 DEFAULT NULL,
				  prev_page varchar(200) CHARACTER SET utf8 DEFAULT NULL,
				  current_page varchar(200) CHARACTER SET utf8 DEFAULT NULL,
				  date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (id),
				  KEY SESSION_ID_INDEX (session_id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

		$query .= "CREATE TABLE IF NOT EXISTS session_visitators (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  session_id varchar(45) CHARACTER SET utf8 DEFAULT NULL,
				  ip varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
				  browser varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				  browser_version varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
				  platform varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				  aol_version varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
				  is_mobile tinyint(4) DEFAULT NULL,
				  is_robot tinyint(4) DEFAULT NULL,
				  date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (id),
				  UNIQUE KEY session_id_UNIQUE (session_id),
				  KEY session_id_INDEX (session_id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		
		parent::executeNonQuery($query);


	}
}
