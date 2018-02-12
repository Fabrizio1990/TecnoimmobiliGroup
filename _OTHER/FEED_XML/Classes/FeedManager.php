<?php
require_once ("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/app/classes/FileHelper/FileHelper.php");
class FeedManager
{


    public function generateFeed($feedName){
        $feedInfoMng = new FeedInfo();
        $feedMng = null;
        $feedFile = "";

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

        $feedFilterField = $feedInfo[0]["filter_field"];
        $feedFilterVal = $feedInfo[0]["filter_value"];


        $templateContainer = FileHelper::readFile($folderTemplateXML."/".$feedInfo[0]["template"]);
        $templateRepeat = FileHelper::readFile($folderTemplateXML."/".$feedInfo[0]["template_items"]);

        switch($feedName){
            case "trovit":
                $feedMng = new FeedTroivt($portalId,$templateContainer,$templateRepeat);

                break;

        }

        $params = array();
        $values = array();
        $idList = "";

        $dbH = new GenericDbHelper();
        $dbH->setTable("prt_portal_properties");
        $pIds = $dbH->read("id_portal = ?",null,array($portalId),null);
        if(Count($pIds) > 0){
            for($i = 0 ; $i<Count($pIds); $i++){
                $idList .= $pIds[$i]["id"].",";
            }
            $idList = rtrim($idList,",");
            array_push($params,"id in($idList)");

        }

        $dbH->setTable("properties_view");

        array_push($params,"$feedFilterField = ?");
        array_push($values,$feedFilterVal);

        $rst = $dbH->read($params,null,$values,null);
        //ar_dump($rst);

        $feedFile = $feedMng->getPropertyFeed($rst);

        echo($feedFile);



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