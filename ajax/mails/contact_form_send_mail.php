<!--<input type="text" name="name" id="name" class="form-control" placeholder="Nome">
<input type="text" name="email" id="email" class="form-control" placeholder="Email">
<input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
<input type="text" name="subject" id="subject" class="form-control" placeholder="Oggetto">
<textarea class="form-control" name="body" id="body" rows="6" placeholder="Testo ...."></textarea>-->
<?php
include(BASE_PATH . "/app/classes/MailManager.php");

if(isset($_POST["agencyMail"],$_POST["name"],$_POST["email"],$_POST["phone"],$_POST["object"],$_POST["body"])){
    $mailMng = new MailManager();
    /*$defSenderData = $mailMng->getDefaultSenderData();
    $fromMail   = $defSenderData["email"];
    $fromName   = $defSenderData["name"];
    $to         = $_POST["agencyMail"];
    $cc         = $defSenderData["email"];
    $obj        = $_POST["object"];
    $altBody    = "";
    $body       = $_POST["body"];
    $isHtml     = isset($_POST["isHtml"])?$_POST["isHtml"]:1;
    $attachment = isset($_POST["attachment"])?$_POST["attachment"]:"";
    $mailType   = isset($_POST["mailType"])?$_POST["mailType"]:1;
    $status     = isset($_POST["status"])?$_POST["status"]:1;*/

    // INVIO LA MAIL CON LE CREDENZIALI
    $res = $mailMng->addEmail($mailType,$status,$fromMail,$fromName,$to,$cc,$ccn,$obj,$body,$altBody,$isHtml,$attachment);

    echo($res);
}