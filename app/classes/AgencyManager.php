<?php
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class AgencyManager extends DbManager implements IDbManager
{

    const defTable  = "agencies";
    private $currTable;


    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }

    public function create($values = null,$fields = null,$printQuery = false)
    {
        $def_fields = array("logo_path","banner","name","description","id_country","id_region","id_city","id_town","id_district","street","street_num","competence_area","longitude","latitude","p_iva","fiscal_code","rea","business_register","id_status","id_sub_status","id_portal_status");
        $fields     = $fields == null ? $def_fields : $fields;
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




    public function saveAgency($values = null,$fields = null,$printQuery = false){

        $ret = $this->create($values,$fields,$printQuery);
        if($ret=="" || $ret == null)// se va in errore ritorno ret che sarà vuoto e scatenerà l ' errore
            return "errore - Salvataggio Agenzia fallito";

        $ret = $this->lastInsertId;

        return $ret;
    }


    public function updateAgency($values,$params = null,$extraParams = null,$fields = null,$printQuery = false){

        $def_fields = array("logo_path = ?","banner = ?","name = ?","description = ?","id_country = ?","id_region = ?","id_city = ?","id_town = ?","id_district = ?","street = ?","street_num = ?","competence_area = ?","longitude = ?","latitude = ?","p_iva = ?","fiscal_code= ?","rea = ?","business_register = ?","id_status = ?","id_sub_status = ?","id_portal_status = ?","date_up = ?");
        $fields = $fields == null ? $def_fields : $fields;

        $ret = $this->update($fields,$params,$values,$extraParams,$printQuery);

        return $ret;
    }


    public function saveAgenciesPortalLimit($portalID,$maxLimits,$printQuery = false){
        $agList = $this->getAgenciesData();
        $notAllowed = $this->read(array("id_status <> 1 or id_portal_status <> 1"));
        $notAllowedCnt = count($notAllowed);
        $propertiesXAgency = 0;
        $missings = 0;
        if($maxLimits > 0 ){
            $propertiesXAgency = floor($maxLimits / (count($agList)-$notAllowedCnt));
            $missings = $maxLimits - ($propertiesXAgency * (count($agList)-$notAllowedCnt));

        }
        foreach ($agList as $agency){
            $agencyID = $agency["id"];

            //se agenzia disabilitata diabilito il record su prt_portal_agencies_info
            if($agency["id_status"] != "1" || $agency["id_portal_status"] != "1"){
                $this->currTable= "prt_portal_agencies_info";
                $this->update("enabled = 0,max_properties_on = 0",array("id_portal = ?","id_agency= ?"),array($portalID,$agencyID),null,true);
                $this->setDefTable();
            //altrimenti chiamo la SP che aggiunge il record o ne fa l' update
            }else{
                $limit = $agency["id"] == 1?$propertiesXAgency + $missings: $propertiesXAgency;
                $query = "call prt_save_agency_limits(".$portalID.",".$agency["id"].",".$limit.")";
                parent::executeNonQuery($query,$printQuery);
            }
        }
        return 1;
    }


    public function getAgenciesData($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){
        $this->currTable = "agencies_list";
        $ret = $this->read($params,$extra_params,$values ,$fields,$printQuery);
        $this->setDefTable();
        return $ret;
    }


    public function getOperators($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){
        $this->currTable = "agency_operators";
        $ret = $this->read($params,$extra_params,$values ,$fields,$printQuery);
        $this->setDefTable();
        return $ret;
    }

    public function updateStatus($idAgency,$status){
        require_once(BASE_PATH."/app/classes/UserManager.php");
        $usrMng = new UserManager();
        $ret = $this->update(array("id_status = ?","id_portal_status =?"),"id = ?" ,array($status,$status,$idAgency));
        return $ret;
    }

    public function changePropertiesOwner($idFrom,$idTo){
        $this->currTable ="property_agencies";
        $ret = $this->update(array("id_agency_previous = id_agency","id_agency = ?"),"id_agency = ?",array($idTo,$idFrom),null,false);
        $this->setDefTable();
        return $ret;
    }

    public function restorePropertiesOwner($idAgencyOwner){
        $this->currTable ="property_agencies";
        $ret = $this->update(array("id_agency_previous = Null","id_agency = ?"),"id_agency_previous = ?",array($idAgencyOwner,$idAgencyOwner),null,true);
        $this->setDefTable();
        return $ret;
    }

    public function GetRandomAgenciesData($numOfAgencies)
    {
        $this->currTable = "randomagencydata";
        $res = $this->read(null, "limit $numOfAgencies");
        return $res;
    }



    public function setDefTable(){
        $this->currTable = self::defTable;
    }
}