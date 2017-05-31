<?php
require("../../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;



    require(BASE_PATH."/app/classes/MagazineManager.php");

    $mng = new MagazineManager();
    $status = isset($_POST["enabled"]) ? $_POST["enabled"]:1;

    $res = $mng->getMagazineProperties($agency_id,$status);


    echo json_encode($res);

}else{
    echo "{}";
}


