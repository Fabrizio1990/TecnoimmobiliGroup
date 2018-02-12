<?php
header("content-type: text/text");

require ("../../config.php");

require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/app/classes/FtpHelper.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedManager.php");
require_once (BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once(BASE_PATH."/app/classes/GenericDbHelper.php");
SetInclude(BASE_PATH."/_OTHER/FEED_XML/Classes/FeedsClasses");

$webSite = $_GET["id"];

$feed = new FeedManager();

$feed->generateFeed($webSite,false);




function SetInclude($folderPath){
    $files = scandir(  $folderPath . "/");
    foreach ( $files as $file)
        if($file!= "." && $file!= ".." && $file!= "helper.php")
            include($folderPath . "/" . $file);
}
?>