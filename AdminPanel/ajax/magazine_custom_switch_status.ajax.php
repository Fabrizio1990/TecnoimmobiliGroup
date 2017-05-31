<?php
require("../../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    require(BASE_PATH."/app/classes/MagazineManager.php");

    if(isset($_POST["id"],$_POST["status"])){
        $mng = new MagazineManager();
        $id     = $_POST["id"];
        $status = $_POST["status"];
        $order  = $_POST["order"];

        $res = $mng->setPropertyMagazineStatusAndOrder($id,$status,$order);

        echo($res);
    }else{

        echo("Parametri non ricevuti");
    }


}else{
    echo "Accesso Non Consentito";
}


