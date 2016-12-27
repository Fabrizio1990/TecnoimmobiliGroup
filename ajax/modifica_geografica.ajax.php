<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 16:37
 */
if(isset($_POST["action"])){
    require("../config.php");
    require(BASE_PATH."/app/classes/GeographicManager.php");
    require(BASE_PATH."/app/classes/Utils.php");

    $geoM = new GeographicManager();


}
