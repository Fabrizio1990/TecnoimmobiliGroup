<?php

$dir = dirname(__FILE__);

require_once(BASE_PATH . "/app/classes/DbManager.php");

class OptionsConversionManager extends DbManager{

    const defTable  = "prt_feed_conversion_categories";
    private $currTable;
    private $conversionList;


    public function __construct($conn = null) {
        parent::__construct($conn);
        $this->currTable = self::defTable;
        $this->getConversionsList();
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

    public function delete($params = null,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params,$printQuery);
        return $ret;
    }



    public function portalNameToId($portalName){
        $this->currTable = "prt_portals";
        $ret =$this->read("name = ?",null,array($portalName),"id",false);
        if(count($ret)>0)
            return $ret[0]["id"];
        else
            return 0;
    }



    public function saveConversion($id_portal,$categoryId,$defVal,$convertedVal,$printQuery = false){
        $query = "select `new_tecnoimmobili`.`prt_save_conversion`(".$id_portal.", '".$categoryId."', '".$defVal."', '".$convertedVal."')";
        if($printQuery)
            echo $query;

        $ret = $this->executeQuery($query);
        return $ret;
    }

    public function deleteConversion($id_conversion,$printQuery = false){

        $this->currTable = "prt_feed_field_conversion";
        $ret = $this->delete("id = ?",array($id_conversion),null,$printQuery);
        $this->setDefTable();
        return $ret;

    }

    //GET ALL CONVERSION SAVED ON PORTAL
    public function getPortalConversions($id_portal){
        $order = "order by category_id";
        $this->currTable = "prt_feed_field_conversion";
        $ret = $this->read("id_portal = ?",$order,array($id_portal),null,false);
        $this->setDefTable();
        return $ret;

    }



    // GET THE CATEGORY OPTIONS
    public function getConversionCategoryOpts($idSelected = ""){
        $options = "";
        foreach ($this->conversionList as $item) {
            $optionName = $item["name"];
            $optionValue = $item["id"];
            $selected = $optionValue == $idSelected ? " selected ":"";
            $options .= "<option $selected value='".$optionValue."'>$optionName</option>";
        }

        return $options;
    }

    public function getConversionFieldOpts($categoryId,$idSelected = ""){
        $options = "";

        $table = $this->categoryIdToTable($categoryId);
        $table = $table["reference_table"];
        $this->currTable = $table;
        $fieldToSearch = $this->getConversionFieldFromTable($table);

        $res = $this->read(null,array("order by ".$fieldToSearch[1]),null,$fieldToSearch,false);
        foreach ($res as $item){
            $value = $item[0];
            $selected = $idSelected == $value ?" Selected ":"";
            $options.="<option $selected value='".$item[0]."'>". $item[1] ."</option>";
        }

        $this->setDefTable();
        return $options;
    }

        // GET ALL CONVERSION CATEGORY LIST AND PUT INTO ARRAY USED FROM OTHER PART OF THIS CLASS
    private function getConversionsList(){
        $this->conversionList = $this->read();
    }

    private function categoryIdToTable($catId){
        $ret ="";
        $this->currTable = "prt_feed_conversion_categories";
        $ret = $this->read("id = ?",null,array($catId),null,false);

        $this->setDefTable();
        return $ret[0];
    }

    private function getConversionFieldFromTable($table){
        //$ret = array("value"=>"id","text"=>"title");
        $ret = array("id","title");
        foreach ($this->conversionList as $item) {

            if($item["reference_table"] == $table){
                $ret[0] = $item["reference_field_value"];
                $ret[1] = $item["reference_field_text"];
                return $ret;
            }
        }
        return $ret;
    }




    public function setDefTable(){
        $this->currTable = self::defTable;
    }



}
