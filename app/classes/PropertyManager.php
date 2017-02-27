<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class PropertyManager extends DbManager implements IDbManager {

    const defTable  = "properties";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array("id_contract","id_contract_status","id_country","id_region","id_city","id_town","id_district","street","street_num","show_address","longitude","latitude","id_category","id_tipology","mq","price","negotiation_reserved","id_locals","id_rooms","id_bathrooms","id_floor","id_elevator","id_heating","id_box","id_garden","id_property_conditions","id_property_status","id_ads_status","is_prestige","is_price_lowered","video_url","id_description","id_energy_class","id_ipe_um","ipe");

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


    public function saveAds($values,$fields=null){

        $ret = $this->create($values,$fields);
        if($ret=="" || $ret == null)// se va in errore ritorno ret che sarà vuoto e scatenerà l ' errore
            return "errore - Salvataggio immobile fallito";

        $ret = $this->lastInsertId;

        return $ret;
    }


    public function updateAds($values,$params = null,$extraParams = null,$fields=null){
        $def_fields = array("id_contract = ?","id_contract_status = ?","id_country = ?","id_region = ?","id_city = ?","id_town = ?","id_district = ?","street = ?","street_num = ?","show_address = ?","longitude = ?","latitude = ?","id_category = ?","id_tipology = ?","mq = ?","price = ?","negotiation_reserved = ?","id_locals = ?","id_rooms = ?","id_bathrooms = ?","id_floor = ?","id_elevator = ?","id_heating = ?","id_box = ?","id_garden = ?","id_property_conditions = ?","id_property_status = ?","id_ads_status = ?","is_prestige = ?","is_price_lowered = ?","video_url = ?","id_description = ?","id_energy_class = ?","id_ipe_um = ?","ipe = ?");

        $fields = $fields == null ? $def_fields : $fields;
        //var_dump($fields);
        $ret = $this->update($fields,$params,$values,$extraParams);

        return $ret;
    }


    public function createRefenceCode($id_ads){
        $res = $this->readAllAds(array("id = ?"),null,array($id_ads),array("city_short","date_ins"));
        $date =Date("dmY",strtotime($res[0]["date_ins"]));
        $rif = $res[0]["city_short"].$date."RIF".$id_ads;
        $res = $this->update("reference_code = ?",array("id=?"),array($rif,$id_ads));
        return $res;
    }


    // Img save process , require id of ads and array with images
    public function saveImages($id_ads,$images){
        $ret ="";
        $this->currTable = "property_images";
        for($i = 0 ,$len = Count($images);$i<$len;$i++){
            if($images[$i]!=""){
                $id_image_type ="1";
                if($i>0){
                    $id_image_type ="2";
                }
                $values = array($id_ads,$id_image_type,$images[$i]);
                $ret = $this->saveImage($values);

                if ($ret !="1") return $ret;
            }
        }
        $this->setDefTable();

        return $ret;
    }


    public function updateImages($id_ads,$images)
    {
        $this->currTable = "property_images";
        $resI = $this->delete("id_property = ?",array($id_ads));
        $res = $this->saveImages($id_ads,$images);
        return $res;
    }

    // save single image
    private function saveImage($values){
        $fields = array("id_property","id_img_type","img_name");
        $ret = $this->create($values,$fields);
        return $ret;
    }



    public function saveDescription($id_ads,$descriptionIT,$descriptionEN = Null){
        $this->currTable = "property_descriptions";

        $res = $this->create(array($id_ads,$descriptionIT,$descriptionEN),array("id_property","desc_it","desc_en"));

        $this->setDefTable();
        return $res;
    }

    public function updateDescription($id_ads,$descriptionIT,$descriptionEN = Null){
        $this->currTable = "property_descriptions";
        $resD = $this->delete("id_property = ?",array($id_ads));

        $res = $this->saveDescription($id_ads,$descriptionIT,$descriptionEN);

        return $res;
    }


    public function readAllAds($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = null){
        $this->currTable = "properties_view";
        $ret = $this->read($params,$extra_params,$values ,$fields, $printQuery);
        $this->setDefTable();
        return $ret;
    }

    public function getImages($params = null,$extra_params = null,$values =null ,$fields = null){
        $this->currTable = "property_images";
        $ret = $this->read($params,$extra_params,$values ,$fields);
        $this->setDefTable();
        return $ret;
    }

    public function getImagesPath($params = null,$extra_params = null,$values =null ,$fields = null){
        $this->currTable = "property_images_size";
        $ret = $this->read($params,$extra_params,$values ,$fields);
        $this->setDefTable();
        return $ret;
    }

    public function getDescription($id_ads){
        $this->currTable = "property_descriptions";
        $ret = $this->read("id_property","limit 1",array($id_ads));
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


