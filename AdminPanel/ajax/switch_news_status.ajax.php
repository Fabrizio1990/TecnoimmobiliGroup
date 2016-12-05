<?php
// sessione per selezione voce menù
session_start();
if(isset($_SESSION["autenticato"])){
	if($_SESSION["autenticato"]!="1") exit;
}else{
	exit;
}

include("../../include/connessione_mysqli.php");
include("../../class/TecnoimmobiliSiteHelper/Property.php");
$id = $_GET["id"];

$conn = openConn();

$property = new Property($conn,$id,"statoannuncio");

$ret = $property->switchPropertyStatus();


closeConn($conn);
echo $ret;














?>