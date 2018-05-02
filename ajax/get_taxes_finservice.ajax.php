<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 29/04/2018
 * Time: 16:31
 */

require("../config.php");
require(BASE_PATH."/app/classes/GenericDbHelper.php");

//SE SONO IN LOCALE NON RIESCO A RAGGIUNGERE IL DB DI FINSERVICE QUINDI STAMPO UN VALORE DI TEST
if(ENVOIRMENT == $envoirments[0]){
    echo json_encode(array(2.80,2.70));
}
//ALTRIMENTI PRENDO IL VERO VALORE DAL DB DI FINSERVICE
else{
    $dbH = new GenericDbHelper(null,BASE_PATH."/app/classes/Configs/dbConfigFinservices.ini");

    $dbH->setTable("tassi");
    $ret = $dbH->read("tipoTasso in('Tasso fisso','Tasso variabile')",null,null,null,false);

    $tassi = array($ret[0]["Tasso"],$ret[1]["Tasso"]);


    echo json_encode($tassi);
}