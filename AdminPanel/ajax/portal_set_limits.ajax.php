<?php

if(isset($_POST["new_limit"],$_POST["portal_id"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");


    $pMng = new PortalManager();
    $res = $pMng->setNewPropertiesLimit($_POST["portal_id"],$_POST["new_limit"]);

    if($res!= 0 && !$res > 0 )
        echo 0;
    else
        echo 1;

}