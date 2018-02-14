<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class PortalManager extends DbManager implements IDbManager {

    const defTable  = "prt_portals";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array(); // TODO METTI I CAMPI DI DEFAULT

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



    public function SavePortalBasicInfo($id_portal,$name,$site,$logo_name,$entries_max,$notes,$enabled = 1,$printQuery = false){
        // TODO QUESTA è L UNICA FUNZIONE CHE DOVREBBE RICEVERE UN EVENTUALE ID PORTALE PER CONTROLLARE SE è NECESSARIO L' UPDATE O NO

        $query = "SELECT `prt_save_basic_info`($id_portal,".
            parent::escapeString($name).",".
            parent::escapeString($site).",".
            parent::escapeString($logo_name).",".
            $entries_max.",".
            parent::escapeString($notes).",".
            $enabled.") as retId";

        $ret = parent::executeNonQuery($query,$printQuery);

        return $ret[0]["retId"];


    }

    public function SavePortalContractInfo($id_portal,$start,$end,$price,$enabled = true,$printQuery = false){

        $query = "CALL `prt_save_contract_info`($id_portal,".
            parent::escapeString($start).",".
            parent::escapeString($end).",".
            $price.",".
            $enabled.")";

        $ret = parent::executeNonQuery($query,$printQuery);


        return $ret;

    }

    public function SavePortalLoginInfo($id_portal,$link,$user,$password,$enabled = 1,$printQuery = false){

        $query = "CALL `prt_save_login_info`($id_portal,".
            parent::escapeString($link).",".
            parent::escapeString($user).",".
            parent::escapeString($password).",".
            $enabled.")";

        $ret = parent::executeNonQuery($query,$printQuery);

        return $ret;

    }

    public function SavePortalFtpInfo($id_portal,$ftp_link,$ftp_user,$ftp_password,$enabled = 1,$printQuery = false){

        $query = "CALL `prt_save_ftp_info`($id_portal,".
            parent::escapeString($ftp_link).",".
            parent::escapeString($ftp_user).",".
            parent::escapeString($ftp_password).",".
            $enabled.")";

        $ret = parent::executeNonQuery($query,$printQuery);

        return $ret;

    }

    public function SavePortalDocumentation($id_portal,$doc_path,$doc_url,$printQuery = false){


        $query = "CALL `prt_save_documentation`($id_portal,".
            parent::escapeString($doc_path).",".
            parent::escapeString($doc_url).")";

        $ret = parent::executeNonQuery($query,$printQuery);

        return $ret;

    }


    public function SavePortalContactInfo($id_portal,$contactName,$contactEmail,$contactPhone,$contactMobile,$contactAddress,$contactCity,$printQuery = false){


        $query = "CALL `prt_save_contact_info`($id_portal,".
            parent::escapeString($contactName).",".
            parent::escapeString($contactEmail).",".
            parent::escapeString($contactPhone).",".
            parent::escapeString($contactMobile).",".
            parent::escapeString($contactAddress).",".
            parent::escapeString($contactCity).")";

        $ret = parent::executeNonQuery($query,$printQuery);

        return $ret;

    }






    public function getPortalList(){

        $this->currTable = "portals_view";
        $portals = $this->read();
        $this->setDefTable();

        return $portals;

    }

    public function getPortalDetails($idPortal){
        $this->currTable = "portal_details";
        $portals = $this->read("id_portal = ?",null,array($idPortal));
        $this->setDefTable();

        return $portals;
    }


    public function clearFeedList($portal_id){

        $this->executeQuery("Call prt_delete_feeds($portal_id)");
    }

    public function addFeed($portal_id,$feed_name,$feed_folder,$filter_field,$filter_value,$notes){
        $this->currTable = "prt_feeds";
        // TODO IL VALUES "1" che è il feed file type deve essere settato da tendina
        $ret = $this->create(array($portal_id,$feed_folder,$feed_name,"1",$filter_field,$filter_value,$notes),array("id_portal","feed_folder","feed_name","feed_type","filter_field","filter_value","notes"));
        $this->setDefTable();
        return $ret;
    }




    public function readPortalFeeds($portalID){
        $this->currTable = "prt_feeds";
        $ret = $this->read("id_portal =?",null,array($portalID));
        $this->setDefTable();
        return $ret;
    }

    public function setNewPropertiesLimit($portalID,$newLimit){
        $this->setTable("prt_portals");
        $ret = $this->update("entries_max = ?","id = ?",array($newLimit,$portalID));
        $this->setDefTable();
        return $ret;
    }

    public function setPortalStatus($portalID,$newStatus){
        $this->setTable("prt_portals");
        $ret = $this->update("enabled = ?","id = ?",array($newStatus,$portalID));
        $this->setDefTable();
        return $ret;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }




}


