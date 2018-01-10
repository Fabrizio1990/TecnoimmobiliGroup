<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class ImagesInfo extends DbManager implements IDbManager {

    const defTable  = "images_info_view";

    public $info;

    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;

        $this->info = $this->GetImagesInfoParams();

    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array();

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





    private function GetImagesInfoParams(){

        $ret = $this->read();
        $ret = $this->ImageRstConversion($ret);
        return $ret;
    }

    private function ImageRstConversion($rst){
        $ret = array();
        $currCategory = "";
        $currSize = "";
        for($i = 0;$i<Count($rst);$i++ ){
            $category = $rst[$i]["category"];
            $size = $rst[$i]["size_desc"];
            if($currCategory != $rst[$i]["category"]){
                $currCategory = $category;
                $ret[$category] = "";
            }

            if($currSize != $rst[$i]["size_desc"]){
                $currSize = $size;
                $ret[$category][$size] = array();
            }

            $ret[$category][$size]["path"] = $rst[$i]["path"];
            $ret[$category][$size]["width"] = $rst[$i]["width"];
            $ret[$category][$size]["height"] = $rst[$i]["height"];
            $ret[$category][$size]["quality"] = $rst[$i]["quality"];
            /*$data = array(
                "path"=>$rst[$i]["path"],
                "width"=>$rst[$i]["width"],
                "height"=>$rst[$i]["height"],
                "quality"=>$rst[$i]["quality"]
            );*/
            //array_push($ret[$category][$size],$data);
        }
        return $ret;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }




}


