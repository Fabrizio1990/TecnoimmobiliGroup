<?php
// INIZIO CALCOLO DEL TEMPO DI ESECUZIONE
$time_start = microtime(true);
//----------------------------

// TODO , MANCANO I DATI DELL' APPUNTAMENTO
set_time_limit (0);
function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        print libxml_display_error($error);
    }
    libxml_clear_errors();
}

// Enable user error handling
libxml_use_internal_errors(true);

//$defUrl = "http://localhost/Tecnoimmobili/SITE/_export/export_immobili.php";
$defUrl = "http://www.tecnoimmobiligroup.it/_export/export_immobili.php";
$xmlUrl = isset($_POST["xmlUrl"])?$_POST["xmlUrl"]:$defUrl;

$xml = new DOMDocument();
$xml->load($xmlUrl);

if (!$xml->schemaValidate('XML_XSD/xsd_validator.xsd')) {
    print '<b style=\'color:red\'>DOMDocument::schemaValidate() Generated Errors!</b>';
    libxml_display_errors();
}else{

    echo "<b style='color:green'>Xml valido</b><br>";
    //exit();
    include("../../config.php");
    require_once(BASE_PATH."/app/classes/PropertyManager.php");
    require_once(BASE_PATH."/app/classes/SessionManager.php");
    require_once(BASE_PATH."/app/classes/UserEntity.php");
    require_once(BASE_PATH."/app/classes/MagazineManager.php");
    require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
    require_once(BASE_PATH."/app/classes/ImageHelper/ImageManager.php");
    require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $imgH = new ImagesInfo();
    $mng    = new PropertyManager();
    $mgzMng = new MagazineManager();
    $dbH    = new GenericDbHelper();

    echo("<br>Tot Immobili nell Xml =>".$xml->getElementsByTagName('property')->length."<br>");
    //exit();
    foreach ($xml->getElementsByTagName('property') as $property)
    {



        $id_easyWork            = $property->getAttribute("id_ew");
        //$id_agency             = $property->getElementsByTagName('agency_id')->item(0)->nodeValue;
        $p_iva                  = $property->getElementsByTagName('agency_p_iva')->item(0)->nodeValue;
        $id_agency              = findAgency($p_iva);   // troverò l' agenzia tramite la partita iva
        $id_agent               = $property->getElementsByTagName('agent_id')->item(0)->nodeValue;

        $price                  = $property->getElementsByTagName('price')->item(0)->nodeValue;

        $auction                = $property->getElementsByTagName('asta_immobiliare')->item(0)->nodeValue;
        if($auction == 1){
            $id_contract = 7;
        }else{
            $contract_txt           = $property->getElementsByTagName('contract')->item(0)->nodeValue;
            $id_contract            = getTableIdFromValue("property_contracts",$contract_txt,"id","title");
        }


        $id_contract_status     = $property->getElementsByTagName('id_contract_status')->item(0)->nodeValue;

        $country_txt            = $property->getElementsByTagName('country')->item(0)->nodeValue;
        $id_country             = getTableIdFromValue("geo_country",$country_txt,"id","title");

        $region_txt             = $property->getElementsByTagName('region')->item(0)->nodeValue;
        $id_region              = getTableIdFromValue("geo_region",$region_txt,"id","title");

        $city_txt               = $property->getElementsByTagName('city')->item(0)->nodeValue;
        $id_city              = getTableIdFromValue("geo_city",$city_txt,"id","title");

        $town_txt               = $property->getElementsByTagName('town')->item(0)->nodeValue;
        $id_town                = getTableIdFromValue("geo_town",$town_txt,"id","title");

        $district_txt           = $property->getElementsByTagName('district')->item(0)->nodeValue;
        $id_district            = getTableIdFromValue("geo_district",$district_txt,"id","title");


        $street                 = $property->getElementsByTagName('street')->item(0)->nodeValue;
        $streetNum              = $property->getElementsByTagName('street_num')->item(0)->nodeValue;
        $show_address           = $property->getElementsByTagName('street')->item(0)->getAttribute('show_address');
        $longitude              = $property->getElementsByTagName('longitude')->item(0)->nodeValue;
        $latitude               = $property->getElementsByTagName('latitude')->item(0)->nodeValue;

        $category_txt           = $property->getElementsByTagName('category')->item(0)->nodeValue;
        $id_category            = getTableIdFromValue("property_categories",$category_txt,"id","title");


        $tipology_txt           = $property->getElementsByTagName('tipology')->item(0)->nodeValue;
        $id_tipology            = getTableIdFromValue("property_tipologies",$tipology_txt,"id","title");


        $mq                     = $property->getElementsByTagName('mq')->item(0)->nodeValue;
        $price                  = $property->getElementsByTagName('price')->item(0)->nodeValue;
        $neg_reserved           = $property->getElementsByTagName('negotiation_reserved')->item(0)->nodeValue;

        $locals_txt             = $property->getElementsByTagName('id_locals')->item(0)->nodeValue;
        $id_locals              = getTableIdFromValue("property_locals",$locals_txt,"id","title_short");


        $rooms_txt              = $property->getElementsByTagName('id_rooms')->item(0)->nodeValue;
        $id_rooms               = getTableIdFromValue("property_rooms",$rooms_txt,"id","title_short");

        $bathrooms_txt         = $property->getElementsByTagName('id_bathrooms')->item(0)->nodeValue;
        $id_bathrooms          = getTableIdFromValue("property_bathrooms",$bathrooms_txt,"id","title_short");


        $floor_txt              = $property->getElementsByTagName('id_floor')->item(0)->nodeValue;
        $id_floor               = getTableIdFromValue("property_floors",$floor_txt,"id","title_short");

        $elevator_txt           = $property->getElementsByTagName('id_elevator')->item(0)->nodeValue;
        $id_elevator            = getTableIdFromValue("property_elevators",$elevator_txt,"id","title_short");

        $heating_txt             = $property->getElementsByTagName('id_heating')->item(0)->nodeValue;
        $id_heating             = getTableIdFromValue("property_heatings",$heating_txt,"id","title_short");

        $box_txt                = $property->getElementsByTagName('id_box')->item(0)->nodeValue;
        $id_box                 = getTableIdFromValue("property_box",$box_txt,"id","title_short");

        $garden_txt              = $property->getElementsByTagName('id_garden')->item(0)->nodeValue;
        $id_garden               = getTableIdFromValue("property_gardens",$garden_txt,"id","title_short");

        $property_conditions_txt = $property->getElementsByTagName('id_property_conditions')->item(0)->nodeValue;
        $id_property_conditions               = getTableIdFromValue("property_conditions",$property_conditions_txt,"id","title_short");

        $property_status_txt     = $property->getElementsByTagName('id_property_status')->item(0)->nodeValue;
        $id_property_status      = getTableIdFromValue("property_status",$property_status_txt,"id","title_short");

        $id_ads_status          = $property->getElementsByTagName('id_ads_status')->item(0)->nodeValue;

        $prestige               = $property->getElementsByTagName('prestige')->item(0)->nodeValue;
        $price_lowered          = $property->getElementsByTagName('price_lowered')->item(0)->nodeValue;
        $video_url              = $property->getElementsByTagName('video_url')->item(0)->nodeValue;
        $description            = $property->getElementsByTagName('description')->item(0)->nodeValue;

        $energy_class_txt       = $property->getElementsByTagName('id_energy_class')->item(0)->nodeValue;
        $id_energy_class        = getTableIdFromValue("property_energy_class",$energy_class_txt,"id","title");

        $ipe_um_txt             = $property->getElementsByTagName('id_ipe_um')->item(0)->nodeValue;
        $id_ipe_um              = getTableIdFromValue("property_ipe_um",$ipe_um_txt,"id","title");

        $ipe                    = $property->getElementsByTagName('ipe')->item(0)->nodeValue;
        $views                  = $property->getElementsByTagName('views')->item(0)->nodeValue;
        // DATI INCARICO

        $images = array();
        foreach($property->getElementsByTagName('url') as $url){
            $val = $url->nodeValue;
            if($val!="")
                array_push($images,$val);
        }

        // DATI INCARICO
        $owner_name = $property->getElementsByTagName('owner_name')->item(0)->nodeValue;
        $owner_tel_home = $property->getElementsByTagName('owner_tel_home')->item(0)->nodeValue;
        $owner_tel_office = $property->getElementsByTagName('owner_tel_office')->item(0)->nodeValue;
        $owner_mobile = $property->getElementsByTagName('owner_mobile')->item(0)->nodeValue;
        $owner_address = $property->getElementsByTagName('owner_address')->item(0)->nodeValue;
        $owner_town = $property->getElementsByTagName('owner_town')->item(0)->nodeValue;
        $occupant_name = $property->getElementsByTagName('occupant_name')->item(0)->nodeValue;
        $occupant_tel = $property->getElementsByTagName('occupant_tel')->item(0)->nodeValue;
        $appointment_date = $property->getElementsByTagName('appointment_date')->item(0)->nodeValue;
        $appointment_start_date = $property->getElementsByTagName('appointment_start_date')->item(0)->nodeValue;
        $appointment_end_date= $property->getElementsByTagName('appointment_end_date')->item(0)->nodeValue;
        $appointment_agent = $property->getElementsByTagName('appointment_agent')->item(0)->nodeValue;
        $appointment_channel = $property->getElementsByTagName('appointment_channel')->item(0)->nodeValue;
        $appointment_conditions = $property->getElementsByTagName('appointment_conditions')->item(0)->nodeValue;
        $appointment_renwable = $property->getElementsByTagName('appointment_renwable')->item(0)->nodeValue;
        $appointment_note = $property->getElementsByTagName('appointment_note')->item(0)->nodeValue;


        $id = saveProperty($id_easyWork,$id_contract,$id_contract_status,$id_country,$id_region,$id_city,$id_town,$id_district,$street,$streetNum,$show_address,$latitude,$longitude,$id_category,$id_tipology,$mq,$price,$neg_reserved,$id_locals,$id_rooms,$id_bathrooms,$id_floor,$id_elevator,$id_heating,$id_box,$id_garden,$id_property_conditions,$id_property_status,$id_ads_status,$prestige,$price_lowered,$video_url,"",$id_energy_class,$id_ipe_um,$ipe, $images,$description,$id_agency,$views);

        if($id != "errore nel salvataggio dell' immobile con id EW= ".$id_easyWork."<br>") {
            // Saving Appointment
            if ($id_easyWork != null) {
                $resAppointment = $mng->saveAppointment($id, $owner_name, "", $owner_tel_home, $owner_tel_office, $owner_mobile, $owner_address, $owner_town, $occupant_name, "", $occupant_tel, $appointment_date, $appointment_start_date, $appointment_end_date, $appointment_agent, $appointment_channel, $appointment_conditions, $appointment_renwable, $appointment_note);
                if ($resAppointment == "" || $resAppointment == null) {
                    echo("errore - Salvataggio Appuntamento dell immobile con id EW = ".$id_easyWork."<br>");
                    return;
                }
            }
        }else{
            echo $id;
        }

    }



    echo("<br>Finito <br>");
    // FINE CALCOLO TEMPO DI ESECUZIONE
    $time_end = microtime(true);
    $time = $time_end - $time_start;
    echo("<br><br>");
    echo 'Tempo di esecuzione : '.Round($time,2).' seconds';
    //--------------------------------------

}

function getTableIdFromValue($table,$value,$fieldToSearch ="title",$fielldToCompare ="title_short"){
    global $dbH;
    $dbH->setTable($table);

    $res = $dbH->read("$fielldToCompare = ?","limit 1",array($value) ,$fieldToSearch,false);
    if(Count($res)>0)
        return $res[0][$fieldToSearch];
    else
        return false;
}

function findAgency($p_iva){ // se non trova l' agenzia ritorna l' agenzia con id 1
    global $dbH;
    $dbH->setTable("agencies");

    $res = $dbH->read("p_iva = ?"," limit 1 ",array($p_iva) ,"id",$printQuery = false);
    if(Count($res)>0)
        return $res[0]["id"];
    else
        return 1;
}

function getAgentFromAgency($id_agency){
    global $dbH;
    $dbH->setTable("agency_operators");

    $res = $dbH->read("id_agency = ?"," order by  id_user_type asc,id asc ",array($id_agency) ,"id",false);
    if(Count($res)>0)
        return $res[0]["id"];
    else
        return false;
}




function saveProperty($id_easyWork,$id_contract,$id_contract_status,$id_country,$id_region,$id_city,$id_town,$id_district,$street,$streetNum,$show_address,$latitude,$longitude,$id_category,$id_tipology,$mq,$price,$neg_reserved,$id_locals,$id_rooms,$id_bathrooms,$id_floor,$id_elevator,$id_heating,$id_box,$id_garden,$id_property_conditions,$id_property_status,$id_ads_status,$prestige,$price_lowered,$video_url,$id_description,$id_energy_class,$id_ipe_um,$ipe ,$images,$txt_description,$id_agency,$views = 0)
{
    global $mng, $mgzMng;

    $id_easyWork = $id_easyWork == 0?null:$id_easyWork;

    $values = array($id_easyWork,$id_contract, $id_contract_status, $id_country, $id_region, $id_city, $id_town, $id_district, $street, $streetNum, $show_address, $latitude, $longitude, $id_category, $id_tipology, $mq, $price, $neg_reserved, $id_locals, $id_rooms, $id_bathrooms, $id_floor, $id_elevator, $id_heating, $id_box, $id_garden, $id_property_conditions, $id_property_status, $id_ads_status, $prestige, $price_lowered, $video_url, $id_description, $id_energy_class, $id_ipe_um, $ipe,$views, date("Y-m-d H:i:s"));
    $fields = array("id_easywork","id_contract","id_contract_status","id_country","id_region","id_city","id_town","id_district","street","street_num","show_address","longitude","latitude","id_category","id_tipology","mq","price","negotiation_reserved","id_locals","id_rooms","id_bathrooms","id_floor","id_elevator","id_heating","id_box","id_garden","id_property_conditions","id_property_status","id_ads_status","is_prestige","is_price_lowered","video_url","id_description","id_energy_class","id_ipe_um","ipe","views","date_up");


    $imgNames = saveImages($images);


    $id_agent = getAgentFromAgency($id_agency);

    //saving ads
    $id_property = $mng->saveProperty($values,$fields,false);//res must be the id of ads or an error

    // if not save i will not execute the next command
    if ($id_property != null && $id_property != "" & $id_property !="errore - Salvataggio immobile fallito") {

        // create reference code and update it on table
        $res_refC = $mng->createRefenceCode($id_property);
        if ($res_refC == "" || $res_refC == null) {
            echo("errore - Salvataggio del codice di riferimento fallito per l' immobile con id ".$id_property."<br>");
            return;
        }

        // RELATE AGENT WITH PROPERTY
        $res_rel = $mng->savePropertyAgentRelations($id_agency, $id_agent, $id_property,false);
        if ($res_rel == "" || $res_rel == null) {
            echo("errore - Salvataggio della relazione Immbile - agenzia fallito per l' immobile con id ".$id_property."<br>");
            return;
        }


        // Saving Description
        $res_desc = $mng->saveDescription($id_property, $txt_description, "");
        if ($res_desc == "" || $res_desc == null) {

            echo("errore - Salvataggio della descrizione fallito per l' immobile con id ".$id_property."<br>");
            return;
        }

        // Saving Images
        $resImgs = $mng->saveImages($id_property, $imgNames);
        if ($resImgs == "" || $resImgs == null) {
            echo("errore - Salvataggio di alcune immagini per l' immobile con id ".$id_property."<br>");
            return;
        }



        // SET PROPERTY ON MAGAZINE TABLE (WITH STATUS DISABLED)
        $resMagazine = $mgzMng->addOnMangazine($id_property, $id_agency, 0);
        if ($resMagazine == "" || $resMagazine == null) {
            echo("errore - Salvataggio nella rivista<br>");
            return;
        }
        return $id_property;
    }else{
        return "errore nel salvataggio dell' immobile<br>";
    }

}


function saveImages($images){
    global $imgMng;
    $imgNames = array();
    foreach($images as $image){
        $imgName = saveImage($image);
        array_push($imgNames,$imgName);
    }
    return $imgNames;
}

function saveImage($image){
    global $imgH;
    if($image == "http://www.tecnoimmobiligroup.it/")
        return "";
    $date = Date("Y-m-d_h-i-s");
    $new_img_name = "img_".$date."_".rand(0,50);
    $imageToSave 		= file_get_contents($image);
    $imgInfo = pathinfo($image);
    $imageName 	= $imgInfo['filename'].".".$imgInfo['extension'];

    //echo($imageToSave);
    $imgMng = new ImageManager($imageToSave,$imageName);


    // RESIZE IMAGE Extra
    $info = $imgH->info["properties"]["extra"];
    $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = BASE_PATH."/".$info["path"];
    $imgMng->saveImage($save_path, $new_img_name, $info["quality"]);
    //imposto  l' url dell' immagine da stampare
    $imgName = $imgMng->getSavedImgName();

    // RESIZE IMAGE Big
    $imgMng->setImage($imageToSave,$imageName);
    $info = $imgH->info["properties"]["big"];
    $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = BASE_PATH."/".$info["path"];
    $imgMng->saveImage($save_path, $new_img_name, $info["quality"]);


    // RESIZE IMAGE Normal
    $imgMng->setImage($imageToSave,$imageName);
    $info = $imgH->info["properties"]["normal"];
    $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = BASE_PATH."/".$info["path"];
    $imgMng->saveImage($save_path, $new_img_name, $info["quality"]);

    // RESIZE IMAGE Medium
    $imgMng->setImage($imageToSave,$imageName);
    $info = $imgH->info["properties"]["medium"];
    $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = BASE_PATH."/".$info["path"];
    $imgMng->saveImage($save_path, $new_img_name, $info["quality"]);

    // RESIZE IMAGE Min
    $imgMng->setImage($imageToSave,$imageName);
    $info = $imgH->info["properties"]["min"];
    $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = BASE_PATH."/".$info["path"];
    $imgMng->saveImage($save_path, $new_img_name, $info["quality"]);

    return $imgName;
}


