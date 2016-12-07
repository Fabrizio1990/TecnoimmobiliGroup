<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class PropertyManager extends DbManager implements IDbManager {

    const defTable  = "properties";
    private $currTable;

    public function NewsManager() {
        $this->currTable = self::defTable;
    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null)
    {

        $fields     = "reference_code,id_contract,id_contract_status,id_appointment,id_country,
id_region,id_city,id_town,id_district,street,street_num,show_street_num,longitude,latitude,id_category,id_tipology,mq,id_locals,id_rooms,id_bathrooms,id_floor,id_elevator,id_heating,id_box,id_garden,id_property_conditions,id_property_status,id_ads_status,is_prestige,is_price_lowered,video_url,id_description,views,telephone_click,id_energy_class,id_ipe_um,ipe,show_on_magazine,show_on_portal,date_insdate_up,date_del";
        $rif = $this->createRefenceCode();
        array_unshift($values, $rif);

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

    public function readAllAds($params = null,$extra_params = null,$values =null ,$fields = null){
        $this->currTable = "properties_view";
        $ret = $this->read($params,$extra_params,$values ,$fields);
        $this->setDefTable();
        return $ret;
    }

    private function createRefenceCode(){
        // TODO GENERARE UN CODICE RANDOM
        RETURN 1;
    }

    public function setDefTable(){
        $this->currTable = self::defTable;
    }




}


