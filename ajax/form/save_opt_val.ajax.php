
<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 22:34
 */

if(isset($_REQUEST["id_category"]) && isset($_REQUEST["id_action"]) && isset($_REQUEST["val"])){
    if($_REQUEST["val"]!=null){
        $id_cat     = $_REQUEST["id_category"];
        $id_action  = $_REQUEST["id_action"];
        $id_parent  = isset($_REQUEST["id_parent"])?$_REQUEST["id_parent"]:null;
        $name       = isset($_REQUEST["val"])?utf8_decode(urldecode($_REQUEST["val"])):null;
        $other_val  = isset($_REQUEST["other_val"])?utf8_decode(urldecode($_REQUEST["other_val"])):"";
        $res        = null;






        require("../../config.php");
        require(BASE_PATH."/app/classes/Utils.php");

        switch($id_cat){
            // ################ GEOGRAPHIC ###############
            case "geo":
                require(BASE_PATH."/app/classes/GeographicManager.php");
                //possible id_action -- country | region | city | town | district
                $mng = new GeographicManager();
                switch($id_action){
                    case "country":
                        $res = $mng->saveCountry($name);
                        break;
                    case "region" :
                        $res = $mng->saveRegion($id_parent,$name);
                        break;
                    case "city":
                        $name_short = isset($_REQUEST["name_short"])?$_REQUEST["name_short"]:null;
                        $res = $mng->saveCity($id_parent,$name,$name_short);
                        break;
                    case "town" :
                        $istat = isset($_REQUEST["istat"])?$_REQUEST["istat"]:null;
                        $res = $mng->saveTown($id_parent,$name,$istat);
                        break;
                    case "district":
                        $cap = isset($_REQUEST["cap"])?$_REQUEST["cap"]:null;
                        $res = $mng->saveDistrict($id_parent,$name,$cap);
                        break;
                }
                echo($res);
                break;

            // ################ PROPERTIES ###############
            case "properties":
                break;
        }

        //$res = Utils::rstToOptionsJson($res,"id","title");

        echo($res[0][0]);
    }
}