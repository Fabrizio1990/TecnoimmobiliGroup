<?php

$dir = dirname(__FILE__);

require_once(BASE_PATH."/app/classes/DbManager.php");

class OptionsManager extends DbManager{

    const defTable  = "properties";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery =false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
        return $ret;
    }

    function readOptions($what,$id_parent = null,$printQuery = false){
        $params = null;
        $fields = null;
        $extra_params = null;
        $conditionPlaceholders = "?";
        // NEED TO CHECK IF ALREADY SENT AN ARRAY, IF NOT THE VARIABLE MUST BE CONVERTED TO ARRAY
        // BECOUSE SOMETIMES I SEND MORE VALUES BY JAVASCRIPT (ES SELECT MULTIPLE)
        // AND I NEED TO EXECUTE QUERY WITH "IN" CLAUSE
        if(!is_array($id_parent)) {
            if ($id_parent != null) {
                $id_parent = explode(",", $id_parent);
            }
        }
        $id_parent_len = Count($id_parent);
        if ($id_parent_len > 1) {
            for ($i = 1; $i < $id_parent_len; $i++) {
                $conditionPlaceholders .= ",?";
            }
        }
        switch($what){
            // ---------------- IMMOBILI -------------------
            case "ads_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_ads_status";
                break;
            case "ads_category":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_categories";
                break;
            case "ads_tipologies":
                $params = array("id_category in($conditionPlaceholders)","enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_tipologies";
                break;
            case "ads_locals":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_locals";
                break;
            case "ads_locals2":
                $params = array("enabled = 1");
                $fields = array("title_short","concat(title_short,'+') as title");
                $extra_params = "order by id asc";
                $this->currTable = "property_locals";
                break;
            case "ads_rooms":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_rooms";
                break;
            case "ads_floors":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_floors";
                break;
            case "ads_elevators":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_elevators";
                break;
            case "ads_conditions":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_conditions";
                break;
            case "ads_property_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_status";
                break;
            case "ads_heatings":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_heatings";
                break;
            case "ads_bathrooms":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_bathrooms";
                break;
            case "ads_box":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_box";
                break;
            case "ads_gardens":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_gardens";
                break;
            case "ads_contracts":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_contracts";
                break;
            case "ads_contract_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "property_contract_status";
                break;
            case "ads_energy_class":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by id asc";
                $this->currTable = "property_energy_class";
                break;
            case "ads_ipe_um":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $this->currTable = "property_ipe_um";
                break;


            // ---------------- AGENZIE -------------------
            case "agencies_list":
                $params = array("status = 1");
                $fields = array("id","name");
                $extra_params = "order by name asc";
                $this->currTable = "agencies";
                break;
            case "ag_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "agencies_status";
                break;
            case "ag_sub_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "agencies_sub_status";
                break;
            case "ag_portal_status":
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "agency_portal_status";
                break;
            // ---------------- USERS (AGENTI) -------------------
            case "operator_status" :
                $params = array("enabled = 1");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                $this->currTable = "agency_operators_status";
                break;

            // ---------------- GEOGRAFICA -------------------
            case "geo_country":
                $this->currTable = "geo_country";
                $fields = array("id","title");
                $extra_params = "order by title asc";
                break;
            case "geo_region" :
                $this->currTable = "geo_region";
                if($id_parent!=null)
                    $params = array("id_country in($conditionPlaceholders)");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                break;
            case "geo_city":
                $this->currTable = "geo_city";
                $params = array("id_region in($conditionPlaceholders)");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                break;
            case "geo_town" :
                $this->currTable = "geo_town";
                $params = array("id_city in($conditionPlaceholders)");
                $fields = array("id","title");
                $extra_params = "order by title asc";
                break;
            case "geo_district":
                $this->currTable = "geo_district";
                $params = array("id_town in($conditionPlaceholders)");
                $fields = array("id","title");
                $extra_params = "order by title asc";
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
            $ret = $this->read($params,$extra_params,$id_parent,$fields,$printQuery);
        else
            $ret = $this->read(null,$extra_params,null,$fields,$printQuery);

        $this->setDefTable();
        //var_dump($ret);
        return $ret;
    }

    // CHIAMA readOptions e invece di restituire un array con il resultset restituisce direttamente le options <option value="valore">testo</option>
    //NB REMOVEELEMS PERMETTE DI RIMUOVERE UNO O PIU ELEMENTI IN BASE AL TESTO *non al value
    //PER ELIMINARNE DI PIU PASSARE UN ARRAY INVECE CHE UNA STRINGA
    public function makeOptions($what,$selectedVal = null,$id_parent = null,$removeElems = null,$printQuery = false){
        if(!is_null ($id_parent) && $id_parent == "")
            return "";
        $res = $this->readOptions($what,$id_parent,$printQuery);
        $optRes = "";

        for($i=0,$cnt = count($res);$i<$cnt;$i++){
            $needRemove = false;
            if(is_array($removeElems))
                $needRemove = in_array($res[$i][1],$removeElems);
            else
                $needRemove = $res[$i][1] == $removeElems;
            if(!$needRemove){
                if(is_array($selectedVal))
                    $selected = in_array($res[$i][0],$selectedVal)? "selected " : "";
                else
                    $selected = $selectedVal == $res[$i][0]?"selected":"";

                $optRes.="<option $selected value='".$res[$i][0]."'>".$res[$i][1]."</option>";
            }
        }
        return $optRes;
    }

    public function setDefTable(){
        $this->currTable = self::defTable;
    }



}
