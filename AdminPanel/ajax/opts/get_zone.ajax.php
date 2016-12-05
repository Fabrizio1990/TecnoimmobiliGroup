<?php

if(isset($_POST["comune"])){
	require("../../../include/connessione_mysqli.php");
	require("../../../class/TecnoimmobiliSiteHelper/DbTableManager.php");
	
	$conn = openConn();
	
	$comune = mysqli_escape_string($conn,urldecode($_POST["comune"]));
	$comune = str_replace(",","','",$comune);
	$res = DbTableManager::getDbOpts($conn,"geografica","zona as val","zona as text","comune in('".$comune."')","zona asc","zona");
	
	echo(json_encode($res));
	
	closeConn($conn);
}

?>