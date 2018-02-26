<?php
header("content-type: text/text;charset=utf-8");

require ("../../config.php");

require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/app/classes/FtpHelper.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedManager.php");
require_once (BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
SetInclude(BASE_PATH."/_OTHER/FEED_XML/Classes/FeedsClasses");

if(!isset($_GET["portal"],$_GET["feed"])){
    echo("Accesso Non Autorizzato");
    exit;
}

$portal = $_GET["portal"];
$feed_name = $_GET["feed"];

$feed = new FeedManager();

$feed->generateFeed($portal,$feed_name,true);




function SetInclude($folderPath){
    $files = scandir(  $folderPath . "/");
    foreach ( $files as $file)
        if($file!= "." && $file!= ".." && $file!= "helper.php")
            include($folderPath . "/" . $file);
}
?>