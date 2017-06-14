<?php
include("../../config.php");

include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type == "1"? "%" : $SS_usr->user_type;
    if($SS_usr->id_user_type!=1)
        header("location:index.php");
}else{
    header("location:login.php");
}


if(isset($_POST["logName"])){
    unlink(BASE_PATH."/app/logs/".$_POST["logName"]);
    echo "1";
}