<?php
require_once ("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/app/classes/FileHelper/FileHelper.php");

class FeedManager
{


    public function generateFeed($feedName, $printFeed = false){
        $feedInfoMng = new FeedInfo();
        $feedMng = null;
        $feedFile = "";

        $today =date("Y-m-d");

        $printed = 0;
        $folderTemplateXML =BASE_PATH."/_OTHER/FEED_XML/template_feed";
        $feeder = null;



        $portalId = $feedInfoMng->getPortalIdFromFeed($feedName);
        //$feedExtension = $feedInfoMng->getFeedExtension();
        $feedInfo = $feedInfoMng->getFeedData($feedName);




        if(Count($feedInfo) <=0){
            header("content-type: text/text");
            echo("Siamo spiacenti ma non esiste nessun feed con questo nome.");
            exit;
        }
        if($feedInfo[0]["enabled"] == 0 ){
            header("content-type: text/text;charset=utf-8");
            echo("Siamo spiacenti Questo feed è stato disabilitato.");
            exit;
        }

        //GET QUERY FILTER INFO
        $feedFilterField = $feedInfo[0]["filter_field"];
        $feedFilterVal = $feedInfo[0]["filter_value"];

        //GET SAVE PATH INFO
        $feedSavePath  = $feedInfo[0]["feed_folder"];
        $feedName      = $feedInfo[0]["feed_name"];
        $feedExtension = $feedInfo[0]["feed_extension"];
        $fullSavePath = $feedSavePath."/".$feedName.$feedExtension;

        $templateContainer = FileHelper::readFile($folderTemplateXML."/".$feedInfo[0]["template"]);
        $templateRepeat = FileHelper::readFile($folderTemplateXML."/".$feedInfo[0]["template_items"]);


        // GET RIGHT FEED CLASS
        $feedMng = $this->getManager($feedName,$portalId,$templateContainer,$templateRepeat);


        //GET ALL PROPRETIES TO SENT TO THIS PORTAL
        $params = array();
        $values = array();
        $idList = "";
        // GET PROPERTIES ID
        $dbH = new GenericDbHelper();
        $dbH->setTable("prt_portal_properties");
        $pIds = $dbH->read("id_portal = ?",null,array($portalId),null);
        // IF ONE OR MORE FOUND I WILL START TO CREATE PARAMS FOR A QUERY THAT WILL GET THE PROPERTIES INFO BASED ON ID
        if(Count($pIds) > 0){
            for($i = 0 ; $i<Count($pIds); $i++){
                $idList .= $pIds[$i]["id"].",";
            }
            $idList = rtrim($idList,",");
            array_push($params,"id in($idList)");

        }
        // GET THE PROPERTIES INFO BASED ON FOUNDED ID's
        $dbH->setTable("properties_view");
        array_push($params,"$feedFilterField = ?");
        array_push($values,$feedFilterVal);
        $rst = $dbH->read($params,null,$values,null);


        //GET FEED
        $feedFile = $feedMng->getPropertyFeed($rst);

        //PRINT FEED
        if($printFeed)
            echo($feedFile);

        //Write file on right folder
        $this->writeFeed($fullSavePath,$feedFile);


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


    // ************************************************
    // GET DEL MANAGER GIUSTO IN BASE AL FEED RICHIESTO
    // ************************************************
    public function getManager($feedName,$portalId,$templateContainer,$templateRepeat){
        switch($feedName){
            case "trovit":
                return new FeedTrovit($portalId,$templateContainer,$templateRepeat);
                break;
        }
    }

}



