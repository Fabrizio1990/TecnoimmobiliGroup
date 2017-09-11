<?php

if(isset($_POST["province"])){
	require("../../../include/connessione_mysqli.php");
	require("../../../class/TecnoimmobiliSiteHelper/DbTableManager.php");
	
	$conn = openConn();
	
	$province = mysqli_escape_string($conn,urldecode($_POST["province"]));
	$province = str_replace(",","','",$province);
	$res = DbTableManager::getDbOpts($conn,"geografica","comune as val","comune as text","provincia in('".$province."')","comune asc","comune");
	
	echo(json_encode($res));
	
	closeConn($conn);
}

?>