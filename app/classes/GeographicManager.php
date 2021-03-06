<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 16:31
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
class GeographicManager extends DbManager implements IDbManager
{

    const defTable  = "geographic_view";
    private $currTable;

    public function __construct($conn = null) {
        parent::__construct($conn);
        $this->currTable = self::defTable;
    }

    public function create($values,$fields = null,$printQuery = false)
    {
        $def_fields     = array("id","title");
        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
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


    public function saveDistrict($townId,$name,$cap,$districtId =null){
        $ret = false;

        if($cap==null)$cap="";

        $this->currTable = "geo_district";
        $values = array($townId,$name,$cap);
        if($districtId ==null) {
            $fields = array("id_town","title","cap");
            $ret = $this->create($values,$fields);
        }else{
            //TODO UPDATE
            $fields = "id_town = ? , title = ?,cap = ?";
            $params = array("id = ?");
            $ret = $this->update($this->currTable,$fields,$params,$values);
        }
        $this->setDefTable();

        return $ret;
    }

    public function saveTown($cityId,$name,$istat = null,$townId =null){
        $ret = false;

        if($istat==null)$istat="";

        $this->currTable = "geo_town";
        $values = array($cityId,$name,$istat);
        if($townId ==null) {
            $fields = array("id_city","title","istat");
            $ret = $this->create($values,$fields);
        }else{
            //TODO UPDATE
            $fields = "id_city= ? , title = ?,istat = ?";
            $params = array("id = ?");
            $ret = $this->update($this->currTable,$fields,$params,$values);
        }
        $this->setDefTable();
    }

    public function saveCity($regionId,$name,$name_short = null,$cityId = null){
        $ret = false;

        if($name_short==null)$name_short="";
        $this->currTable = "geo_city";
        $values = array($regionId,$name,$name_short);
        if($cityId ==null) {
            $fields = array("id_region","title","title_short");
            $ret = $this->create($values,$fields);
        }else{
            //TODO UPDATE
            $fields = "id_region= ? , title = ?";
            $params = array("id = ?");
            $ret = $this->update($this->currTable,$fields,$params,$values);
        }
        $this->setDefTable();
    }

    public function saveRegion($countryId,$name,$regionId =null){
        $ret = false;
        $this->currTable = "geo_region";
        $values = array($countryId,$name);
        if($regionId ==null) {
            $fields = array("id_country","title");
            $ret = $this->create($values,$fields);
        }else{
            //TODO UPDATE
            $fields = "id_country= ? , title = ?";
            $params = array("id = ?");
            $ret = $this->update($this->currTable,$fields,$params,$values);
        }
        $this->setDefTable();
    }

    public function saveCountry($name,$countryId = null){
        $ret = false;
        $this->currTable = "geo_country";
        $values = array($name);
        if($countryId ==null) {
            $fields = array("title");
            $ret = $this->create($values,$fields);
        }else{
            //TODO UPDATE
            $fields = "title = ?";
            $params = array("id = ?");
            $ret = $this->update($this->currTable,$fields,$params,$values);
        }
        $this->setDefTable();
    }



    public function setDefTable(){
        $this->currTable = self::defTable;
    }




}