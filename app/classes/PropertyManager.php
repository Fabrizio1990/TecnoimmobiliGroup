<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
require_once (BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");



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


    public function saveProperty($values,$fields=null,$printQuery = false){
        $ret = $this->create($values,$fields,$printQuery);
        if($ret=="" || $ret == null)// se va in errore ritorno ret che sarà vuoto e scatenerà l ' errore
            return "errore - Salvataggio immobile fallito";
        $ret = $this->lastInsertId;

        return $ret;
    }

    //save data on property_agencies table
    public function savePropertyAgentRelations($id_agency,$id_agent,$id_property,$printQuery = false){
        $this->currTable = "property_agencies";
        $values = array($id_agency,$id_agent,$id_property);
        $fields = array("id_agency","id_agent","id_property");
        $ret = $this->create($values,$fields,$printQuery);
        $this->setDefTable();

        return $ret;
    }


    public function updateProperty($values,$params = null,$extraParams = null,$fields=null,$printQuery = false){
        $def_fields = array("id_contract = ?","id_contract_status = ?","id_country = ?","id_region = ?","id_city = ?","id_town = ?","id_district = ?","street = ?","street_num = ?","show_address = ?","longitude = ?","latitude = ?","id_category = ?","id_tipology = ?","mq = ?","price = ?","negotiation_reserved = ?","id_locals = ?","id_rooms = ?","id_bathrooms = ?","id_floor = ?","id_elevator = ?","id_heating = ?","id_box = ?","id_garden = ?","id_property_conditions = ?","id_property_status = ?","id_ads_status = ?","is_prestige = ?","is_price_lowered = ?","video_url = ?","id_description = ?","id_energy_class = ?","id_ipe_um = ?","ipe = ?","date_up = ?");

        $fields = $fields == null ? $def_fields : $fields;
        //var_dump($fields);
        $ret = $this->update($fields,$params,$values,$extraParams,$printQuery);

        return $ret;
    }


    public function createRefenceCode($id_ads){

        $res = $this->getAllProperties(array("id = ?"),null,array($id_ads),array("city_short","date_ins"));
        $date =Date("dmY",strtotime($res[0]["date_ins"]));
        $rif = $res[0]["city_short"].$date."RIF".$id_ads;
        $res = $this->update("reference_code = ?",array("id=?"),array($rif,$id_ads));
        return $res;
    }


    // Img save process , require id of ads and array with images
    public function saveImages($id_property,$images){
        $ret ="";
        $this->currTable = "property_images";
        for($i = 0 ,$len = Count($images);$i<$len;$i++){
            if($images[$i]!=""){
                $id_image_type ="1";
                if($i>0){
                    $id_image_type ="2";
                }
                //$values = array($id_property,$id_image_type,$images[$i]);
                $ret = $this->saveImage($id_property,$id_image_type,$images[$i]);

                if ($ret !="1") return $ret;
            }
        }
        $this->setDefTable();

        return $ret;
    }


    public function updateImages($id_property,$images)
    {
        $this->currTable = "property_images";
        $resI = $this->delete("id_property = ?",array($id_property));
        $res = $this->saveImages($id_property,$images);
        $this->setDefTable();
        return $res;
    }

    // save single image
    public function saveImage($id_property,$id_image_type,$image){
        $this->currTable = "property_images";
        $fields = array("id_property","id_img_type","img_name");
        $ret = $this->create(array($id_property,$id_image_type,$image),$fields);
        $this->setDefTable();
        return $ret;
    }



    public function saveDescription($id_property,$descriptionIT,$descriptionEN = Null){
        $this->currTable = "property_descriptions";

        $res = $this->create(array($id_property,$descriptionIT,$descriptionEN),array("id_property","desc_it","desc_en"));

        $this->setDefTable();
        return $res;
    }

    public function saveAppointment($id_property,$owner_name,$owner_lastname,$owner_tel_home ,$owner_tel_office ,$owner_mobile,$owner_address,$owner_town,$occupant_name,$occupant_lastname,$occupant_tel,$appointment_date,$appointment_start_date,$appointment_end_date,$appointment_agent,$appointment_channel,$appointment_conditions,$appointment_renwable,$appointment_note){
        $this->currTable = "property_appointment";
        $fields = array("id_property","owner_name","owner_lastname","owner_tel_home","owner_tel_office","owner_mobile","owner_address","owner_town","occupant_name","occupant_lastname","occupant_tel","appointment_date","appointment_start_date","appointment_end_date","appointment_agent","appointment_channel","appointment_conditions","appointment_renwable","note");
        $values = array($id_property,$owner_name,$owner_lastname,$owner_tel_home ,$owner_tel_office ,$owner_mobile,$owner_address,$owner_town,$occupant_name,$occupant_lastname,$occupant_tel,$appointment_date,$appointment_start_date,$appointment_end_date,$appointment_agent,$appointment_channel,$appointment_conditions,$appointment_renwable,$appointment_note);
        $res = $this->create($values,$fields);
        $this->setDefTable();
        return $res;
    }


    public function updateAppointment($id_property,$owner_name,$owner_lastname,$owner_tel_home ,$owner_tel_office ,$owner_mobile,$owner_address,$owner_town,$occupant_name,$occupant_lastname,$occupant_tel,$appointment_date,$appointment_start_date,$appointment_end_date,$appointment_agent,$appointment_channel,$appointment_conditions,$appointment_renwable,$appointment_note){
        $this->currTable = "property_appointment";
        $fields = array("owner_name = ?","owner_lastname = ?","owner_tel_home = ?","owner_tel_office = ?","owner_mobile = ?","owner_address = ?","owner_town = ?","occupant_name = ?","occupant_lastname = ?","occupant_tel = ?","appointment_date = ?","appointment_start_date = ?","appointment_end_date = ?","appointment_agent = ?","appointment_channel = ?","appointment_conditions = ?","appointment_renwable = ?","note = ?");
        $values = array($owner_name,$owner_lastname,$owner_tel_home ,$owner_tel_office ,$owner_mobile,$owner_address,$owner_town,$occupant_name,$occupant_lastname,$occupant_tel,$appointment_date,$appointment_start_date,$appointment_end_date,$appointment_agent,$appointment_channel,$appointment_conditions,$appointment_renwable,$appointment_note,$id_property);

        $res = $this->update($fields,"id_property = ?",$values);
        $this->setDefTable();
        return $res;
    }

    public function updateDescription($id_property,$descriptionIT,$descriptionEN = Null){
        $this->currTable = "property_descriptions";
        $resD = $this->delete("id_property = ?",array($id_property));

        $res = $this->saveDescription($id_property,$descriptionIT,$descriptionEN);

        return $res;
    }


    public function getAllProperties($params = null, $extra_params = null, $values =null , $fields = null, $printQuery = null){
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


    public function getDescription($id_property){
        $this->currTable = "property_descriptions";
        $ret = $this->read("id_property = ?","limit 1",array($id_property));
        $this->setDefTable();
        return $ret;
    }

    public function getAppointment($id_property){
        $this->currTable = "property_appointment";
        $ret = $this->read("id_property = ?","limit 1",array($id_property));
        $this->setDefTable();
        return $ret;
    }

    public function getAgentData($idProperty){
        $this->currTable ="properties_agents";
        $ret = $this->read("id_property = ?","Limit 1",array($idProperty) ,null,false);
        $this->setDefTable();
        return $ret;
    }


    public function importedPropertyExist($id_imported,$printQuery = false){
        $this->currTable = "properties";
        $ret = false;

        $params = "id_old_tecnoimm_site = ?";
        $values = array($id_imported);
        $ret = $this->read($params,null,$values,"id,Count(id) as cnt",$printQuery);
        /*if($ret[0]["cnt"]>0)
            $ret = true;
        else
            $ret = false;*/

        $this->setDefTable();
        return $ret[0];
    }

    public function deletePropertyImages($id_property){

        $this->deletePropertyImagesFromFolder($id_property);
        if(!$this->deletePropertyImagesFromDb($id_property))
            return false;

        return true;
    }


    public function deletePropertyImagesFromFolder($id_property){
        $imgH = new ImagesInfo();

        $pathMin    = BASE_PATH."/".$imgH->info["properties"]["min"]["path"];
        $pathNormal = BASE_PATH."/".$imgH->info["properties"]["normal"]["path"];
        $pathBig    = BASE_PATH."/".$imgH->info["properties"]["big"]["path"];
        $pathExtra  = BASE_PATH."/".$imgH->info["properties"]["extra"]["path"];

        $images = $this->getImages("id_property = ?",null,array($id_property));
        for($i = 0,$len = count($images); $i < $len;$i++){
            if(file_exists($pathMin.$images[$i]["img_name"]))
                unlink($pathMin.$images[$i]["img_name"]);
            if(file_exists($pathNormal.$images[$i]["img_name"]))
                unlink($pathNormal.$images[$i]["img_name"]);
            if(file_exists($pathBig.$images[$i]["img_name"]))
                unlink($pathBig.$images[$i]["img_name"]);
            if(file_exists($pathExtra.$images[$i]["img_name"]))
                unlink($pathExtra.$images[$i]["img_name"]);
        }

    }

    public function deletePropertyImagesFromDb($id_property){
        $this->setTable("property_images");

        $ret = $this->delete("id_property = ?",array($id_property),null,false);

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


