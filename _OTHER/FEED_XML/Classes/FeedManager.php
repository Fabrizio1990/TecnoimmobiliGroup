<?php
require_once ("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/app/classes/FileHelper/FileHelper.php");
class FeedManager
{


    public function getFeed($feedName){
        $feedInfoMng = new FeedInfo();

        $items="";
        $today =date("Y-m-d");

        $printed = 0;
        $folderTemplateXML =BASE_PATH."/_OTHER/FEED_XML/template_feed";
        $feeder = null;



        $portalId = $feedInfoMng->getPortalIdFromFeed($feedName);
        $feedExtension = $feedInfoMng->getFeedExtension();
        $feedInfo = $feedInfoMng->getFeedData($feedName);



        if(Count($feedInfo) <=0){
            header("content-type: text/text");
            echo("Siamo spiacenti ma non esiste nessun feed con questo nome.");
            exit;
        }
        if($feedInfo[0]["enabled"] == 0 ){
            header("content-type: text/text");
            echo("Siamo spiacenti Questo feed è stato disabilitato.");
            exit;
        }

        switch($feedName){
            case "esaJob":
                //$feeder=new EsaJobFeeder();
                break;


        }

        $templateContainer = FileHelper::readFile($folderTemplateXML.$feedName.$feedExtension);
        $templateRepeat = FileHelper::readFile($folderTemplateXML.$feedName."_item".$feedExtension);




    }


    function writeFeed($path,$feed){
        $XMLFile = fopen($path, "w") or die("can't open file");
        fwrite($XMLFile, $feed);
        fclose($XMLFile);
    }

    function writeOnFtp($ftp_server,$ftp_username,$ftp_password,$ftp_folder,$local_file){
        $ret = FtpHelper::writeFileOnFtp($ftp_server,$ftp_username,$ftp_password,$ftp_folder,$local_file);
        return $ret;
    }


}