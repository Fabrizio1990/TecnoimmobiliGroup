<?php
include(BASE_PATH . "/app/classes/MailManager.php");

if(isset($_POST["to"],$_POST["object"],$_POST["body"])){
    $mailMng = new MailManager();
    $defSenderData = $mailMng->getDefaultSenderData();
    $fromMail   = isset($_POST["from"])?$_POST["from"]:$defSenderData["email"];
    $fromName   = isset($_POST["fromName"])?$_POST["fromName"]:$defSenderData["name"];
    $to         = $_POST["to"];
    $cc         = isset($_POST["cc"])?$_POST["cc"]:null;
    $ccn        = isset($_POST["ccn"])?$_POST["ccn"]:null;
    $obj        = $_POST["object"];
    $altBody    = isset($_POST["altBody"])?$_POST["body"]:"";
    $body       = $_POST["body"];
    $isHtml     = isset($_POST["isHtml"])?$_POST["isHtml"]:1;
    $attachment = isset($_POST["attachment"])?$_POST["attachment"]:"";
    $mailType   = isset($_POST["mailType"])?$_POST["mailType"]:1;
    $status     = isset($_POST["status"])?$_POST["status"]:1;

    // INVIO LA MAIL CON LE CREDENZIALI
    $res = $mailMng->addEmail($mailType,$status,$fromMail,$fromName,$to,$cc,$ccn,$obj,$body,$altBody,$isHtml,$attachment);

    echo($res);
}