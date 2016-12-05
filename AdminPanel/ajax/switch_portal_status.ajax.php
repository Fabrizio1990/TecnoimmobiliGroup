<?php
// sessione per selezione voce menù
set_time_limit(0);
session_start();
if(isset($_SESSION["autenticato"])){
	if($_SESSION["autenticato"]!="1") exit;
}else{
	exit;
}

include("../../include/connessione_mysqli.php");
include("../../class/TecnoimmobiliSiteHelper/PortalsHelper.php");
$id = $_GET["id"];

$conn = openConn();

$helper = new PortalsHelper($conn);
$ret = $helper->switchAdsStatus($id);


closeConn($conn);
echo $ret;














?>