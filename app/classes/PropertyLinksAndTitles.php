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
    public static function getTitleFromId($id,$titleType = 3){
        $mng = new PropertyManager();
        $res = $mng->getAllProperties("id = ?","limit 1",array($id),null,null);
        if(Count($res)<=0)
            return false;

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



    public static function getTitleFromRef($ref, $titleType = 3){

        $mng = new PropertyManager();
        $res = $mng->getAllProperties("reference_code = ?","limit 1",array($ref),null,null);
        if(Count($res)<=0)
            return false;

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




    public static function getTitleNoDb($tipology,$contract,$town = null,$street = null,$district = null){

        if($town == null)
            return $tipology. " in ". $contract;
        else if($street == null)
            return $tipology. " in ". $contract ." ".$town;
        else if($district == null)
            return $tipology. " in ". $contract ." ".$town.", ".$street;
        else{
            $ret = $tipology. "in  ".$contract. " " .$street;
            $ret .= $district == $town ? ", ". $town: ", ".  $district .", ".$town;
            return $ret;
        }
    }

    //##################################################################################
    // ################################# LINKS SECTION #################################
    // #################################################################################
    public static function getDetailLinkFromId($id){
        $mng = new PropertyManager();
        $res = $mng->getAllProperties("id = ?","limit 1",array($id),null,null);
        if(Count($res)>0)
            return PropertyLinksAndTitles::getDetailLink($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"],$res[0]["reference_code"]);
        else
            return false;
    }

    public static function getDetailLinkFromRef($ref){
        $mng = new PropertyManager();
        $res = $mng->getAllProperties("reference_code = ?","limit 1",array($ref),null,null);
        if(Count($res)>0)
            return SITE_URL."/".PropertyLinksAndTitles::getDetailLink($res[0]["contract"],$res[0]["tipology"],$res[0]["street"],$res[0]["town"],$ref);
        else
            return false;
    }

    public static function getDetailLink($contract,$tipology,$street,$town,$ref){
        return str_replace(" ","_",$contract."-".$tipology."-".$town."-".$street."/RIF-".$ref);
    }

}