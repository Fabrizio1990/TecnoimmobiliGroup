<?php

if(isset($_POST["category"])){
	require("../../../include/connessione_mysqli.php");
	require("../../../class/TecnoimmobiliSiteHelper/DbTableManager.php");
	
	$conn = openConn();
	
	$category = mysqli_escape_string($conn,urldecode($_POST["category"]));
	$category = str_replace(",","','",$category);
	$res = DbTableManager::getDbOpts($conn,"categoria_immobile","tipologia as val","tipologia as text","categoria in('".$category."')","tipologia asc");
	
	echo(json_encode($res));
	
	closeConn($conn);
}

?>