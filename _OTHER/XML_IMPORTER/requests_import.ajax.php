<?php
// INIZIO CALCOLO DEL TEMPO DI ESECUZIONE
$time_start = microtime(true);
//----------------------------

// TODO , MANCANO I DATI DELL' APPUNTAMENTO
set_time_limit (0);



// Enable user error handling
libxml_use_internal_errors(true);

//$defUrl = "http://localhost/Tecnoimmobili/SITE/_export/export_immobili.php";
$defUrl = "http://www.tecnoimmobiligroup.it/_export/export_richieste.php";
$xmlUrl = isset($_POST["xmlUrl"])?$_POST["xmlUrl"]:$defUrl;

$xml = new DOMDocument();
$xml->load($xmlUrl);



echo "<b style='color:green'>Xml valido</b><br>";
//exit();
include("../../config.php");
require_once(BASE_PATH."/app/classes/PropertyManager.php");
require_once(BASE_PATH."/app/classes/SessionManager.php");
require_once(BASE_PATH."/app/classes/RequestsManager.php");
require_once (BASE_PATH."/app/classes/GenericDbHelper.php");

$dbh = new GenericDbHelper();

echo("<br>Tot Richieste nell Xml =>".$xml->getElementsByTagName('request')->length."<br>");
foreach ($xml->getElementsByTagName('request') as $request)
{



    $id_easyWork = $request->getAttribute("id_ew");
    $id_tecnoimm = $request->getAttribute("id");
    $name = $request->getElementsByTagName('name')->item(0)->nodeValue;
    $lastname = $request->getElementsByTagName('lastname')->item(0)->nodeValue;
    $email = $request->getElementsByTagName('email')->item(0)->nodeValue;
    $phone = $request->getElementsByTagName('phone')->item(0)->nodeValue;
    $search_contract = $request->getElementsByTagName('contract')->item(0)->nodeValue;
    $search_tipology = $request->getElementsByTagName('search_tipology')->item(0)->nodeValue;
    $search_city = $request->getElementsByTagName('search_city')->item(0)->nodeValue;
    $search_town = $request->getElementsByTagName('search_town')->item(0)->nodeValue;
    $search_districts = $request->getElementsByTagName('search_districts')->item(0)->nodeValue;
    $search_price_min = $request->getElementsByTagName('search_price_min')->item(0)->nodeValue;
    $search_price_max = $request->getElementsByTagName('search_price_max')->item(0)->nodeValue;
    $search_mq_min = $request->getElementsByTagName('search_mq_min')->item(0)->nodeValue;
    $search_mq_max = $request->getElementsByTagName('search_mq_max')->item(0)->nodeValue;
    $activation_date = $request->getElementsByTagName('activation_date')->item(0)->nodeValue;
    $is_active = $request->getElementsByTagName('is_active')->item(0)->nodeValue;

    $contract = "";
    $categories ="";
    $tipologies ="";
    $regions ="";
    $cities = "";
    $towns = "";
    $districts = "";

    //COMINCIO A CONVERTIRE I VALORI IN ID

    //RECUPERO CONTRATTO
    $contract = getContract($search_contract);
    if($contract == ""){
        echo("ERRORE Req ID = ".$id_tecnoimm."  , IL CONTRATTO NON è STATO RICONOSCIUTO DAL DATABASE <br>");
        continue;
    }

    //RECUPERO ID CATEGORIE e TIPOLOGIE
    $tmp_tipologiesArray =  explode(",",$search_tipology);
    //var_dump($tmp_tipologiesArray);
    //echo("<br>");
    for($i = 0 ; $i < count($tmp_tipologiesArray);$i++){
        //echo("CONVERTO TIPOLOGIA =>".$tmp_tipologiesArray[$i]."<br>");
        $categorization = getCategorization($tmp_tipologiesArray[$i]);
        //echo("TIPOLOGIA CONVERTITA = ".$categorization["tipology"]."<br>");

        $categories .= (strpos($categories, $categorization["category"]) !== false)?"":($categorization["category"].",");
        $tipologies .= (strpos($tipologies, $categorization["tipology"]) !== false)?"":($categorization["tipology"].",");
    }
    $categories = rtrim($categories,",");
    $tipologies = rtrim($tipologies,",");

    if($categories == ""){
        echo("ERRORE Req ID = ".$id_tecnoimm."  , ALCUNE CATEGORIE NON SONO STATE RICONOSCIUTE  NEL DATABASE <br>");
        continue;
    }
    if($tipologies == ""){
        echo("ERRORE Req ID = ".$id_tecnoimm."  , ALCUNE TIPOLOGIE NON SONO STATE RICONOSCIUTE  NEL DATABASE <br><br>");
        continue;
    }


    //RECUPERO ZONE E RELATIVE PROVINCE COMUNI E REGIONI
    $tmp_districtsArray = explode(",",$search_districts);

    for($i = 0 ; $i < count($tmp_districtsArray);$i++){
        $geoInfo = getGeoGraphicInfo($tmp_districtsArray[$i],$search_town);
        if($geoInfo != ""){
            $districts .= (strpos($districts, $geoInfo["district"]) !== false)?"":($geoInfo["district"].",");
            $towns .= (strpos($towns, $geoInfo["town"]) !== false)?"":($geoInfo["town"].",");
            $cities .= (strpos($cities, $geoInfo["city"]) !== false)?"":($geoInfo["city"].",");
            $regions .= (strpos($regions, $geoInfo["region"]) !== false)?"":($geoInfo["region"].",");
        }
    }
    $districts = rtrim($districts,",");
    $towns = rtrim($towns,",");
    $cities = rtrim($cities,",");
    $regions = rtrim($regions,",");

    if($districts == ""){
        echo("ERRORE Req ID = ".$id_tecnoimm."  , RICONOSCIMENTO GEOGRAFICO NON RIUSCITO<br><br>");
        continue;
    }


    /*echo('$id_easyWork ='.$id_easyWork."<br>");
    echo('$id_tecnoimm ='.$id_tecnoimm."<br>");
    echo('$name ='.$name."<br>");
    echo('$lastname ='.$lastname."<br>");
    echo('$email ='.$email."<br>");
    echo('$phone ='.$phone."<br>");
    echo('$contract ='.$search_contract."<br>");
    echo('$search_tipology ='.$search_tipology."<br>");
    echo('$search_city ='.$search_city."<br>");
    echo('$search_town ='.$search_town."<br>");
    echo('$search_districts ='.$search_districts."<br>");
    echo('$search_price_min ='.$search_price_min."<br>");
    echo('$search_price_max ='.$search_price_max."<br>");
    echo('$search_mq_min ='.$search_mq_min."<br>");
    echo('$search_mq_max ='.$search_mq_max."<br>");
    echo('$activation_date ='.$activation_date."<br>");
    echo('$is_active ='.$is_active."<br>");
    echo("ID CONTRATTO = ".$contract."<br>");
    echo("ID CATEGORIE = ".$categories."<br>");
    echo("ID TIPOLOGIE = ".$tipologies."<br>");
    echo("ID ZONE = ".$districts."<br>");
    echo("ID COMUNI = ".$towns."<br>");
    echo("ID PROVINCIE = ".$cities."<br>");
    echo("ID REGIONI = ".$regions."<br>");
    echo("<br><br>");*/

    //TODO GESTIRE IL CAMPO TUTTE ricevuto dall' xml in "CATEGORIE ,TIPOLOGIE,GEOGRAFICA GENERICA)
    // TODO quando sono tutte selezionate (per qualsiasi campo) non aggiungo niente al db (es zone) ma dovrò mostrare tutte nella select e selezionarle tutte quando mando le newsletter
    // TODO salva anche la data di inserimento
    // TODO modifica pagina gestione richieste usando i due nuovi parametri
    $res= saveRequest($id_easyWork,$name,$email,$lastname,$phone,$contract,$categories,$tipologies,$regions,$cities,$towns,$districts,$search_price_min,$search_price_max,$search_mq_min,$search_mq_max,$is_active,"NULL");
    //var_dump($res);
    echo("ID RICHIESTA SALVATA = ".$res[0][0]."<br>");
    if ($res == "" || $res == null) {
        echo("ERRORE Req ID = ".$id_tecnoimm." E' AVVENUTO UN PROBLEMA NEL SALVATAGGIO DELLA RICHIESTA");
    }


}



echo("<br>Finito <br>");
// FINE CALCOLO TEMPO DI ESECUZIONE
$time_end = microtime(true);
$time = $time_end - $time_start;
echo("<br><br>");
echo 'Tempo di esecuzione : '.Round($time,2).' seconds';
//--------------------------------------


function saveRequest($id_easywork,$name,$email,$lastname,$phone,$contracts,$categories,$tipologies,$regions,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$enabled,$id_request = null){
    $rqMng    = new RequestManager();

    $res = $rqMng->saveRequest($id_easywork,$name,$lastname,$email,$phone,$contracts,$categories,$tipologies,$regions,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$enabled,$id_request,false);

    return $res;
}



function getContract($contractTxt){
    global $dbh;
    $ret = "";
    $res = $dbh->executeQuery("Select id from property_contracts where title =".$dbh->escapeString($contractTxt));
    if(count($res)>0){
        $ret= $res[0]["id"];
    }
    return $ret;
}

function getCategorization($tipologyTxt){
    global $dbh;
    $ret = "";
    $query = "Select id,id_category from property_tipologies where title =".$dbh->escapeString($tipologyTxt);
    //echo($query."<br>");
    $res = $dbh->executeQuery($query);
    if(count($res)>0){
        $ret["tipology"] = $res[0]["id"];
        $ret["category"] = $res[0]["id_category"];
    }else{
        echo("ERRORE  , LA TIPOLOGIA ".$tipologyTxt." NON E STATE RICONOSCIUTa  NEL DATABASE <br>");
    }
    return $ret;
}


function getGeoGraphicInfo($refDistrict,$refTowns){
    global $dbh;
    $ret = "";

    $towns_tmp = explode(",",$refTowns);
    $refTowns ="";
    foreach ($towns_tmp as $town){
        $refTowns.=$dbh->escapeString($town).",";
    }

    $refTowns = rtrim($refTowns,",");

    $query = "Select * from geographic_view where zona =".$dbh->escapeString($refDistrict)." and comune in($refTowns)";
    //echo($query);
    $res = $dbh->executeQuery($query);
    if(count($res)>0){
        $ret["district"] = $res[0]["id_zona"];
        $ret["town"] = $res[0]["id_comune"];
        $ret["city"] = $res[0]["id_provincia"];
        $ret["region"] = $res[0]["id_regione"];
    }
    return $ret;

}

function GetTown($refCity){
    global $dbh;
    $ret = "";


    $query = "Select * from geographic_view where city =".$dbh->escapeString($refCity);
    //echo($query);
    $res = $dbh->executeQuery($query);
    if(count($res)>0){
        $ret = $res[0]["id_city"];
    }
    return $ret;
}
