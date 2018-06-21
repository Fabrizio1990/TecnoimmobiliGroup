<?php
include ("../../config.php");
include ("resources.php");
include ("Utilities.php");
include (BASE_PATH."/app/classes/PropertyManager.php");
include (BASE_PATH."/_OTHER/Easywork/classes/EasyWorkConversionsHelper.php");

$pMng = new PropertyManager();

if(isset($_REQUEST['operation'])){
    $operation=$_REQUEST['operation'];
    switch($operation){
        case "getAgencyData":
            include('bridge_actions/getAgencyData.inc.php');
            break;
        case "insert":
            //echo("INSERT PROPERTY PROCEDURE");
            $pMng = new PropertyManager();
            if(isset($_POST["id_easywork"])){
                //echo("| id recived = ".$_POST["id_easywork"]);
                $property = $pMng->read("id_easywork = ?",null,array($_POST["id_easywork"]),"id",false);
                //echo("| property exist = ".count($property)>0);
                if(count($property)>0){
                    //echo("update");
                    $id_property = $property[0]["id"];
                    //echo("| property id = ".$id_property);
                    include('bridge_actions/updateProperty.inc.php');
                    //echo("| AFTER INCLUDE");
                }else{
                    //echo("insert");
                    include('bridge_actions/saveProperty.inc.php');
                }
            }else{
                printMessage("ERR_MISSING_ID_EASYWORK");
            }
            break;
        case "newsletter_save":
            include('bridge_actions/saveOrUpdateRequest.inc.php');
            break;
        case "saveImage":
            include('bridge_actions/saveImage.inc.php');
            break;
        default :
            break;
    }
}

