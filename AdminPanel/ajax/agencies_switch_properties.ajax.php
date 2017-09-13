<?php

include("../../config.php");

include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type == "1"? "%" : $SS_usr->user_type;
    if($SS_usr->id_user_type!=1)
        echo("Accesso Negato");
}else{
    echo("Accesso Negato");
}

if(isset($_POST["ACTION"])){

    include(BASE_PATH."/app/classes/AgencyManager.php");
    $agMng = new AgencyManager();

    $action = $_POST["ACTION"]; // 0 ripristina , 1 sposta in un altra agenzia

    if($action == 0 ){
        if(isset($_POST["idAgency"])){

            $res = $agMng->restorePropertiesOwner($_POST["idAgency"]);
            echo("SUCCESSO -> ".$res);
        }else{
            echo("ERRORE! Parametri non ricevuti");
            exit();
        }
    }elseif($action == 1){
        if(isset($_POST["idAgFrom"],$_POST["idAgTo"])){
            $res = $agMng->changePropertiesOwner($_POST["idAgFrom"],$_POST["idAgTo"]);
            echo("SUCCESSO -> ".$res);
        }else{
            echo("ERRORE! Parametri non ricevuti");
            exit();
        }
    }
}else{
    echo("Accesso Negato");
    exit();
}
