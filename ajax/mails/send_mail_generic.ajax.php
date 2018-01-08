<?php
require_once ("../../config.php");
include(BASE_PATH . "/app/classes/MailManager.php");

if(isset($_POST["to"],$_POST["object"],$_POST["body"])){
    $mailMng = new MailManager();
    $defSenderData = $mailMng->getDefaultSenderData();
    $fromMail   = isset($_POST["from"])?urldecode($_POST["from"]):$defSenderData["email"];
    $fromName   = isset($_POST["fromName"])?urldecode($_POST["fromName"]):$defSenderData["name"];
    $to         = $_POST["to"];
    $cc         = isset($_POST["cc"])?urldecode($_POST["cc"]):null;
    $ccn        = isset($_POST["ccn"])?urldecode($_POST["ccn"]):null;
    $obj        = $_POST["object"];
    $body       = urldecode($_POST["body"]);
    $altBody    = isset($_POST["altBody"])?urldecode($_POST["altBody"]):"";
    $isHtml     = isset($_POST["isHtml"])?$_POST["isHtml"]:1;
    $attachment = isset($_POST["attachment"])?$_POST["attachment"]:"";
    $mailType   = isset($_POST["mailType"])?$_POST["mailType"]:1;
    $status     = isset($_POST["status"])?$_POST["status"]:1;

    // INVIO LA MAIL CON LE CREDENZIALI
    $mailId = $mailMng->addEmail($mailType,$status,$fromMail,$fromName,$to,$cc,$ccn,$obj,$body,$altBody,$isHtml,$attachment,true);


    //$mailMng->sendMailByID($mailId);

    echo($mailId);
}