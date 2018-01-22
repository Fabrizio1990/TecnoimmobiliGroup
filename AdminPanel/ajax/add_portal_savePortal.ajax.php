<?php
// PAGINA DI INSERIMENTO PORTALI
if(isset($_POST["logo_name"],$_POST["name"],$_POST["site"],$_POST["max_properties"], $_POST["ar_link"] ,$_POST["ar_username"],$_POST["ar_password"],$_POST["hasContract"],$_POST["contract_start"],$_POST["contract_end"],$_POST["note"],$_POST["hasFtp"],$_POST["ftp_link"],$_POST["ftp_user"],$_POST["ftp_password"])){

    include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");

    $pMng = new PortalManager();

    $logo_name          = $_POST["logo_name"];
    $name               = $_POST["name"];
    $site               = $_POST["site"];
    $maxProperties      = $_POST["max_properties"];
    $ar_link            = $_POST["AR_link"];
    $ar_username        = $_POST["ar_username"];
    $ar_password        = $_POST["ar_password"];
    $hasContract        = $_POST["hasContract"];
    $contractStart      = $_POST["contract_start"];
    $contractEnd        = $_POST["contract_end"];
    $note               = $_POST["note"];

    $hasFtp             = $_POST["hasFtp"];
    $ftp_link           = $_POST["ftp_link"];
    $ftp_user           = $_POST["ftp_user"];
    $ftp_password       = $_POST["ftp_password"];

    $documentsFile      = isset($_FILES["documents_file"])?$_FILES["documents_file"]:null;
    $documentsUrl       = $_POST["documents_url"];

    $contactName        = isset($_POST["contact_name"])?$_POST["contact_name"]:"";
    $contactEmail       = isset($_POST["contact_email"])?$_POST["contact_email"]:"";
    $contactPhone       = isset($_POST["contact_phone"])?$_POST["contact_phone"]:"";
    $contactMobile      = isset($_POST["contact_mobile"])?$_POST["contact_mobile"]:"";
    $contactCity        = isset($_POST["contact_city"])?$_POST["contact_city"]:"";
    $contactAddress     = isset($_POST["contact_address"])?$_POST["contact_address"]:"";



    $pMng->beginTransaction();


    //SALVO INFO BASE
    $id_portal = $pMng->SavePortalBasicInfo($name,$site,$logo_name,$maxProperties,$notes,$enabled = 1);
    if($id_portal == null || $id_portal ==""  || strpos($id_property,"error")!== false){
        $pMng->rollback();
        echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI BASE DEL PORTALE");
        exit();
    }
    //SALVO INFO DI LOGIN AL PORTALE
    $ret = $pMng->SavePortalLoginInfo();
    if($ret == null || $ret ==""){
        $pMng->rollback();
        echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI LOGIN DEL PORTALE");
        exit();
    }

    // TODO  FATTE LE ALTRE FUNZIONI DI SALVATAGGIO, IMPLEMENTARLE E PASSARE A QUELLE DI UPDATE
    // TODO RECUPERARE PATH IMMAGINE SALVATA
    // TODO SALVARE FILE DI DOCUMENTAZIONE E RECUPERARE PATH


}else{
    echo("ACCESSO NON CONSENTITO");
}