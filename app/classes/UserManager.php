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

    public function create($values = null)
    {
        $fields     = "title,description";
        $ret = parent::create($this->currTable,$fields,$values);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields);
        return $ret;
    }


    public function update($fields,$params,$values = null,$extra_params = null)
    {
        $ret = parent::update($this->currTable,$fields,$params,$values,$extra_params);
        return $ret;
    }

    public function delete($params = null,$values = null,$extra_params = null)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params);
        return $ret;
    }

    public function checkLogin($username,$password){
        $ret = false;
        $conn = $this::openConnection();
        $ret = null;

        $this->currTable = "login_view";

        $res = $this->read(array("email = ?","password = ?"),array("limit 1"),array($username,sha1($password)),array("id","id_user_type","logo_path","banner","name","id_country","id_region","id_city","id_town","email","operator_name","operator_lastname"));

        if($this::isRecordFound($res)){
            $entity = new UserEntity();
            $ret = $this->resultToEntity($res[0],$entity);
        }

        $this->setDefTable();
        return $ret;
    }

    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}