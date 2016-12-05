<?php
// sessione per selezione voce menù
error_reporting(E_ALL);
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

$property = new Property($conn,$id,"mostra_rivista");

$ret = $property->switchNewsStatus();


closeConn($conn);
echo "return = ".$ret;














?>