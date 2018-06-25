<?php
require_once ("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedInfo.php");
require_once (BASE_PATH."/app/classes/FileHelper/FileHelper.php");
require_once(BASE_PATH."/app/classes/DefValues.php");

class FeedManager
{


    public function generateFeed($portal_name , $feedName, $printFeed = false){
        $prtMng = new PortalManager();
        $feedInfoMng = new FeedInfo();
        $feedMng = null;
        $feedFile = "";

        $today =date("Y-m-d");

        $printed = 0;
        $folderTemplateXML = BASE_PATH."/_OTHER/FEED_XML/template_feed";
        $feeder = null;


        //GET PORTAL ID AND FEED INFO
        $portalId = $feedInfoMng->getPortalIdFromName($portal_name);
        if($portalId == null){
            echo("Non esiste nessun portale con questo nome.");
            exit();
        }
        //$feedExtension = $feedInfoMng->getFeedExtension();
        $feedInfo = $feedInfoMng->getFeedData($portalId,$feedName);




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
        $feedSavePath  = BASE_PATH."/".$prtMng->getFeedsFolder($portal_name);
        $feedName      = $feedInfo[0]["feed_name"];
        $feedExtension = $feedInfo[0]["feed_extension"];
        $fullSavePath = $feedSavePath."/".$feedName.$feedExtension;

        // GET THE TEMPLATE FOR BASE XML AND SINGLE ITEMS
        $templateContainer = FileHelper::readFile($folderTemplateXML."/".$portal_name.$feedExtension);
        $templateRepeat = FileHelper::readFile($folderTemplateXML."/".$portal_name."_item".$feedExtension);

        // GET RIGHT FEED CLASS
        $feedMng = $this->getManager($portal_name,$portalId,$templateContainer,$templateRepeat);

        //GET ALL PROPRETIES TO SENT TO THIS PORTAL
        $params = array();
        $values = array();
        $idList = "";
        // GET PROPERTIES ID
        $dbH = new GenericDbHelper();
        $dbH->setTable("prt_portal_properties");
        $pIds = $dbH->read("id_portal = ?",null,array($portalId),null,false);
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
        if($feedFilterField != null && $feedFilterField !=""){
            array_push($params,"$feedFilterField = ?");
            array_push($values,$feedFilterVal);
        }
        $rst = $dbH->read($params,null,$values,null,false);



        //GET FEED
        $feedFile = $feedMng->getPropertyFeed($rst);


        //Write file on right folder
        $this->writeFeed($fullSavePath,$feedFile);

        //PRINT RESULT
        echo("success");

        //PRINT FEED
        if($printFeed)
            echo("<xmp>".$feedFile."</xmp>");

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
    public function getManager($portalName,$portalId,$templateContainer,$templateRepeat){
        $ret = null;
        switch($portalName){
            case "trovit":
                $ret = new FeedTrovit($portalId,$templateContainer,$templateRepeat);
                break;
            case "casa.it":
                $ret = new FeedCasa_it($portalId,$templateContainer,$templateRepeat);
                break;
            case "immobiliare.it":
                $ret = new FeedImmobiliare_it($portalId,$templateContainer,$templateRepeat);
                break;
            default :
                $ret = new Feed($portalId,$templateContainer,$templateRepeat);
                break;
        }
        return $ret;
    }

}



