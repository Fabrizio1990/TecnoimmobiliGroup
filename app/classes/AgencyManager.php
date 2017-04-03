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
        $def_fields = array("logo_path","banner","name","description","id_country","id_region","id_city","id_town","id_district","street","street_num","longitude","latitude","p_iva","fiscal_code","rea","business_register","id_status","id_sub_status","id_portal_status");
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

        $def_fields = array("logo_path = ?","banner = ?","name = ?","description = ?","id_country = ?","id_region = ?","id_city = ?","id_town = ?","id_district = ?","street = ?","street_num = ?","longitude = ?","latitude = ?","p_iva = ?","fiscal_code= ?","rea = ?","business_register = ?","id_status = ?","id_sub_status = ?","id_portal_status = ?","date_up = ?");
        $fields = $fields == null ? $def_fields : $fields;

        $ret = $this->update($fields,$params,$values,$extraParams,$printQuery);

        return $ret;
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






    public function setDefTable(){
        $this->currTable = self::defTable;
    }
}