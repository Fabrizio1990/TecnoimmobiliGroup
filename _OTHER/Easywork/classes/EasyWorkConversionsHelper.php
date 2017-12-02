<?php
require_once(BASE_PATH . "/app/interfaces/IDbManager.php");
require_once(BASE_PATH . "/app/classes/DbManager.php");

class EasyWorkConversionsHelper extends DbManager implements IDbManager {

    const defTable  = "property_tipologies";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }

    public function create($values = null,$fields = null,$printQuery = false)
    {
        $def_fields = "";
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


    public function TextToId($field,$text){
        $this->currTable = $field;

        $idRet = $this->read("title=?",null,array($text),"id",false);
        if(Count($idRet)>0)
            $ret = $idRet[0]["id"];
        $this->setDefTable();
        return $ret;
    }



    public function TipologyIdFromText($fieldTxt){
        $ret ="";
        $this->currTable = "property_tipologies";
        $idRet = $this->read("title=?",null,array($fieldTxt),"id",false);
        if(Count($idRet)>0)
            $ret = $idRet[0]["id"];
        $this->setDefTable();
        return $ret;
    }

    public function CategoryIdFromText($fieldTxt){
        $ret ="";
        $this->currTable = "property_categories";
        $idRet = $this->read("title=?",null,array($fieldTxt),"id",false);
        if(Count($idRet)>0)
            $ret = $idRet[0]["id"];
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


