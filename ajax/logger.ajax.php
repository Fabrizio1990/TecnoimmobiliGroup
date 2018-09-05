<?php
include("../config.php");
//include(BASE_PATH."/app/classes/LogHelper/Flog.php");

if(isset($_POST["log_txt"])){

    $logTxt = $_POST["log_txt"];
    $logType = isset($_POST["log_type"])? $_POST["log_type"]:1; //1 info , 2 error
    $logFileName = isset($_POST["filename"])?$_POST["filename"]:($logType == 1?"log_info":"log_error");

    echo("CALL LOG TO FILE");
    Flog::logInfo($logTxt,$logFileName);
}
?>