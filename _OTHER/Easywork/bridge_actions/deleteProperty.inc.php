<?php
require_once  (BASE_PATH."/_OTHER/Easywork/classes/EasyWorkConversionsHelper.php");
require_once (BASE_PATH."/app/classes/PropertyManager.php");
/*require_once (BASE_PATH."/app/classes/AgencyManager.php");*/
$ewConvH = new EasyWorkConversionsHelper();
$pMng = new PropertyManager();
/*$agMng = new AgencyManager();*/

function getConvertedField($conversionRet,$fieldName){

    if($conversionRet ==""){
        printMessage("ERR_INVALID_CONVERSION_R",$fieldName,true);
        exit();
    }else{
        echo($fieldName." -> ".$conversionRet."<br>");
    }
    return $conversionRet;
}



$id_easywork                = $_POST["id_easywork"];
$id_agency                  = $_POST["id_agency"];
$contract                  = getConvertedField($ewConvH->TextToId("property_contracts",$_REQUEST["contract"]),"contract");
$contract_status            = getConvertedField($ewConvH->TextToId("property_contract_status",$_POST["contract_status"]),"contract_status");
$country                    = getConvertedField($ewConvH->TextToId("geo_country",$_POST["country"]),"country");
$region                     = getConvertedField($ewConvH->TextToId("geo_region",$_POST["region"]),"region");
$city                       = getConvertedField($ewConvH->TextToId("geo_city",$_POST["city"]),"city");
$town                       = getConvertedField($ewConvH->TextToId("geo_town",$_POST["town"]),"town");
$district                   = getConvertedField($ewConvH->TextToId("geo_district",$_POST["district"]),"district");

$address                    = $_POST["address"];
$street_num                 = $_POST["street_num"];
$show_street_num            = $_POST["show_street_num"];
$latitude                   = isset($_POST["latitude"])?$_POST["latitude"]:"";
$latitude                   = substr($latitude,0,10);
$longitude                  = isset($_POST["longitude"])?$_POST["longitude"]:"";
$longitude                  = substr($longitude,0,10);

$category                   = getConvertedField($ewConvH->TextToId("property_categories",$_POST["category"]),"category");
$tipology                   = getConvertedField($ewConvH->TextToId("property_tipologies",$_POST["tipology"]),"tipology");
$surface                    = $_POST["surface"];
$price                      = $_POST["price"];
$negotiation                = $_POST["negotiation"];
$locals                     = getConvertedField($ewConvH->TextToId("property_locals",$_POST["locals"]),"locals");
$rooms                      = getConvertedField($ewConvH->TextToId("property_rooms",$_POST["rooms"]),"rooms");
$bathrooms                  = getConvertedField($ewConvH->TextToId("property_bathrooms",$_POST["bathrooms"]),"bathrooms");
$floors                     = getConvertedField($ewConvH->TextToId("property_floors",$_POST["floors"]),"floors");
$elevator                   = getConvertedField($ewConvH->TextToId("property_elevators",$_POST["elevator"]),"elevator");
$heatings                   = getConvertedField($ewConvH->TextToId("property_heatings",$_POST["heatings"]),"heatings");
$box                        = getConvertedField($ewConvH->TextToId("property_box",$_POST["box"]),"box");
$gardens                    = getConvertedField($ewConvH->TextToId("property_gardens",$_POST["gardens"]),"gardens");
$conditions                 = getConvertedField($ewConvH->TextToId("property_conditions",$_POST["conditions"]),"conditions");
$property_status            = getConvertedField($ewConvH->TextToId("property_status",$_POST["property_status"]),"property_status");
$ads_status                 = getConvertedField($ewConvH->TextToId("property_ads_status",$_POST["ads_status"]),"ads_status");
$prestige                   = $_POST["prestige"];
$price_lowered              = $_POST["price_lowered"];
$video_url                  = isset($_POST["video_url"])?$_POST["video_url"]:"";
$description                = "";
$energy_class               = getConvertedField($ewConvH->TextToId("property_energy_class",$_POST["energy_class"]),"energy_class");
$ipe_um                     = getConvertedField($ewConvH->TextToId("property_ipe_um",$_POST["ipe_um"]),"ipe_um");
$ipe                        = $_POST["ipe"];
$currTs                     = date("Y-m-d H:i:s");

// description will be saved to another table
$txt_description            = $_POST["description"];

