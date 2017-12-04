<?php
include("../../config.php");
include("resources.php");

if(isset($_REQUEST['operation'])){
    $operation=$_REQUEST['operation'];
    switch($operation){
        case "getAgencyData":
            include('bridge_actions/getAgencyData.inc.php');
            break;
        case "insert":
            include('bridge_actions/saveProperty.inc.php');
            break;
        case "update":
            include('bridge_actions/updateProperty.inc.php');
            break;
        case "delete":
            include('bridge_actions/deleteProperty.inc.php');
            break;
        default :
            break;
    }
}


/*if(isset($_REQUEST["getAgencyData"])){// Richiesta informazioni agenzia (identificativo = telefono)
    include (BASE_PATH."/app/classes/AgencyManager.php");
    $agMng = new AgencyManager();
    $phone = $_REQUEST['phone'];
    $operator = $agMng->getOperators("phone Like ?","limit 1",array("%".$phone."%"),"id,id_agency");

    if(Count($operator) <= 0)
        echo "Agenzia non trovata";
    else{
        $agId = $operator[0]["id_agency"];
        $agStatus = $agMng->read("","","",array("name,id_status,id_sub_status"));
    }
}*/
//SELECT eliminato,abilitato,alert_pagamento,abilitato_pubblicazione from agenzie where telefono