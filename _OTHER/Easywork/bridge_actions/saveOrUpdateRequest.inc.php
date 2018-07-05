<?php

if(isset($_POST["id_easywork"],$_POST["name"],$_POST["lastname"],$_POST["email"],$_POST["telephone"],$_POST["contracts"],$_POST["tipologies"],$_POST["cities"],$_POST["towns"],$_POST["districts"],$_POST["price_min"],$_POST["price_max"],$_POST["mq_min"],$_POST["mq_max"],$_POST["status"])){

    include (BASE_PATH."/app/classes/RequestsManager.php");
    $rqMng  = new RequestManager();
    $ewConvH = new EasyWorkConversionsHelper($rqMng->conn);

    $requestId = "NULL";
    $requesExist = $rqMng->getRequestIdFromEw($_REQUEST["id_easywork"],false);
    if(count($requesExist) > 0){
        $requestId = $requesExist[0]["id"];
    }


    $id_easywork    = $_POST["id_easywork"];;
    $name           = $_POST["name"];
    $lastname       = $_POST["lastname"];
    $email          = $_POST["email"];
    $telephone      = $_POST["telephone"];
    $contracts      = $_POST["contracts"];
    $categories     = "";
    $tipologies     = $_POST["tipologies"];
    $regions        = "";
    $cities         = $_POST["cities"];
    $towns          = $_POST["towns"];
    $districts      = $_POST["districts"];
    $price_min      = $_POST["price_min"];
    $price_max      = $_POST["price_max"];
    $mq_min         = $_POST["mq_min"];
    $mq_max         = $_POST["mq_max"];
    $notes          = isset($_POST["notes"])?$_POST["notes"]:"";
    $enabled        = isset($_POST["status"])?$_POST["status"]:1;

    // CONTRACTS CONVERSION
    $tmp = explode(",", $contracts);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("property_contracts",$tmp[$i]),"contract =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $contracts = $tmp2;
    //echo("<br>Contracts => ".$contracts);

    // CATEGORIES CONVERSION
    /*$tmp = explode(",", $categories);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("property_categories",$tmp[$i]),"category =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $categories = $tmp2;*/
    //echo("<br>categories => ".$categories);

    // TIPOLOGIES CONVERSION
    $tmp = explode(",", $tipologies);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("property_tipologies",$tmp[$i]),"tipology =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $tipologies = $tmp2;
    //echo("<br>tipologies => ".$tipologies);

    // CITIES CONVERSION
    $tmp = explode(",", $cities);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("geo_city",$tmp[$i],"title_short"),"city =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $cities = $tmp2;
    //echo("<br>cities => ".$cities);

    // TOWNS CONVERSION
    $tmp = explode(",", $towns);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("geo_town",$tmp[$i]),"town =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $towns = $tmp2;
    //echo("<br>towns => ".$towns);

    // DISTRICTS CONVERSION
    $tmp = explode(",", $districts);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $tmp2.=getConvertedField($ewConvH->TextToId("geo_district",$tmp[$i]),"district =>".$tmp[$i]).",";
    }
    $tmp2 = rtrim($tmp2, ',');
    $districts = $tmp2;
    //echo("<br>districts => ".$districts);

    // GET REGION BASED ON CITIES
    $tmp = explode(",",$cities);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $regionRes = $ewConvH->executeQuery("select id_region from geo_city where id='".$tmp[$i]."'");
        if(count($regionRes) > 0){
            if(strpos($tmp2, $regionRes[0]["id_region"]) === false)
                $tmp2.= $regionRes[0]["id_region"].",";
        }else{
            printMessage("ERR_MISSING_REGION"," città = $tmp[$i]");
            exit();
        }
    }
    $tmp2 = rtrim($tmp2, ',');
    $regions = $tmp2;
    //echo("<br>regions => ".$regions);

    // GET CATEGORY BASED ON TIPOLOGY
    $tmp = explode(",",$tipologies);
    $tmp2 = "";
    for($i = 0 ; $i < count($tmp);$i++){
        $catRes = $ewConvH->executeQuery("select id_category from property_tipologies where id='".$tmp[$i]."'");
        if(count($catRes) > 0){
            if(strpos($tmp2, $catRes[0]["id_category"]) === false)
                $tmp2.= $catRes[0]["id_category"].",";
        }else{
            printMessage("ERR_MISSING_CATEGORY"," tipologia = $tmp[$i]");
            exit();
        }
    }
    $tmp2 = rtrim($tmp2, ',');
    $categories = $tmp2;


    $ret = $rqMng ->saveRequest($id_easywork,$name,$lastname,$email,$telephone,$contracts,$categories,$tipologies,$regions,$cities,$towns,$districts,$price_min,$price_max,$mq_min,$mq_max,$enabled,$notes,$requestId,false);

    if(count($ret)>0){
        if($requestId == "NULL")
            printMessage("SUCCESS_REQUEST_SAVED");
        else
            printMessage("SUCCESS_REQUEST_UPDATED");
    }
    else{
        printMessage("ERR_REQUEST_NOT_SAVED");
    }

}else{
    printMessage("ERR_MISSING_PARAMS");
}
