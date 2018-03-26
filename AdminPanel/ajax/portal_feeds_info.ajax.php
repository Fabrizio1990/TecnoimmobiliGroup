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

            /*
            //DOPO AVER PRESO LA LISTA DEI FEED DEVO GENERARE UN JSON CORRETTO CHE CONTENGA IL PORTALE E TUTTI I SUOI FEED
            $retArray = array();
            $prevPortalId = 0;
            $currIdx = 0;
            //CICLO TUTTI I FEED
            for ($i = 0, $len = count($fRes); $i < $len ; $i++){
                $currPortalId = $fRes[$i]["id_portal"];
                // SE NUOVO PORTALE LO AGGIUNGO E AGGIUNGO L'ARRAY DEI FEED POPOLANDOLO CON IL PRIMO FEED CHE è GIà CONTENUTO NEL RESULTSET
                if($prevPortalId != $currPortalId){
                    //AGGIUNGO IL PORTALE E IL FEED INERENTE
                    $retArray[$currIdx]["id"] = $fRes[$i]["id"];
                    $retArray[$currIdx]["id_portal"] = $fRes[$i]["id_portal"];
                    $retArray[$currIdx]["portal_name"] = $fRes[$i]["portal_name"];
                    $retArray[$currIdx]["feeds"] = array();
                    $feed  = array(
                        "feed_name" => $fRes[$i]["feed_name"],
                        "feed_extension_id" =>$fRes[$i]["feed_extension_id"],
                        "feed_extension" =>$fRes[$i]["feed_extension"]
                    );
                    array_push($retArray[$currIdx]["feeds"],$feed);


                    $retArray[$currIdx]["last_feed_update"] = $fRes[$i]["last_feed_update"];

                }else{
                    //SE NON è NUOVO PORTALE AGGIUNGO SOLO IL FEED
                    $feed  = array(
                        "feed_name" => $fRes[$i]["feed_name"],
                        "feed_extension_id" =>$fRes[$i]["feed_extension_id"],
                        "feed_extension" =>$fRes[$i]["feed_extension"]
                    );
                    array_push($retArray[$currIdx]["feeds"],$feed);
                }

                if($i + 1 < Count($fRes) && $currPortalId != $fRes[$i+1]["id_portal"])
                    $currIdx++;

                $prevPortalId = $currPortalId;
            }
            echo(json_encode($retArray));*/

            echo(json_encode($fRes));

            break;

        default:
            echo "ACTION IS EMPTY";
            break;
    }

}else{
   echo("ACTION IS NOT DEFINED");
}