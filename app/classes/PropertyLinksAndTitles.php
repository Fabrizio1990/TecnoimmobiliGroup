<?php

require_once(BASE_PATH."/app/classes/PropertyManager.php");


class PropertyLinksAndTitles
{
    private $mng;

    public function __construct() {
        $mng = new PropertyManager();
    }


    //##################################################################################
    // ################################# TITLES SECTION #################################
    // #################################################################################
    public static function getTitleFromId($id){
        $mng = new PropertyManager();
        $res = $mng->readAllAds("id = ?","limit 1",array($id),null,null);
        return PropertyLinksAndTitles::getTitle($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"]);
    }

    public static function getTitleFromRef($ref){
        $mng = new PropertyManager();
        $res = $mng->readAllAds("reference_code = ?","limit 1",array($ref),null,null);
        return PropertyLinksAndTitles::getTitle($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"]);
    }

    public static function getTitle($ref,$titleType){

        $mng = new PropertyManager();
        $res = $mng->readAllAds("reference_code = ?","limit 1",array($ref),null,null);
        $res = $res[0];
        $ret = "";
        switch ($titleType){
            case 1:
                $ret = $res["tipology"]." in ".$res["contract"];
                break;
            case 2:
                $ret = $res["tipology"]." in ".$res["contract"]." ".$res["town"];
                break;
            case 3:
                $ret = $res["tipology"]." in ".$res["contract"]." ".$res["town"].", ".$res["street"];
                break;
            case 4:
                $ret = $res["tipology"]. " " .$res["street"];
                $ret .= $res["district"] == $res["town"] ? ", ". $res["town"]: ", ".  $res["district"] .", ". $res["town"];
                break;
            default:
                $ret = $res["tipology"]." in ".$res["contract"];
                break;
        }
        return $ret;
    }

    public static function getTitleShort($rif){

    }

    //##################################################################################
    // ################################# LINKS SECTION #################################
    // #################################################################################
    public static function getDetailLinkFromId($id){
        $mng = new PropertyManager();
        $res = $mng->readAllAds("id = ?","limit 1",array($id),null,null);
        return PropertyLinksAndTitles::getDetailLink($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"],$res[0]["reference_code"]);
    }

    public static function getDetailLinkFromRef($ref){
        $mng = new PropertyManager();
        $res = $mng->readAllAds("reference_code = ?","limit 1",array($ref),null,null);
        return PropertyLinksAndTitles::getDetailLink($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"],$ref);
    }

    public static function getDetailLink($contract,$tipology,$street,$town,$ref){
        return $contract."-".$tipology."/".$town."/".$street."/RIF-".$ref;
    }

}