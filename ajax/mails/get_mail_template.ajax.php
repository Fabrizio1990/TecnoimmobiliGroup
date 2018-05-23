<?php
include("../../config.php");
include BASE_PATH . "/app/classes/Utils.php";
//FORMATO STANDARD ADDITIONALPARAMS :
// par1=>val1|par2=>val2|par3=>val3

if(isset($_REQUEST["templateId"]) || isset($_REQUEST["templateName"])){
    require_once(BASE_PATH . "/app/classes/MailManager.php");

    $mailMng = new MailManager();
    $mailObj ="";
    $mailBody = "";
    $mailAltBody = "";

    $additionalParams = isset($_REQUEST["params"])?$_REQUEST["params"]:"";
    $paramsDelimiter = isset($_REQUEST["paramsDelimiter"])?$_REQUEST["paramsDelimiter"]:"|";
    $valueDelimiter = isset($_REQUEST["valueDelimiter"])?$_REQUEST["valueDelimiter"]:"=>";

    $templateId = isset($_REQUEST["templateId"])?urldecode($_REQUEST["templateId"]):"";
    $templateName = isset($_REQUEST["templateName"])?urldecode($_REQUEST["templateName"]):"";

    //GET EMAIL BODY
    if($templateId != "")
        $templateRes = $mailMng->getEmailTemplete($templateId,false);
    elseif($templateName != "")
        $templateRes = $mailMng->getEmailTempleteByTitle($templateName,false);
    else
        exit("Empty params recived");
    /*echo("<br>");
    echo("CNT = ".count($templateRes));
    echo("<br>");*/
    if(count($templateRes) > 0){
        $mailObj = $templateRes[0]["object"];
        $mailBody = $templateRes[0]["body"];
        $mailAltBody = $templateRes[0]["altbody"];
    }else{
        echo "Errore , Il template non esiste";
        exit();
    }


    $splitParams = explode($paramsDelimiter,$additionalParams);
    for($i = 0 ; $i < count($splitParams) ; $i++){
        $splitParams[$i] = explode($valueDelimiter,$splitParams[$i]);

        $mailBody = str_replace("{".$splitParams[$i][0]."}",$splitParams[$i][1],$mailBody);
        $mailAltBody = str_replace("{".$splitParams[$i][0]."}",$splitParams[$i][1],$mailAltBody);
    }

    echo(json_encode(array("obj"=>Utils::escapeJsonString($mailObj),"body"=>Utils::escapeJsonString($mailBody))));

}else{

    echo("<h1>Errore , Accesso non consentito </h1>");
    //header("location:".SITE_URL."/404.html");
}
