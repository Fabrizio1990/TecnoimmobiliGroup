
<?php
//TODO IMPOSTARE PATH IMMAGINE PICCOLA ,recuperare campi veri e non id , immagini non ancora presenti, prenderle dall' altro sito e molte altre cose da finire
header('Content-type: text/json; charset=utf-8');
include("../../config.php");
include(BASE_PATH."/app/classes/UserManager.php");
include(BASE_PATH."/app/classes/AgencyManager.php");


$rand_num = Rand(0,100);

$agencyMng = new AgencyManager();
$array = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati



$fields = Array("id","logo_path","name","region","town","street","street_num","description","id_status","status_icon","date_ins","date_up");
$res = $agencyMng->getAgenciesData("id_status<>3",null,null,$fields,false);

$resultFound = Count($res);
if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
    for($i=0;$i<$resultFound;$i++) {
        $resImg = "";


        // COLUM LOGO

        // Description of agency (showed if hover on logo "img title")
        $description = htmlentities($res[$i]["description"], ENT_QUOTES);
        $description = $description ==""?"Nessuna descrizione":$description;

        $imgPath = SITE_URL."/public/images/images_agencies_icons/min/".$res[$i]["logo_path"];
        $first_col = "
            <form name='goToAgency' id='goToAgency' method='POST' ACTION='".SITE_URL."/AdminPanel/agency_add.php'>
            <input type='hidden' name='id_agency' value='".$res[$i]["id"]."'>
            <img onclick='this.parentNode.submit()' class='real_tumb POINTER agency_logo' title='".$description."' src=".$imgPath."?id=". $rand_num ."?id=". $rand_num . "' /> </form>";


        // COLUMN NAME
        $name = $res[$i]["name"];
        // COLUMN REGION
        $region = $res[$i]["region"];
        // COLUMN CITY
        $city = $res[$i]["town"];
        // COLUMN STREET
        $street = $res[$i]["street"].", ".$res[$i]["street_num"];
        // COLUMN STATUS
        $status = "<input type='checkbox' class='switch' " .($res[$i]["id_status"]=="1"?"checked":"") .">";
        // COLUMN DATE INS
        $date_ins = Date("d-m-Y", strtotime($res[$i]["date_ins"]));
        // COLUMN DATE UP
        $date_up = $res[$i]["date_up"]!=""?Date("d-m-Y", strtotime($res[$i]["date_up"])):$date_ins;

        array_push($array["aaData"],array($first_col,$name,$region,$city,$street,$status,$date_ins,$date_up));

    }
}

echo(json_encode($array));



?>