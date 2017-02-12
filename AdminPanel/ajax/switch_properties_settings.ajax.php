<?php
include("../../config.php");

include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type == "1"? "%" : $SS_usr->user_type;
  //$referente 		= $_COOKIE['refer_name'];
}else{
    header("location:login.php");
}
if(isset($_GET["field"]) && isset($_GET["id"]) && isset($_GET["status"])){
    include(BASE_PATH."/app/classes/PropertyManager.php");

    $field      = $_GET["field"];
    $id         = $_GET["id"];
    $status     = $_GET["status"];
    $realField  = "";
    $ret        = 0;
    $propertyM  = new PropertyManager();

    switch($field){
        case "ads_status":
            $realField = "id_ads_status";
            $ret = $propertyM->update(array($realField ." = ?"),array("id = ?"),array($status,$id))?1:0;
            break;
        case "magazine_status":
            $realField = "show_on_magazine";
            $ret = $propertyM->update(array($realField ." = ?"),array("id = ?"),array($status,$id))?1:0;
            break;
        case "ads_portal_status":
            $realField = "show_on_portal";
            $ret = $propertyM->update(array($realField ." = ?"),array("id = ?"),array($status,$id))?1:0;
            break;

    }



    echo($ret);
}else
    echo("ACCESSO NON AUTORIZZATO!!");
















?>