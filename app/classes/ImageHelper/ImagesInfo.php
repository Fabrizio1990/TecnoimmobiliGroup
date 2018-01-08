<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class ImagesInfo extends DbManager implements IDbManager {

    const defTable  = "property_images_size";



    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;

        //$this->info = $this->GetImagesInfoParams();

    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array("id_contract","id_contract_status","id_country","id_region","id_city","id_town","id_district","street","street_num","show_address","longitude","latitude","id_category","id_tipology","mq","price","negotiation_reserved","id_locals","id_rooms","id_bathrooms","id_floor","id_elevator","id_heating","id_box","id_garden","id_property_conditions","id_property_status","id_ads_status","is_prestige","is_price_lowered","video_url","id_description","id_energy_class","id_ipe_um","ipe","date_up");

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


    public function GetImagesInfoParams($size){

        $ret = $this->read("title = ?",null,array($size));

        return $ret[0];
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }




}


