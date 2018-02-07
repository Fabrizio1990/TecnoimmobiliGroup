<?php
header("content-type: text/text");

require ("../../config.php");

require (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require (BASE_PATH."/app/classes/FtpHelper.php");
require (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedManager.php");

$webSite = $_GET["id"];

$feed = new FeedManager();
echo $feed->getFeed($webSite,false);

?>