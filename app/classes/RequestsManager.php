<?php
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class RequestManager extends DbManager implements IDbManager {

    const defTable  = "requests";
    private $currTable;

    public function __construct($conn = null) {
        parent::__construct($conn);
        $this->currTable = self::defTable;
    }
    public function create($values, $fields = null)
    {
        $def_fields     = array();
        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery =false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
        return $ret;
    }

    public function update($fields,$params,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::update($this->currTable,$fields,$params,$values,$extra_params,$printQuery);
        return $ret;
    }

    public function delete($params = null,$values = null,$extra_params = null,$printQuery =false)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params,$printQuery);
        return $ret;
    }

    // SAVE AND UPDATE REQUEST BY MYSQL FUNCTION
    public function saveRequest($id_easywork,$name,$lastname,$email,$telephone,$contracts,$categories,$tipologies,$regions,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$enabled,$id_request = "NULL",$printQuery = false){
      
        $query = "SELECT `new_tecnoimmobili`.`save_request`($id_request,
        $id_easywork,".
        parent::escapeString($name).",".
        parent::escapeString($lastname).",".
        parent::escapeString($email).",".
        parent::escapeString($telephone).",".
        parent::escapeString($contracts).",".
        parent::escapeString($categories).",".
        parent::escapeString($tipologies).",".
        parent::escapeString($regions).",".
        parent::escapeString($cities).",".
        parent::escapeString($towns).",".
        parent::escapeString($districts).",".
        parent::escapeString($price_min).",".
        parent::escapeString($price_max).",".
        parent::escapeString($mq_min).",".
        parent::escapeString($mq_max).",".
        $enabled.") as saved";

        $ret = parent::executeNonQuery($query,$printQuery);

       
        return $ret;

    }



    public function readRequests($id= null){
        $params = "";
        $values = array($id);
        if($id!=null)
            $params = "id = ?";

        $ret = $this->read($params,null,$values);

        return $ret;
    }

    public function readPreferences($id_request,$id_preference = null){
        $this->currTable = "requests_preferences";
        $params = array("id_request = ?");
        $values = array($id_request);
        if($id_preference!= null){
            array_push($params,"id_preference_type = ?");
            array_push($values,$id_preference);
        }
        $ret = $this->read($params,"order by id_preference_type asc",$values);
        $this->setDefTable();
        return $ret;
    }

    public function readPreferencesDesc(){
        $this->currTable = "requests_preferences_descriptions";
        $ret = $this->read(null,"order by id asc",null,array("id","description"),true);

        $this->setDefTable();
        return $ret;
    }

    public function updateStatus($id_request,$status){
        $res = $this->update("enabled = ?","id = ? ",array($status,$id_request),null,false);
        return $res;
    }

    // ############################# EASY WORK FUNCTIONS ############################

    public function requestExistEw($id_easywork,$printQuery = false){
        $this->currTable = "requests";
        $params = "id_easywork = ?";
        $values = array($id_easywork);

        $ret = $this->read($params,null,$values,"Count(id) as cnt",$printQuery);
        $this->setDefTable();
        if($ret[0]["cnt"]>0)
            return true;
        else
            return false;
    }


    public function getRequestIdFromEw($id_easywork,$printQuery = false){
        $this->currTable = "requests";
        $params = "id_easywork = ?";
        $values = array($id_easywork);

        $ret = $this->read($params,null,$values,"id",$printQuery);
        $this->setDefTable();
        return $ret;
    }

    public function deleteRequest($id, $printQuery = false){
        $this->currTable ="requests";
        $ret = $this->delete(array("id = ?"),array($id),null,$printQuery);
        $this->currTable ="requests_preferences";
        $ret = $this->delete(array("id_request = ?"),array($id),null,$printQuery);
        $this->setDefTable();
    }

    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}
