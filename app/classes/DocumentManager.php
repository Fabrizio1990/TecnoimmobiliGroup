<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 17:17
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
class DocumentManager extends DbManager implements IDbManager {

    const defTable  = "documents";
    private $currTable;

    public function __construct($conn = null) {
        parent::__construct($conn);
        $this->currTable = self::defTable;
    }
    public function create($values, $fields = null,$printQuery = false)
    {
        $def_fields     = array("title","description","fileName","id_doc_type");
        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values,$printQuery);
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


    public function saveDocument($values, $fields = null,$printQuery = false){
        $ret = $this->create($values,$fields,$printQuery);
        return $ret;
    }

    public function deleteDocumentFromDb($doc_id){

        $this->deleteDocumentFile($doc_id);
        $ret = $this->update("enabled = 0","id=?",array($doc_id));

        return $ret;
    }


    public function deleteDocumentFile($doc_id){

        $doc = $this->getDocuments("id=?",null,array($doc_id));
        $doc_path = BASE_PATH."/".$doc[0]["save_path"]."/".$doc[0]["filename"];
        if(file_exists($doc_path)){
            unlink($doc_path);
        }

    }





    public function getDocuments($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery =false){
        $this->currTable = "document_list";

        $ret = $this->read($params,$extra_params,$values ,$fields,$printQuery);

        $this->setDefTable();

        return $ret;
    }

    public function getAvailableExtensions($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery =false){
        $this->currTable = "documents_types";

        $ret = $this->read("enabled = 1",null,null,"extension",$printQuery);

        $this->setDefTable();

        return $ret;
    }

    public function getPathFromExt($ext){
        $this->currTable = "documents_types";
        $ret = $this->read("extension = ?","limit 1",array($ext),"id,save_path");

        $this->setDefTable();
        return $ret;


    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}
