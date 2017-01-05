
<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 22:34
 */

if(isset($_POST["id_action"])){


    $id_action  = $_POST["id_action"];
    $id_parent  = isset($_POST["id_parent"])?$_POST["id_parent"]:null;

    $res        = null;

    require("../../config.php");
    require(BASE_PATH."/app/classes/Utils.php");
    require(BASE_PATH."/app/classes/OptionsManager.php");
    $mng = null;


    $mng = new OptionsManager();
    $res = $mng->readOptions($id_action,$id_parent);


    $res = Utils::rstToOptionsJson($res);

    echo($res);
}