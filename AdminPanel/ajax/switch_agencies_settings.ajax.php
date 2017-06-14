<?php
include("../../config.php");

include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type;
}else{
    header("location:login.php");
}
if(isset($_POST["idAgency"]) && isset($_POST["status"])){


    include(BASE_PATH."/app/classes/AgencyManager.php");
    require_once(BASE_PATH."/app/classes/UserManager.php");

    $agencyMng  = new AgencyManager();
    $usrMng = new UserManager();
    $idAgency   = $_POST["idAgency"];
    $status     = $_POST["status"];
    $ret = $agencyMng->updateStatus($idAgency,$status);

    if(($ret!= "0" && $ret!= "1")){

        echo "è avvenuto un errore nel update dello stato dell' agenzia";
        exit();
    }

    $operators  = $agencyMng->getOperators("id_agency = ?",null,array($idAgency),"id");
    for($i = 0;$i<Count($operators);$i++){
        $retUsr = $usrMng->updateUser(array($status,$operators[$i]["id"]),"id= ?",null,"id_status = ?",false);
        if(($retUsr!= "0" && $retUsr!= "1")){
            echo "è avvenuto un errore nel update dello stato degli agenti";
            exit();
        }
    }

    echo 1;

}else
    echo("ACCESSO NON AUTORIZZATO!!");
















?>