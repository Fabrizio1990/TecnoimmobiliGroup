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
if(isset($_POST["idRequest"]) && isset($_POST["status"])){


    include(BASE_PATH."/app/classes/RequestsManager.php");

    $reqMng  = new RequestManager();
    $idRequest   = $_POST["idRequest"];
    $status     = $_POST["status"];
    $ret = $reqMng->updateStatus($idRequest,$status);

    if(($ret!= "0" && $ret!= "1")){

        echo "è avvenuto un errore nell' aggiornamento dello stato della richiesta";
        exit();
    }


    echo 1;

}else
    echo("ACCESSO NON AUTORIZZATO!!");
















?>