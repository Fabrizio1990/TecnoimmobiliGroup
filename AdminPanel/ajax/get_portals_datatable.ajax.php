<?php

	header('Content-type: text/json; charset=utf-8');
	include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $imgH = new ImagesInfo();

    $info = $imgH->info;

    $prtMng = new PortalManager();

	$ret = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati


    $res = $prtMng->getPortalList();


    $resultFound = Count($res);
    if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
        for($i=0;$i<$resultFound;$i++) {

            $date_ins ="<input type='hidden' value='".$res[$i]["portal_date_ins"] ."' />" . Date("d-m-Y", strtotime($res[$i]["portal_date_ins"]));
            $name   = htmlentities($res[$i]["portal_name"], ENT_QUOTES);
            $img_logo = "<img src='".SITE_URL."/".$res[$i]["logo_path"]."' alt='$name' />";
            $notes   = htmlentities($res[$i]["notes"], ENT_QUOTES);
            $limitEntries = $res[$i]["entries_max"];
            $currentEntries = $res[$i]["count_properties"];
            $portal_status  = $res[$i]["portal_enabled"];

            array_push($ret["aaData"],array($img_logo,$name,$notes,$limitEntries,$currentEntries,$portal_status,$date_ins));

        }
    }



	echo(json_encode($ret));



?>