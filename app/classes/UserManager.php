<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 16:31
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
require_once(BASE_PATH."/app/classes/UserEntity.php");
require_once(BASE_PATH."/app/classes/SessionManager.php");
class UserManager extends DbManager implements IDbManager
{
    const defTable  = "agencies";
    private $currTable;


    public function NewsManager() {
        $this->currTable = self::defTable;
    }

    public function create($values = null,$fields = null,$printQuery = false)
    {
        $def_fields = array("id_user_type","logo_path","banner","name","description","id_country","id_region","id_city","id_town","id_district","street","street_num","p_iva","phone","mobile_phone","skype","email","password","fax","isonline","date_ins");
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


    public function getAllAgencies(){

        $query = "SELECT 
                  t1.logo_path,
                  t1.name,(SELECT group_concat(t2.name,' ',t2.lastName) FROM agency_operators AS t2 WHERE id_agency = t1.id ORDER BY t2.name,t2.lastname DESC) AS operators, 
                  (select group_concat(t2.id) from agency_operators as t2 where id_agency = t1.id order by t2.name,t2.lastname desc) as operators_ids 
                  FROM agencies AS t1
 WHERE t1.status = 1 ";
        $ret = parent::executeQuery($query);
        //var_dump($ret);
        return $ret;
    }



    public function checkLogin($username,$password){
        $conn = $this::openConnection();
        $ret = null;

        $this->currTable = "login_view";

        $res = $this->read(array("email = ?","password = ?"),array("limit 1"),array($username,sha1($password)),array("id","id_user_type","id_agent","logo_path","banner","name","id_country","id_region","id_city","id_town","email","agent_name","agent_lastname"));
        //var_dump($res);

        if($this::isRecordFound($res)){
            //echo("trovato");
            $entity = new UserEntity();
            $ret = parent::resultToEntity($res[0],$entity);
            $retOn = $this->setOnline($res[0]["id_agent"]);
        }

        $this->setDefTable();
        return $ret;
    }

    public function loginAs($id){
            $conn = $this::openConnection();
            $ret = null;

            $this->currTable = "login_view";

            $res = $this->read(array("id_agent = ?"),array("limit 1"),array($id),array("id","id_user_type","id_agent","logo_path","banner","name","id_country","id_region","id_city","id_town","email","agent_name","agent_lastname"));
            if($this::isRecordFound($res)){
                $entity = new UserEntity();
                $ret = parent::resultToEntity($res[0],$entity);
                $this->setOnline($res[0]["id_agent"]);
            }

            $this->setDefTable();
            return $ret;
    }

    //SET ONLINE STATUS ON DB
    public function setOnline($id_agent){
        $this->currTable = "agency_operators";
        return $this->update("isonline = ?","id = ?",array(1,$id_agent));
        $this->setDefTable();
    }

    //SET OFFLINE STATUS ON DB
    public function setOffline($id){
        $this->setDefTable();
        return $this->update(array("isonline = ?"),"id = ?",array(0,$id));
    }


    public function toggleOnlineStatus($id){
        $ret = parent::executeSp("toggleStatus","?,?,?",array("agencies","isonline",$id));
        return $ret;
    }


    public function countProperties($id_operator = -1,$property_status = -1){
        $query = "Call CountProperties($id_operator,$property_status)";
        $res = parent::executeQuery($query);
        $this->setDefTable();
        return $res;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}