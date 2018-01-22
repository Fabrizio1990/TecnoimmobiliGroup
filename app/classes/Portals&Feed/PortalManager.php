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



    public function SavePortalBasicInfo($name,$site,$logo_name,$entries_max,$notes,$enabled = 1){
        $this->currTable = "prt_portals";
        $values = array($name,$site,$logo_name,$entries_max,$notes,$enabled);
        $fields = array("name","site","logo_name","entries_max","notes","enabled");
        $ret = $this->create($values,$fields,true);
        return $this->lastInsertId;
    }

    public function SavePortalLoginInfo($id_portal,$link,$user,$password){
        $this->currTable = "prt_portals";
        $values = array($id_portal,$link,$user,$password);
        $fields = array("id_portal","personal_area_link","login_user","login_psw");
        $ret = $this->create($values,$fields,true);
        return $ret;
    }

    public function SavePortalFtpInfo($id_portal,$ftp_url,$ftp_user,$ftp_password,$enabled){
        $this->currTable = "prt_portal_ftp_info";
        $values = array($id_portal,$ftp_url,$ftp_user,$ftp_password,$enabled);
        $fields = array("id_portal","ftp_url","ftp_user","ftp_password","enabled");
        $ret = $this->create($values,$fields,true);
        return $ret;
    }

    public function SavePortalDocumentation($id_portal,$doc_path,$doc_url){
        $this->currTable = "prt_portal_ftp_info";
        $values = array($id_portal,$doc_path,$doc_url);
        $fields = array("id_portal","doc_path","doc_url");
        $ret = $this->create($values,$fields,true);
        return $ret;
    }


    public function SavePortalContactInfo($id_portal,$contact_name,$contact_email,$contact_phone,$contact_mobile_phone,$contact_address,$contact_city){
        $this->currTable = "prt_portal_ftp_info";
        $values = array($id_portal,$contact_name,$contact_email,$contact_phone,$contact_mobile_phone,$contact_address,$contact_city);
        $fields = array("id_portal","contact_name","contact_email","contact_phone","contact_mobile_phone","contact_address","contact_city");
        $ret = $this->create($values,$fields,true);
        return $ret;
    }

    public function UpdatePortalBasicInfo($id_portal,$name,$site,$logo_name,$entries_max,$notes,$enabled = 1){
        $this->currTable = "prt_portals";

        $ret = "";
        return $ret;
    }


    // TODO FUNZIONI PER UPDATE




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




    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }




}


