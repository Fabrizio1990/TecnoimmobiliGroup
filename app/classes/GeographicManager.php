<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 16:31
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
class GeographicManager extends DbManager implements IDbManager
{

    const defTable  = "geographic_view";
    private $currTable;

    public function GeographicManager() {
        $this->currTable = self::defTable;
    }

    public function create($values = null)
    {
        $fields     = "id_stato,stato,id_regione,regione,id_provincia,provincia,id_comune,comune,istat,id_zona,zona,cap";
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



    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}