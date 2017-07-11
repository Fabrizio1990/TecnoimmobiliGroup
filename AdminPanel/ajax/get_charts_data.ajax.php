
<?php
header('Content-type: text/json; charset=utf-8');
require("../../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

include(BASE_PATH."/app/classes/StatisticsDataManager.php");



if( SessionManager::getVal("authenticated") != null && isset($_POST["chartType"])) {
    $stManager = new StatisticsDataManager();
    $chartType = $_POST["chartType"];
    $ret =[];
    switch($chartType){
        case "visitators":
            $fromD = $_POST["fromDate"];
            $toD   = $_POST["toDate"];
            $ret = $stManager->getVisitatorsChartData($fromD,$toD);
            break;
        case "browsers":
            $ret = $stManager->getBrowsersChartData();
            break;
    }

    echo(json_encode($ret));



}else{

    echo("Accesso Non Autorizzato");
}
