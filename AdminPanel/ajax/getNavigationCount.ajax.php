<?php 
if(isset($_POST["DATE_FROM"])&& isset($_POST["DATE_TO"])){
	require_once("../../include/connessione_mysqli.php");
	require_once("../../class/Navigation_helper/NavigationStatistics.php");
	$conn = openConn();

	$dateFrom = $_POST["DATE_FROM"];
	$dateTo = $_POST["DATE_TO"];
	$helper = new NavigationStatistics($conn);
	$stats = $helper->getVisitatorCount($dateFrom,$dateTo);
	
	closeConn($conn);
	echo($stats);
	
}else{
	echo("no params send");
}

?>