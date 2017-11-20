<?php
require("../config.php");
include(BASE_PATH . "/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/GenericDbHelper.php");


/* CHECK IF DISTRICT EXIST "IF NOT I WILL REMOVE IT"*/
$dbH = new GenericDbHelper();

$district = isset($_POST["input_district"])?$_POST["input_district"]:"";
if($district!=""){
    $dbH->setTable("geo_district");
    $res = $dbH->read("title Like ?",null,array("%".$district."%"),null,false);
    if(!$res || count($res)<1)
        $district = "";
}



$category   = isset($_POST["sel_category"])?$_POST["sel_category"]:"";
$contract   = isset($_POST["sel_contract"])?$_POST["sel_contract"]:"";
$tipology   = isset($_POST["sel_tipology"])?$_POST["sel_tipology"]:"";
$town       = isset($_POST["input_town"])?urldecode($_POST["input_town"]):"";
$district   = $district!=""?urldecode($_POST["input_district"]):"";
$tipology   = isset($_POST["sel_tipology"])?$_POST["sel_tipology"]:"";
$priceFrom  = isset($_POST["priceFrom"])?$_POST["priceFrom"]:"";
$priceTo    = isset($_POST["priceTo"])?$_POST["priceTo"]:"";
$mqFrom     = isset($_POST["mqFrom"])?$_POST["mqFrom"]:"";
$mqTo       = isset($_POST["mqTo"])?$_POST["mqTo"]:"";

$locals         = isset($_POST["sel_locals"])?$_POST["sel_locals"]:"";
$bathrooms      = isset($_POST["sel_bathrooms"])?$_POST["sel_bathrooms"]:"";
$conditions     = isset($_POST["sel_conditions"])?$_POST["sel_conditions"]:"";
$garden         = isset($_POST["sel_garden"])?$_POST["sel_garden"]:"";
$elevator       = isset($_POST["sel_elevator"])?$_POST["sel_elevator"]:"";
$box            = isset($_POST["sel_box"])?$_POST["sel_box"]:"";

$sessionSearch = array(
    "category"=>$category,
    "contract"=>$contract,
    "town"=>$town,
    "district"=>$district,
    "tipology" => $tipology,
    "priceFrom"=>$priceFrom,
    "priceTo"=>$priceTo,
    "mqFrom"=>$mqFrom,
    "mqTo"=>$mqTo,
    "locals"=>$locals,
    "bathrooms"=>$bathrooms,
    "conditions"=>$conditions,
    "garden"=>$garden,
    "elevator"=>$elevator,
    "box"=>$box,
);

SessionManager::setVal("research_opts",serialize($sessionSearch),864000);// 10 day duration
echo 1;