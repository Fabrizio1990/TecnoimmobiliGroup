<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class StatisticsDataManager extends DbManager implements IDbManager {

    const defTable  = "session_visitators";
    private $currTable;

    public function __construct($conn = null) {
        parent::__construct($conn);
        $this->currTable = self::defTable;
    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array("session_id","ip","browser","platform","aol_version","is_mobile","is_robot");

        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values,$printQuery);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
        return $ret;
    }


    public function update($fields,$params,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::update($this->currTable,$fields,$params,$values,$extra_params,$printQuery);
        return $ret;
    }

    public function delete($params = null,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params,$printQuery);
        return $ret;
    }



    public function getVisitatorsChartData($fromDate,$toDate){
        $ret = $this->executeQuery("CALL `new_tecnoimmobili`.`ChartVisits`('".$fromDate."','".$toDate."');");

        return $ret;
    }

    public function getBrowsersChartData(){
        $ret = $this->executeQuery("CALL `new_tecnoimmobili`.`ChartBrowser`();");
        return $ret;
    }

    public function setDefTable(){
        $this->currTable = self::defTable;
    }





}


