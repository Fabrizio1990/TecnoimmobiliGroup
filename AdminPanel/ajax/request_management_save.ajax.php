<?php

include("../../config.php");
include(BASE_PATH."/app/classes/RequestsManager.php");
$rqMng = new RequestManager();

if(isset($_POST["id_request"],$_POST["email"],$_POST["name"],$_POST["lastname"],$_POST["contracts"],$_POST["categories"],$_POST["tipologies"],$_POST["regions"],$_POST["cities"],$_POST["towns"])){



    $id_request     = isset($_POST["id_request"])?$_POST["id_request"]:"NULL";
    $id_easywork    = isset($_POST["id_easywork"])?$_POST["id_easywork"]:0;
    $name           = $_POST["name"];
    $email           = $_POST["email"];
    $lastname       = $_POST["lastname"];
    $telephone      = isset($_POST["telephone"])?$_POST["telephone"]:"";
    $contracts      = isset($_POST["contracts"])?$_POST["contracts"]:"";
    $categories     = $_POST["categories"];
    $tipologies     = $_POST["tipologies"];
    $regions        = isset($_POST["regions"])?$_POST["regions"]:"";
    $cities         = isset($_POST["cities"])?$_POST["cities"]:"";
    $towns          = isset($_POST["towns"])?$_POST["towns"]:"";
    $districts      = isset($_POST["districts"])?$_POST["districts"]:"";
    $price_min      = isset($_POST["price_min"])?$_POST["price_min"]:"";
    $price_max      = isset($_POST["price_max"])?$_POST["price_max"]:"";
    $mq_min         = isset($_POST["mq_min"])?$_POST["mq_min"]:0;
    $mq_max         = isset($_POST["mq_max"])?$_POST["mq_max"]:"";
    $notes          = isset($_POST["notes"])?urldecode($_POST["notes"]):"";
    $enabled        = isset($_POST["enabled"])?$_POST["enabled"]:1;


    $res = $rqMng->saveRequest($id_easywork,$name,$lastname,$email,$telephone,$contracts,$categories,$tipologies,$regions,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$notes,$enabled,$id_request);

    echo($res[0][0]);// ritorna l' id della richiesta aggiunta o modificata


}else{
    echo"Non Sono stati inviati i parametri necessari";

}


