<?php
header("content-type: text/html;charset=utf-8");


require ("../../config.php");

require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/app/classes/FtpHelper.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedManager.php");
require_once (BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
/*SetInclude(BASE_PATH."/_OTHER/FEED_XML/Classes/FeedsClasses");*/
error_reporting(E_ERROR);
if(!isset($_REQUEST["portal"],$_REQUEST["feed"])){
    echo("Accesso Non Autorizzato");
    exit;
}

$portal = $_REQUEST["portal"];
$feed_name = $_REQUEST["feed"];
$print = isset($_REQUEST["print"]) ?$_REQUEST["print"]:true;

$feed = new FeedManager();
if($portal != null && $feed_name != null && $portal != "" && $feed_name != "") {
    Flog::logInfo(
        "@@@@@@>INIZIO GENERAZIONE DEI FEED DEL PORTALE $portalName",
        "feed_generation",
        true,
        false,
        true
    );

    $ret = $feed->generateFeed($portal, $feed_name, $print);

    Flog::logInfo(
        "@@@@@@>FINE GENERAZIONE DEI FEED DEL PORTALE $portalName",
        "feed_generation",
        true,
        false,
        false
    );
}





/*function SetInclude($folderPath){
    $files = scandir(  $folderPath . "/");
    foreach ( $files as $file)
        if($file!= "." && $file!= ".." && $file!= "helper.php")
            require_once($folderPath . "/" . $file);
}*/
?>