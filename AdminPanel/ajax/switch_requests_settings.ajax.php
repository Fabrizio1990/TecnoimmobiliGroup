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
if(isset($_POST["idRequest"]) && (isset($_POST["request_status"]) || isset($_POST["newsletter_status"]))){


    include(BASE_PATH."/app/classes/RequestsManager.php");

    $reqMng  = new RequestManager();
    $idRequest   = $_POST["idRequest"];
    $status     = isset($_POST["request_status"])?$_POST["request_status"]:$_POST["newsletter_status"];
    if(isset($_POST["request_status"])){
        $ret = $reqMng->updateStatus($idRequest,$status);
        //$ret = $reqMng->updateNewsletterStatus($idRequest,$status);
    }else if(isset($_POST["newsletter_status"])){
        $ret = $reqMng->updateNewsletterStatus($idRequest,$status);
    }
    if(($ret!= "0" && $ret!= "1")){
        echo "è avvenuto un errore nell' aggiornamento dello stato della richiesta";
        exit();
    }


    echo 1;

}else
    echo("ACCESSO NON AUTORIZZATO!!");

?>