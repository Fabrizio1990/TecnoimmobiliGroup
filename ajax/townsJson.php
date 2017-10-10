<?php
include("../config.php");
include(BASE_PATH."/app/classes/GeographicManager.php");
include(BASE_PATH."/app/classes/Utils.php");

$geoMng = new GeographicManager();

$townFilter = isset($_GET["query"])?$_GET["query"]:"";

$params = $townFilter!=""?"comune Like '%$townFilter%'":"";
//$paramsVal = $townFilter!=""?$townFilter:array();

//$res = $geoMng->read($params,"group_by comune",null,array("id_comune","comune"),true);
$res = $geoMng->executeQuery("Select id,title from geo_town where title Like'$townFilter%' Limit 5");
//var_dump($res);
$ret = Utils::rstToOptionsJson($res,"id","name");

echo($ret);