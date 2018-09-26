<?php
set_time_limit(0);
//controllo se non è già definito perchè se includo questa classe in un altro file il path che andrà a recuperare sarà diverso (per config.php) e darà errore, cosi includo il config a priori e evito il prolema
if(!defined ("BASE_PATH"))
    require_once ("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedsClasses/FeedInfo.php");
require_once (BASE_PATH."/app/classes/FileHelper/FileHelper.php");
require_once (BASE_PATH."/app/classes/FtpHelper.php");
require_once(BASE_PATH."/app/classes/DefValues.php");
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
require_once(BASE_PATH."/app/classes/RetStruct.php");
require_once (BASE_PATH."/app/classes/Utils.php");

Utils::SetInclude(BASE_PATH."/_OTHER/FEED_XML/Classes/FeedsClasses");

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
            Flog::logInfo("Non esiste nessun portale con questo nome ->'$portal_name'",
                "feed_generation",
                false,
                true,
                false
            );
            exit();
        }
        //$feedExtension = $feedInfoMng->getFeedExtension();
        $feedInfo = $feedInfoMng->getFeedData($portalId,$feedName);

        //GET SAVE PATH INFO
        $feedSavePath  = BASE_PATH."/".$prtMng->getFeedsFolder($portal_name);
        $feedName      = $feedInfo[0]["feed_name"];
        $feedExtension = $feedInfo[0]["feed_extension"];
        $fullSavePath = $feedSavePath."/".$feedName.$feedExtension;

        //CHECK IF FEED EXIST ON PORTAL
        if(Count($feedInfo) <=0){
            header("content-type: text/text");
            Flog::logInfo(
                "Siamo spiacenti ma non esiste nessun feed con questo nome '$feedName'.",
                "feed_generation",
                true,
                true,
                false);
            exit();

        }

        // DEBUG START FEED CREATION
        Flog::logInfo(
            "---->INIZIO GENERAZIONE DEL FEED $portal_name -> $feedName$feedExtension",
            "feed_generation",
            true,
            false,
            false
        );


        if($feedInfo[0]["enabled"] == 0 ){
            header("content-type: text/text;charset=utf-8");
            //REMOVE PREVIOUS GENERATED FEED
            if (file_exists($fullSavePath)) unlink($fullSavePath);
            Flog::logInfo(
                "Siamo spiacenti Questo feed è stato disabilitato -> '$feedName'",
                "feed_generation",
                true,
                true,
                false);
            exit();
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

        //---------------------GET ALL PROPRETIES TO SENT TO THIS PORTAL
        $dbH = new GenericDbHelper();
        $query = "select properties.* from properties_view as properties  right join prt_portal_properties as t2 on properties.id = t2.id_property WHERE t2.id_portal = $portalId " ;
        if($feedFilterField != null && $feedFilterField !=""){
            $query.= "and properties.$feedFilterField = $feedFilterVal";
        }
        $rst = $dbH->executeQuery($query,false);
        //--------------------

        //GET FEED
        $feedFile = $feedMng->getPropertyFeed($rst);

        //Write file on right folder
        $this->writeFeed($fullSavePath,$feedFile);
        
        //PRINT FEED
        if($printFeed)
            echo($feedFile);
            //echo("<xmp>".$feedFile."</xmp>");
            
        /*
         * ENABLE IT TO PRINT FILE WITH FEED IN LOG FOLDER
         * Flog::logInfo($feedFile,
            date("H_i_s").$portal_name,
            false
        );*/

        // DEBUG START FEED CREATION
        Flog::logInfo(
            "----> FINE GENERAZIONE DEL FEED $portal_name -> $feedName$feedExtension",
            "feed_generation",
            true,
            false,
            false
        );

    }


    function writeFeed($path,$feed){
        $XMLFile = fopen($path, "w") or die("can't open file");
        fwrite($XMLFile, $feed);
        fclose($XMLFile);
    }

    function writeFeedOnFtp($portal_name , $feedName){
        $prtMng = new PortalManager();
        $feedInfoMng = new FeedInfo();
        $feedMng = null;
        $feeder = null;

        //GET PORTAL ID AND FEED INFO
        $portalId = $feedInfoMng->getPortalIdFromName($portal_name);
        if($portalId == null){
            return "Attenzione ! Non esiste nessun portale con questo nome '$portal_name'.";
        }

        $feedInfo = $feedInfoMng->getFeedData($portalId,$feedName);

        //GET SAVE PATH INFO
        $feedSavePath  = BASE_PATH."/".$prtMng->getFeedsFolder($portal_name);
        $feedName      = $feedInfo[0]["feed_name"];
        $feedExtension = $feedInfo[0]["feed_extension"];
        $localFilePath = $feedSavePath."/".$feedName.$feedExtension;

        //GET PORTAL FTP INFO
        $portalInfo = $prtMng->getPortalDetails($portalId);
        $ftp_server = $portalInfo[0]["ftp_url"];
        $ftp_folder = $portalInfo[0]["ftp_folder"];
        $ftp_username = $portalInfo[0]["ftp_user"];
        $ftp_password = $portalInfo[0]["ftp_password"];


        if($portalInfo[0]["portal_enabled"] != "1"){
            Flog::logInfo("Attenzione : il portale '$portal_name'  non è abilitato",
                "feed_generation",
                false,
                true,
                false
            );
            exit();
        }
        if($portalInfo[0]["ftp_enabled"] != "1"){
            Flog::logInfo(
                "Attenzione : il portale '$portal_name'  non ha l' FTP abilitato",
                false,
                true,
                false,
                false
            );
            exit();
        }

        //RETURN 1 in case of success
        $ret = FtpHelper::writeFileOnFtp($ftp_server, $ftp_username, $ftp_password, $ftp_folder, $localFilePath);

        if($ret == 1)
            $retStruct = new RetStruct(1,"SUCCESSO : Portale $portal_name , feed = $feedName salvato su FTP");
        else
            $retStruct = new RetStruct(-1,"ERRORE : Portale $portal_name , feed = $feedName NON salvato su FTP ".$ret);
        
        return $retStruct;

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
            case "idealista":
                $ret = new FeedIdealista($portalId,$templateContainer,$templateRepeat);
                break;
            default :
                $ret = new Feed($portalId,$templateContainer,$templateRepeat);
                break;
        }
        return $ret;
    }

}



