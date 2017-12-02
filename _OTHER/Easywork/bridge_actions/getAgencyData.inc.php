<?php
require_once (BASE_PATH."/app/classes/AgencyManager.php");
$agMng = new AgencyManager();
$phone = $_REQUEST['phone'];
$operator = $agMng->getOperators("phone=?","limit 1",array($phone),array("id,id_agency"));

if(Count($operator) <= 0)
    printMessage("ERR_AGENCY_NOT_FOUND","Numero inviato =  ".$phone);
else{
    $agId = $operator[0]["id_agency"];
    $agStatus = $agMng->read(array("id =?"),null,array($agId),array("id,id_status,id_sub_status"));

    echo($agStatus[0]["id"].",".$agStatus[0]["id_status"].",".$agStatus[0]["id_sub_status"]);
}