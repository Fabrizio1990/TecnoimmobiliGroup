
<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 22:34
 */

if(isset($_REQUEST["id_category"]) && isset($_REQUEST["id_action"])){

    $id_cat     = $_REQUEST["id_category"];
    $id_action  = $_REQUEST["id_action"];
    $id         = isset($_REQUEST["id"])?$_REQUEST["id"]:null;
    $res        = null;

    require("../../config.php");
    require(BASE_PATH."/app/classes/Utils.php");
    $mng = null;
    $params = null;
    $extra_params = null;
    $values = null;
    $fields = null;

    switch($id_cat){
        // ################ GEOGRAPHIC ###############
        case "geo":
            if($id_action =="istat"){
                $params = array("id_comune = ?");
                $fields = array("istat");
                $values = array($id);
            }elseif($id_action =="cap"){
                $params = array("id_zona = ?");
                $fields = array("cap");
                $values = array($id);
            }
            require(BASE_PATH."/app/classes/GeographicManager.php");
            //possible id_action -- country | region | city | town | district
            $mng = new GeographicManager();
            $res = $mng->read($params,$extra_params,$values,$fields);

            break;

        // ################ PROPERTIES ###############
        case "properties":
            break;
    }

    //$res = Utils::rstToOptionsJson($res,"id","title");

    echo($res[0][0]);
}