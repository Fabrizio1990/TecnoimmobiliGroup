<?php

$dir = dirname(__FILE__);

require_once(BASE_PATH."/app/classes/DbManager.php");

class OptionsManager extends DbManager{

    const defTable  = "properties";
    private $currTable;

    public function OptionsManager() {
        $this->currTable = self::defTable;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields);
        return $ret;
    }

    function readOptions($what,$id_parent = null){
        $params = null;
        $fields = null;
        $conditionPlaceholders = "?";
        // NEED TO CHECK IF ALREADY SENT AN ARRAY, IF NOT THE VARIABLE MUST BE CONVERTED TO ARRAY
        // BECOUSE SOMETIMES I SEND MORE VALUES BY JAVASCRIPT (ES SELECT MULTIPLE)
        // AND I NEED TO EXECUTE QUERY WITH "IN" CLAUSE
        if(!is_array($id_parent)) {
            if ($id_parent != null) {
                $id_parent = explode(",", $id_parent);
                $id_parent_len = Count($id_parent);
                if ($id_parent_len > 1) {
                    for ($i = 1; $i < $id_parent_len; $i++) {
                        $conditionPlaceholders .= ",?";
                    }
                }
            }
        }/*else{
            $id_parent = array($id_parent);
        }*/
        switch($what){
            // ---------------- IMMOBILI -------------------
            case "ads_status":
                $params = array("enabled = 1");
                $this->currTable = "property_ads_status";
                break;
            case "ads_category":
                $params = array("enabled = 1");
                $this->currTable = "property_categories";
                break;
            case "ads_tipologies":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $this->currTable = "property_tipologies";
                break;
            // ---------------- AGENZIE -------------------
            case "agencies_list":
                $params = array("status = 1");
                $fields = array("id","name");
                $this->currTable = "agencies";
                break;
            // ---------------- GEOGRAFICA -------------------
            case "geo_country":
                $this->currTable = "geo_country";
                $fields = array("id","title");
                break;
            case "geo_region" :
                $this->currTable = "geo_region";
                if($id_parent!=null)
                    $params = array("id_country in($conditionPlaceholders)");
                $fields = array("id","title");
                break;
            case "geo_city":
                $this->currTable = "geo_city";
                $params = array("id_region in($conditionPlaceholders)");
                $fields = array("id","title");
                break;
            case "geo_town" :
                $this->currTable = "geo_town";
                $params = array("id_city in($conditionPlaceholders)");
                $fields = array("id","title");
                break;
            case "geo_district":
                $this->currTable = "geo_district";
                $params = array("id_town in($conditionPlaceholders)");
                $fields = array("id","title");
                break;
            case "geo_istat":
                $this->currTable = "geo_town";
                $params = array("id = ?");
                $fields = array("id", "istat as title");
                break;
            case "geo_cap":
                $this->currTable = "geo_district";
                $params = array("id = ?");
                $fields = array("id","cap as title");
                break;
        }

        if($id_parent!= null)
            $ret = $this->read($params,null,$id_parent,$fields);
        else
            $ret = $this->read(null,null,null,$fields);

        $this->setDefTable();
        //var_dump($ret);
        return $ret;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }



}
