<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 17:17
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
class RequestManager extends DbManager implements IDbManager {

    const defTable  = "requests";
    private $currTable;

    public function __construct() {
        parent::__construct();
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
    public function saveRequest($id_easywork,$name,$lastname,$email,$telephone,$contracts,$categories,$tipologies,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$enabled,$id_request = "NULL"){
        parent::openConnection();// devo aprire la connessione per fare l' escape
        $query = "SELECT `new_tecnoimmobili`.`save_request`($id_request,
        $id_easywork,".
        parent::escapeString($name).",".
        parent::escapeString($lastname).",".
        parent::escapeString($email).",".
        parent::escapeString($telephone).",".
        parent::escapeString($contracts).",".
        parent::escapeString($categories).",".
        parent::escapeString($tipologies).",".
        parent::escapeString($cities).",".
        parent::escapeString($towns).",".
        parent::escapeString($districts).",".
        parent::escapeString($price_min).",".
        parent::escapeString($price_max).",".
        parent::escapeString($mq_min).",".
        parent::escapeString($mq_max).",".
        $enabled.") as saved";

        $ret = parent::executeNonQuery($query);

        parent::closeConnection();
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

    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}
