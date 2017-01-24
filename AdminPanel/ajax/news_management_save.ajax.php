<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 24/01/2017
 * Time: 11:13
 */
include("../../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
/*if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type == "1"? "%" : $SS_usr->user_type;
}else{
    header("location:login.php");
}*/
if(isset($_POST["text"]) && SessionManager::getVal("authenticated") != null){
    include(BASE_PATH."/app/classes/NewsManager.php");
    $title  = $_POST["title"];
    $text   = $_POST["text"];
    $mng    = new NewsManager();
    $values = Array($title,$text);
    $ret = $mng->create($values);
    echo($ret);
}
else{
    header("location:login.php");
}

?>