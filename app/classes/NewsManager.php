<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 17:17
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
//require_once(BASE_PATH."/app/classes/NewsEntity.php");
class NewsManager extends DbManager implements IDbManager {

    const defTable  = "news";
    private $currTable;

    public function NewsManager() {
        $this->currTable = self::defTable;
    }
    public function create($values, $fields = null)
    {
        $def_fields     = array("title","description");
        $fields = $fields == null ? $def_fields : $fields;
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




    /*public function getAllNews(){
        $obj = new NewsEntity();
        $res = $this->read();
        $objRes = parent::resultToEntity($res,$obj);
        return $objRes;
    }*/


}
