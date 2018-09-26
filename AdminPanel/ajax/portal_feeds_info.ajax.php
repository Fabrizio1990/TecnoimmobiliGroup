<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 21/03/2018
 * Time: 16:24
 */

if(isset($_REQUEST["ACTION"])){
    require("../../config.php");
    include (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    include (BASE_PATH."/app/classes/Utils.php");
    $pMng = new PortalManager();

    $action = $_REQUEST["ACTION"];

    $portalName = isset($_REQUEST["portalName"])?$_REQUEST["portalName"]:"";
    //$feedName = isset($_REQUEST["feedName"])?$_REQUEST["feedName"]:"";

    switch ($action){
        case "get_portals":
            $pRes = $pMng->getPortalList();
            echo json_encode($pRes);
            break;

        case "get_portal_feeds":
            $fRes = "";
            $pId = $pMng->getPortalIdByName($portalName);
            if($pId != null & $pId != ""){
                $fRes = $pMng->readPortalFeeds($pId);
            }
            echo json_encode($fRes);
            break;

        case "get_all_feeds":
            $pRes = $pMng->getPortalList();
            $ret = "" ;
            $portalIDs = array();
            foreach ($pRes as $portal) {
                array_push($portalIDs,$portal["id_portal"]);
            }
            $fRes = $pMng->getPortalFeeds($portalIDs);

            echo(json_encode($fRes));

            break;

        default:
            echo "ACTION IS EMPTY";
            break;
    }

}else{
   echo("ACTION IS NOT DEFINED");
}