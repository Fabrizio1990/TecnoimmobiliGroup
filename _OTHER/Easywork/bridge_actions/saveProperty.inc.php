<?php
require_once  (BASE_PATH."/_OTHER/Easywork/classes/EasyWorkConversionsHelper.php");
require_once (BASE_PATH."/app/classes/PropertyManager.php");
/*require_once (BASE_PATH."/app/classes/AgencyManager.php");*/
$ewConvH = new EasyWorkConversionsHelper();
$pMng = new PropertyManager();
/*$agMng = new AgencyManager();*/




if(isset($_POST["id_agency"],$_POST["id_easywork"],$_POST["category"],$_POST["tipology"],$_POST["surface"],$_POST["locals"],$_POST["rooms"],$_POST["floors"],$_POST["elevator"],$_POST["conditions"],$_POST["property_status"],$_POST["heatings"],$_POST["bathrooms"],$_POST["box"],$_POST["gardens"],$_POST["contract"],$_POST["price"],$_POST["energy_class"],$_POST["ipe_um"],$_POST["ipe"],$_POST["description"],$_POST["country"],$_POST["region"],$_POST["city"],$_POST["town"],$_POST["district"],$_POST["address"],$_POST["street_num"],$_POST["show_street_num"],$_POST["ads_status"],$_POST["contract_status"],$_POST["negotiation"],$_POST["price_lowered"],$_POST["prestige"])){







    $id_easywork                = $_POST["id_easywork"];
    $id_agency                  = $_POST["id_agency"];
    $contract                  = getConvertedField($ewConvH->TextToId("property_contracts",$_REQUEST["contract"]),"contract");
    $contract_status            = getConvertedField($ewConvH->TextToId("property_contract_status",$_POST["contract_status"]),"contract_status");
    $country                    = getConvertedField($ewConvH->TextToId("geo_country",$_POST["country"]),"country");
    $region                     = getConvertedField($ewConvH->TextToId("geo_region",$_POST["region"]),"region");
    $city                       = getConvertedField($ewConvH->TextToId("geo_city",$_POST["city"]),"city");
    $town                       = getConvertedField($ewConvH->TextToId("geo_town",$_POST["town"]),"town");
    $district                   = getConvertedField($ewConvH->TextToId("geo_district",$_POST["district"]),"district");

    $address                    = $_POST["address"];echo("Address -> ".$address."<br>");

    $street_num                 = $_POST["street_num"];
    $show_street_num            = $_POST["show_street_num"];
    $latitude                   = isset($_POST["latitude"])?$_POST["latitude"]:"";
    $latitude                   = substr($latitude,0,10);
    $longitude                  = isset($_POST["longitude"])?$_POST["longitude"]:"";
    $longitude                  = substr($longitude,0,10);

    $category                   = getConvertedField($ewConvH->TextToId("property_categories",$_POST["category"]),"category");
    $tipology                   = getConvertedField($ewConvH->TextToId("property_tipologies",$_POST["tipology"]),"tipology");
    $surface                    = $_POST["surface"];echo("surface -> ".$surface."<br>");
    $price                      = $_POST["price"];echo("price -> ".$price."<br>");
    $negotiation                = $_POST["negotiation"];echo("negotiation -> ".$negotiation."<br>");
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
    $prestige                   = $_POST["prestige"];echo("prestige -> ".$prestige."<br>");
    $price_lowered              = $_POST["price_lowered"];
    $video_url                  = isset($_POST["video_url"])?$_POST["video_url"]:"";
    $description                = "";
    $energy_class               = getConvertedField($ewConvH->TextToId("property_energy_class",$_POST["energy_class"]),"energy_class");
    $ipe_um                     = getConvertedField($ewConvH->TextToId("property_ipe_um",$_POST["ipe_um"]),"ipe_um");
    $ipe                        = $_POST["ipe"];echo("ipe -> ".$ipe."<br>");
    $currTs                     = date("Y-m-d H:i:s");

    // description will be saved to another table
    $txt_description            = $_POST["description"];echo("description -> ".$txt_description."<br>");

    echo("----------------<br>".$category ."<br>". $tipology ."<br>". $surface ."<br>". $locals ."<br>". $rooms ."<br>". $floors ."<br>". $elevator ."<br>". $conditions ."<br>". $property_status ."<br>". $heatings ."<br>". $bathrooms ."<br>". $box ."<br>". $gardens ."<br>". $contract ."<br>". $price ."<br>". $energy_class ."<br>". $ipe_um ."<br>". $ipe ."<br>". $txt_description ."<br>". $country ."<br>". $region ."<br>". $city ."<br>". $town."<br>". $district ."<br>". $address ."<br>". $street_num ."<br>". $show_street_num ."<br>". $ads_status ."<br>". $contract_status ."<br>". $negotiation ."<br>". $price_lowered ."<br>". $prestige ."<br>----------------<br>");


    if($category !="" && $tipology !="" && $surface !="" && $locals !="" && $rooms !="" && $floors !="" && $elevator !="" && $conditions !="" && $property_status !="" && $heatings !="" && $bathrooms !="" && $box !="" && $gardens !="" && $contract !="" && $price !="" && $energy_class !="" && $ipe_um !="" && $ipe !="" && $txt_description !="" && $country !="" && $region !="" && $city !="" && $town!="" && $district !="" && $address !="" && $street_num !="" && $show_street_num !="" && $ads_status !="" && $contract_status !="" && $negotiation !="" && $price_lowered !="" && $prestige !=""){

        // DA QUA COMINCIA IL SALVATAGGIO VERO E PROPRIO

        $values = array($id_easywork,$contract,$contract_status,$country,$region,$city,$town,$district,$address,$street_num,$show_street_num,$latitude,$longitude,$category,$tipology,$surface,$price,$negotiation,$locals,$rooms,$bathrooms,$floors,$elevator,$heatings,$box,$gardens,$conditions,$property_status,$ads_status,$prestige,$price_lowered,$video_url,$id_description,$energy_class,$ipe_um,$ipe,$currTs);
        $fields = array("id_easywork","id_contract","id_contract_status","id_country","id_region","id_city","id_town","id_district","street","street_num","show_address","longitude","latitude","id_category","id_tipology","mq","price","negotiation_reserved","id_locals","id_rooms","id_bathrooms","id_floor","id_elevator","id_heating","id_box","id_garden","id_property_conditions","id_property_status","id_ads_status","is_prestige","is_price_lowered","video_url","id_description","id_energy_class","id_ipe_um","ipe","date_up");

        $id_property = $pMng->saveProperty($values,$fields,false);


        echo("SAVED");

    }else{
        printMessage("ERR_EMPTY_PARAMS");
    }

}else{
    printMessage("ERR_MISSING_PARAMS");

}



function getConvertedField($conversionRet,$fieldName){

    if($conversionRet ==""){
        printMessage("ERR_INVALID_CONVERSION_R",$fieldName,true);
        exit();
    }else{
        echo($fieldName." -> ".$conversionRet."<br>");
    }
    return $conversionRet;
}