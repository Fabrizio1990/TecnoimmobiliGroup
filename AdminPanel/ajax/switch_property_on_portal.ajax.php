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
if(isset($_POST["id_property"],$_POST["id_portal"])){
    include(BASE_PATH."/app/classes/Portals&Feed/PropertiesOnPortal.php");

    $id_property    = $_POST["id_property"];
    $id_portal      = $_POST["id_portal"];

    $popMng  = new PropertiesOnPortal();

    $ret = $popMng->switchPropertyOnPortalStatus($id_portal,$id_property);

    //RESTITUISCO IN NUOVO STATO  (1 - 0)
    echo($ret);
}else
    echo("ACCESSO NON AUTORIZZATO!!");
















?>