<?php
require_once (BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once (BASE_PATH."/app/classes/MagazineManager.php");
/*require_once (SITE_URL."/app/classes/AgencyManager.php");*/

$debugMode = false;


/*
echo("--->".$_POST["id_agency"]."<br>");
echo("--->".$_POST["id_easywork"]."<br>");
echo("--->".$_POST["category"]."<br>");
echo("--->".$_POST["tipology"]."<br>");
echo("--->".$_POST["surface"]."<br>");
echo("--->".$_POST["locals"]."<br>");
echo("--->".$_POST["rooms"]."<br>");
echo("--->".$_POST["floors"]."<br>");
echo("--->".$_POST["elevator"]."<br>");
echo("--->".$_POST["conditions"]."<br>");
echo("--->".$_POST["property_status"]."<br>");
echo("--->".$_POST["heatings"]."<br>");
echo("--->".$_POST["bathrooms"]."<br>");
echo("--->".$_POST["box"]."<br>");
echo("--->".$_POST["gardens"]."<br>");
echo("--->".$_POST["contract"]."<br>");
echo("--->".$_POST["price"]."<br>");
echo("--->".$_POST["energy_class"]."<br>");
echo("--->".$_POST["ipe_um"]."<br>");
echo("--->".$_POST["ipe"]."<br>");
echo("--->".$_POST["description"]."<br>");
echo("--->".$_POST["country"]."<br>");
echo("--->".$_POST["city"]."<br>");
echo("--->".$_POST["town"]."<br>");
echo("--->".$_POST["district"]."<br>");
echo("--->".$_POST["address"]."<br>");
echo("--->".$_POST["street_num"]."<br>");
echo("--->".$_POST["show_street_num"]."<br>");
echo("--->".$_POST["ads_status"]."<br>");
echo("--->".$_POST["contract_status"]."<br>");
echo("--->".$_POST["negotiation"]."<br>");
echo("--->".$_POST["price_lowered"]."<br>");
echo("--->".$_POST["prestige"]."<br>");*/



if(isset($_POST["id_agency"],$_POST["id_easywork"],$_POST["category"],$_POST["tipology"],$_POST["surface"],$_POST["locals"],$_POST["rooms"],$_POST["floors"],$_POST["elevator"],$_POST["conditions"],$_POST["property_status"],$_POST["heatings"],$_POST["bathrooms"],$_POST["box"],$_POST["gardens"],$_POST["contract"],$_POST["price"],$_POST["energy_class"],$_POST["ipe_um"],$_POST["ipe"],$_POST["description"],$_POST["country"],$_POST["city"],$_POST["town"],$_POST["district"],$_POST["address"],$_POST["street_num"],$_POST["show_street_num"],$_POST["ads_status"],$_POST["contract_status"],$_POST["negotiation"],$_POST["price_lowered"],$_POST["prestige"])){

    // SE NON CI SONO I DATI DELL INCARICO RESTITUISCO ERRORE

    /*echo($_POST["owner_name"]);
    echo($_POST["appointment_date"]);
    echo($_POST["appointment_start_date"]);*/
    if(!isset($_POST["owner_name"],$_POST["appointment_date"],$_POST["appointment_start_date"],$_POST["appointment_end_date"])){
        printMessage("ERR_MISSING_REQUEST_PARAMS");
        exit();
    }


    $ewConvH = new EasyWorkConversionsHelper($pMng->conn);
    $linkMng = new PropertyLinksAndTitles();

    $id_easywork                = $_POST["id_easywork"];
    $id_agency                  = $_POST["id_agency"];
    $contract                  = getConvertedField($ewConvH->TextToId("property_contracts",$_REQUEST["contract"]),"contract");
    $contract_status            = getConvertedField($ewConvH->TextToId("property_contract_status",$_POST["contract_status"]),"contract_status");
    $country                    = getConvertedField($ewConvH->TextToId("geo_country",$_POST["country"]),"country");
    $region                     = 0;
    $city                       = getConvertedField($ewConvH->TextToId("geo_city",$_POST["city"],"title_short"),"city");
    $town                       = getConvertedField($ewConvH->TextToId("geo_town",$_POST["town"]),"town");
    $district                   = $ewConvH->GetDistrictId($city,$town,$_POST["district"]);
    if($district =="")
        printMessage("ERR_MISSING_REQUEST_PARAMS");
    $address                    = $_POST["address"];if($debugMode)echo("Address -> ".$address."<br>");
    $street_num                 = $_POST["street_num"];
    $show_street_num            = $_POST["show_street_num"];
    $latitude                   = isset($_POST["latitude"])?$_POST["latitude"]:"";
    $latitude                   = substr($latitude,0,10);
    $longitude                  = isset($_POST["longitude"])?$_POST["longitude"]:"";
    $longitude                  = substr($longitude,0,10);
    $category                   = getConvertedField($ewConvH->TextToId("property_categories",$_POST["category"]),"category");
    $tipology                   = getConvertedField($ewConvH->TextToId("property_tipologies",$_POST["tipology"]),"tipology");
    $surface                    = $_POST["surface"];if($debugMode)echo("surface -> ".$surface."<br>");
    $price                      = $_POST["price"];if($debugMode)echo("price -> ".$price."<br>");
    $negotiation                = $_POST["negotiation"];if($debugMode)echo("negotiation -> ".$negotiation."<br>");
    $locals                     = getConvertedField($ewConvH->TextToId("property_locals",$_POST["locals"],"title_short"),"locals");
    $rooms                      = getConvertedField($ewConvH->TextToId("property_rooms",$_POST["rooms"],"title_short"),"rooms");
    $bathrooms                  = getConvertedField($ewConvH->TextToId("property_bathrooms",$_POST["bathrooms"],"title_short"),"bathrooms");
    $floors                     = getConvertedField($ewConvH->TextToId("property_floors",$_POST["floors"],"title_short"),"floors");
    $elevator                   = getConvertedField($ewConvH->TextToId("property_elevators",$_POST["elevator"],"title_short"),"elevator");
    $heatings                   = getConvertedField($ewConvH->TextToId("property_heatings",$_POST["heatings"],"title_short"),"heatings");
    $box                        = getConvertedField($ewConvH->TextToId("property_box",$_POST["box"],"title_short"),"box");
    $gardens                    = getConvertedField($ewConvH->TextToId("property_gardens",$_POST["gardens"],"title_short"),"gardens");
    $conditions                 = getConvertedField($ewConvH->TextToId("property_conditions",$_POST["conditions"],"title_short"),"conditions");
    $property_status            = getConvertedField($ewConvH->TextToId("property_status",$_POST["property_status"],"title_short"),"property_status");
    $ads_status                 = getConvertedField($ewConvH->TextToId("property_ads_status",$_POST["ads_status"]),"ads_status");
    $prestige                   = $_POST["prestige"];if($debugMode)echo("prestige -> ".$prestige."<br>");
    $price_lowered              = $_POST["price_lowered"];
    $video_url                  = isset($_POST["video_url"])?$_POST["video_url"]:"";
    $description                = "";
    $energy_class               = getConvertedField($ewConvH->TextToId("property_energy_class",$_POST["energy_class"]),"energy_class");
    $ipe_um                     = getConvertedField($ewConvH->TextToId("property_ipe_um",$_POST["ipe_um"]),"ipe_um");
    $ipe                        = $_POST["ipe"];if($debugMode)echo("ipe -> ".$ipe."<br>");
    $currTs                     = date("Y-m-d H:i:s");

    // description will be saved to another table
    $id_description             = 0;
    $txt_description            = $_POST["description"];if($debugMode)echo("description -> ".$txt_description."<br>");

    // DATI INCARICO
    $owner_name 				= $_POST["owner_name"];
    $owner_lastname 			= isset($_POST["owner_lastname"])?$_POST["owner_lastname"]:"";
    $owner_tel_home 			= isset($_POST["owner_tel_home"])?$_POST["owner_tel_home"]:"";
    $owner_tel_office 			= isset($_POST["owner_tel_office"])?$_POST["owner_tel_office"]:"";
    $owner_mobile 				= isset($_POST["owner_mobile"])?$_POST["owner_mobile"]:"";
    $owner_address 				= isset($_POST["owner_address"])?$_POST["owner_address"]:"";
    $owner_town 				= isset($_POST["owner_town"])?$_POST["owner_town"]:"";
    $occupant_name 				= isset($_POST["occupant_name"])?$_POST["occupant_name"]:"";
    $occupant_lastname 			= isset($_POST["occupant_lastname"])?$_POST["occupant_lastname"]:"";
    $occupant_tel 				= isset($_POST["occupant_tel"])?$_POST["occupant_tel"]:"";
    $appointment_date 			= date('Y-m-d', $_POST["appointment_date"]);
    $appointment_start_date 	= date('Y-m-d', $_POST["appointment_start_date"]);
    $appointment_end_date 		= date('Y-m-d', $_POST["appointment_end_date"]);
    $appointment_agent			= isset($_POST["appointment_agent"])?$_POST["appointment_agent"]:"";
    $appointment_channel		= isset($_POST["appointment_channel"])?$_POST["appointment_channel"]:"";
    $appointment_conditions		= isset($_POST["appointment_conditions"])?$_POST["appointment_conditions"]:"";
    $appointment_renwable		= isset($_POST["appointment_renwable"])?$_POST["appointment_renwable"]:"";
    $appointment_note			= isset($_POST["note"])?$_POST["note"]:"";
    $date_ins					= date("Y-m-d H:i:s");



    // RECUPERO LA REGIONE ( SU EW NON CI SONO LE REGIONI QUINDI VA RECUPERATA DA QUA)
    $regionRes = $pMng->executeQuery("select id_region from geo_city where id='".$city."'");
    if(count($regionRes) > 0){
        $region = $regionRes[0]["id_region"];
    }else{
        printMessage("ERR_MISSING_REGION"," città = $city");
        exit();
    }

    /*echo("----------------<br>".$category ."<br>". $tipology ."<br>". $surface ."<br>". $locals ."<br>". $rooms ."<br>". $floors ."<br>". $elevator ."<br>". $conditions ."<br>". $property_status ."<br>". $heatings ."<br>". $bathrooms ."<br>". $box ."<br>". $gardens ."<br>". $contract ."<br>". $price ."<br>". $energy_class ."<br>". $ipe_um ."<br>". $ipe ."<br>". $txt_description ."<br>". $country ."<br>". $region ."<br>". $city ."<br>". $town."<br>". $district ."<br>". $address ."<br>". $street_num ."<br>". $show_street_num ."<br>". $ads_status ."<br>". $contract_status ."<br>". $negotiation ."<br>". $price_lowered ."<br>". $prestige ."<br>----------------<br>");*/


    if($category !="" && $tipology !="" && $surface !="" && $locals !="" && $rooms !="" && $floors !="" && $elevator !="" && $conditions !="" && $property_status !="" && $heatings !="" && $bathrooms !="" && $box !="" && $gardens !="" && $contract !="" && $price !="" && $energy_class !="" && $ipe_um !="" && $ipe !="" && $txt_description !="" && $country !="" && $region!="" &&  $city !="" && $town!="" && $district !="" && $address !="" && $street_num !="" && $show_street_num !="" && $ads_status !="" && $contract_status !="" && $negotiation !="" && $price_lowered !="" && $prestige !=""){

        // DA QUA COMINCIA IL SALVATAGGIO VERO E PROPRIO

        $values = array($id_easywork,$contract,$contract_status,$country,$region,$city,$town,$district,$address,$street_num,$show_street_num,$latitude,$longitude,$category,$tipology,$surface,$price,$negotiation,$locals,$rooms,$bathrooms,$floors,$elevator,$heatings,$box,$gardens,$conditions,$property_status,$ads_status,$prestige,$price_lowered,$video_url,$id_description,$energy_class,$ipe_um,$ipe,$currTs);
        $fields = array("id_easywork","id_contract","id_contract_status","id_country","id_region","id_city","id_town","id_district","street","street_num","show_address","longitude","latitude","id_category","id_tipology","mq","price","negotiation_reserved","id_locals","id_rooms","id_bathrooms","id_floor","id_elevator","id_heating","id_box","id_garden","id_property_conditions","id_property_status","id_ads_status","is_prestige","is_price_lowered","video_url","id_description","id_energy_class","id_ipe_um","ipe","date_up");


        $pMng->beginTransaction();// INIZIO TRANSAZIONE (Se va in errore da qualche parte deve annullare tutto


        /* SALVATAGGIO IMMOBILE E RECUPERO ID*/
        $id_property = $pMng->saveProperty($values,$fields,false);
        //echo("#############->".$id_property);
        if($id_property == null || $id_property ==""  || strpos($id_property,"error")!== false){
            $pMng->rollback();
            printMessage("ERR_SAVE_PROPERTY");
            exit();
        }

        /* CREAZIONE E SALVATAGGIO REFERENCE_CODE*/
        $res_refC = $pMng->createRefenceCode($id_property);
        if($res_refC =="" || $res_refC == null){
            $pMng->rollback();
            printMessage("ERR_GENERATING_REFERENCE_CODE");
            exit();
        }

        // RECUPERO PRIMO AGENTE DELL' AGENZIA CHE CAPITA (PER FARE LA RELAZIONE SUCCESSIVA
        $ret = $pMng->executeQuery("select id from agency_operators where id_agency = $id_agency limit 1");
        if(count($ret) < 1){
            $pMng->rollback();
            printMessage("ERR_GETTING_VALID_AGENT");
            exit();
        }
        $agent_id = $ret[0]["id"];


        // RELAZIONO IMMOBILE CON AGENTE
        $res_rel = $pMng->savePropertyAgentRelations($id_agency,$agent_id,$id_property);
        if($res_rel =="" || $res_rel == null){
            $pMng->rollback();
            printMessage("ERR_ASSOCIATING_PROPERTY_AGENCY");
            exit;
        }

        // SALVATAGGIO DESCRIZIONE
        $res_desc = $pMng->saveDescription($id_property,$txt_description,"");
        if($res_desc =="" || $res_desc == null){
            $pMng->rollback();
            printMessage("ERR_SAVE_DESCRIPTION_FAILED");
            exit;
        }

        // SALVATAGGIO DATI APPUNTAMENTO
        $resAppointment = $pMng->saveAppointment($id_property, $owner_name, $owner_lastname, $owner_tel_home, $owner_tel_office, $owner_mobile, $owner_address, $owner_town, $occupant_name, $occupant_lastname, $occupant_tel, $appointment_date, $appointment_start_date, $appointment_end_date, $appointment_agent, $appointment_channel, $appointment_conditions, $appointment_renwable, $appointment_note);
        if($resAppointment =="" || $resAppointment == null){
            $pMng->rollback();
            printMessage("ERR_SAVE_APPOINTMENT");
            exit;
        }

        // SET PROPERTY ON MAGAZINE TABLE (WITH STATUS ENABLED)
        $mgzMng = new MagazineManager($pMng->conn);
        $resMagazine = $mgzMng->addOnMangazine($id_property,$id_agency,1);
        if($resMagazine =="" || $resMagazine == null) {
            $pMng->rollback();
            printMessage("ERR_SAVE_MAGAZINE_INFO");
            exit;
        }

        $pMng->commit();
        $link = SITE_URL."/".$linkMng->getDetailLinkFromId($id_property);
        //$link = "TEST LINK";
        printMessage("SUCCESS_PROPERTY_SAVED",$link);

    }else{
        printMessage("ERR_EMPTY_PARAMS");
    }

}else{
    printMessage("ERR_MISSING_PARAMS");

}



