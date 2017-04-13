<?php


header('Content-type: text/json; charset=utf-8');
include("../../config.php");
include(BASE_PATH."/app/classes/RequestsManager.php");

$rqMng = new RequestManager();
$array = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati




$res = $rqMng->readRequests();
$resultFound = Count($res);
if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
    for($i=0;$i<$resultFound;$i++) {
        $id = $res[$i]["id"];
        $id_inp = "<input type='hidden' name='id_request' id ='id_request' value='$id' />";
        $email = $res[$i]["email"];
        $name = $res[$i]["name"];
        $lastname = $res[$i]["lastname"];
        $telephone = $res[$i]["telephone"];
        $details = "<button type=\"button\" onclick='getDetails($id)' class=\"btn btn-info\"><i class=\"fa  fa-edit\"></i></button>";


        $date_ins = $res[$i]["date_ins"];
        $status   = "<input type='checkbox' class='switch' " .($res[$i]["enabled"]=="1"?"checked":"") .">";

        array_push($array["aaData"],array($id_inp.$email,$name,$lastname,$telephone,$details,$status,$date_ins));
    }
}

echo(json_encode($array));



?>