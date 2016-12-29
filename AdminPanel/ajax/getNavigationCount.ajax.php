<?php 
if(isset($_POST["DATE_FROM"])&& isset($_POST["DATE_TO"])){
    include("../../config.php");
	//require_once("../../include/connessione_mysqli.php");
	require_once(BASE_PATH."/app/classes/statistics/NavigationStatistics.php");
	//$conn = openConn();

	$dateFrom = $_POST["DATE_FROM"];
	$dateTo = $_POST["DATE_TO"];
	$helper = new NavigationStatistics($conn);
	$stats = $helper->getVisitatorCount($dateFrom,$dateTo);
	
	//closeConn($conn);
	echo($stats);
	
}else{
	echo("no params send");
}

?>