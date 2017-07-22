<?php


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

$xml = new DOMDocument();
$xml->load('http://localhost/Tecnoimmobili/SITE/_export/export_immobili.php');

if (!$xml->schemaValidate('XML_XSD/xsd_validator.xsd')) {
    print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
    libxml_display_errors();
}else{
    echo"valido";
    include("../../config.php");
    include(BASE_PATH."/app/classes/PropertyManager.php");
    include(BASE_PATH."/app/classes/SessionManager.php");
    include(BASE_PATH."/app/classes/UserEntity.php");
    include(BASE_PATH."/app/classes/MagazineManager.php");
    include(BASE_PATH."/app/classes/GenericDbHelper.php");
    $mng    = new PropertyManager();
    $mgzMng = new MagazineManager();
    $dbH = new GenericDbHelper();



    foreach ($xml->getElementsByTagName('property') as $property)
    {
        $id_easyWork            = $property->getAttribute("id_ew");
        //$id_agency              = $property->getElementsByTagName('agency_id')->item(0)->nodeValue;
        $p_iva                  = $property->getElementsByTagName('agency_p_iva')->item(0)->nodeValue;
        $id_agency              = findAgency($p_iva);   // troverò l' agenzia tramite la partita iva
        $id_agent               = $property->getElementsByTagName('agent_id')->item(0)->nodeValue;

        $price                  = $property->getElementsByTagName('price')->item(0)->nodeValue;

        $contract_txt           = $property->getElementsByTagName('contract')->item(0)->nodeValue;
        $id_contract            = getTableIdFromValue("property_contracts",$contract_txt,"id","title");

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
        $images = array("test1","test2","test2","test2","test2","test2","test2","test2","test2","test2");





        saveProperty($id_contract,$id_contract_status,$id_country,$id_region,$id_city,$id_town,$id_district,$street,$streetNum,$show_address,$latitude,$longitude,$id_category,$id_tipology,$mq,$price,$neg_reserved,$id_locals,$id_rooms,$id_bathrooms,$id_floor,$id_elevator,$id_heating,$id_box,$id_garden,$id_property_conditions,$id_property_status,$id_ads_status,$prestige,$price_lowered,$video_url,"",$id_energy_class,$id_ipe_um,$ipe, $images,$description,$id_agency);

    }

    // NB per id_locals 0 deve diventare NN





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




function saveProperty($id_contract,$id_contract_status,$id_country,$id_region,$id_city,$id_town,$id_district,$street,$streetNum,$show_address,$latitude,$longitude,$id_category,$id_tipology,$mq,$price,$neg_reserved,$id_locals,$id_rooms,$id_bathrooms,$id_floor,$id_elevator,$id_heating,$id_box,$id_garden,$id_property_conditions,$id_property_status,$id_ads_status,$prestige,$price_lowered,$video_url,$id_description,$id_energy_class,$id_ipe_um,$ipe ,$images,$txt_description,$id_agency)
{
    global $mng, $mgzMng;

    $values = array($id_contract, $id_contract_status, $id_country, $id_region, $id_city, $id_town, $id_district, $street, $streetNum, $show_address, $latitude, $longitude, $id_category, $id_tipology, $mq, $price, $neg_reserved, $id_locals, $id_rooms, $id_bathrooms, $id_floor, $id_elevator, $id_heating, $id_box, $id_garden, $id_property_conditions, $id_property_status, $id_ads_status, $prestige, $price_lowered, $video_url, $id_description, $id_energy_class, $id_ipe_um, $ipe, date("Y-m-d H:i:s"));



    $id_agent = getAgentFromAgency($id_agency);

    //saving ads
    $id_property = $mng->saveProperty($values,null,false);//res must be the id of ads or an error
    $res = $id_property;

    // if not save i will not execute the next command
    if ($id_property != null && $id_property != "" & !strpos($id_property, "error")) {

        // create reference code and update it on table
        $res_refC = $mng->createRefenceCode($id_property);
        if ($res_refC == "" || $res_refC == null) {
            echo("errore - Salvataggio del codice di riferimento fallito");
            exit;
        }

        // RELATE AGENT WITH PROPERTY
        $res_rel = $mng->savePropertyAgentRelations($id_agency, $id_agent, $id_property,false);
        if ($res_rel == "" || $res_rel == null) {
            echo("errore - Salvataggio della relazione Immbile - agenzia fallito");
            exit;
        }


        // Saving Description
        $res_desc = $mng->saveDescription($id_property, $txt_description, "");
        if ($res_desc == "" || $res_desc == null) {

            echo("errore - Salvataggio della descrizione fallito ");
            exit;
        }

        // Saving Images
        $resImgs = $mng->saveImages($id_property, $images);
        if ($resImgs == "" || $resImgs == null) {
            echo("errore - Salvataggio di alcune immagini");
            exit;
        }

        // SET PROPERTY ON MAGAZINE TABLE (WITH STATUS DISABLED)
        $resMagazine = $mgzMng->addOnMangazine($id_property, $id_agency, 0);
        if ($resMagazine == "" || $resMagazine == null) {
            echo("errore - Salvataggio nella rivista");
            exit;
        }
    }
}


?>