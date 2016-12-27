
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
    $id_parent  = isset($_REQUEST["id_parent"])?$_REQUEST["id_parent"]:null;
    $res        = null;

    require("../../config.php");
    require(BASE_PATH."/app/classes/Utils.php");
    $mng = null;


    switch($id_cat){
        // ################ GEOGRAPHIC ###############
        case "geo":
            require(BASE_PATH."/app/classes/GeographicManager.php");
            //possible id_action -- country | region | city | town | district
            $mng = new GeographicManager();
            $res = $mng->readOptions($id_action,$id_parent);
            break;

        // ################ PROPERTIES ###############
        case "properties":
            break;
    }

    $res = Utils::rstToOptionsJson($res,"id","title");

    echo($res);
}