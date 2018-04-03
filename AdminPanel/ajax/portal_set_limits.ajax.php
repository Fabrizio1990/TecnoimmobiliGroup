<?php

if(isset($_POST["new_limit"],$_POST["portal_id"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    include(BASE_PATH."/app/classes/AgencyManager.php");

    $pMng = new PortalManager();
    $agMng = new AgencyManager($pMng->conn);

    $id_portal = $_POST["portal_id"];
    $maxProperties = $_POST["new_limit"];

    $res = $pMng->setNewPropertiesLimit($id_portal,$maxProperties);
    //ricalcolo i limiti per ogni agenzia
    $agMng->saveAgenciesPortalLimit($id_portal, $maxProperties,false);

    if($res!= 0 && !$res > 0 )
        echo 0;
    else
        echo 1;

}