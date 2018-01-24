<?php
// PAGINA DI INSERIMENTO PORTALI
if(isset($_POST["name"],$_POST["site"],$_POST["max_properties"], $_POST["ar_link"] ,$_POST["ar_username"],$_POST["ar_password"],$_POST["hasContract"],$_POST["contract_start"],$_POST["contract_end"],$_POST["note"],$_POST["hasFtp"],$_POST["ftp_link"],$_POST["ftp_user"],$_POST["ftp_password"])){

    include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    require_once(BASE_PATH."/app/classes/DefValues.php");

    $pMng = new PortalManager();
    $defVal = new DefValues();

    $id_portal          = isset($_POST["id_portal"]) ? $_POST["id_portal"] : 0;
    $logo_name          = "";//TODO SALVA IMMAGINE E RECUPERA NOME
    $name               = $_POST["name"];
    $site               = $_POST["site"];
    $maxProperties      = $_POST["max_properties"];
    $ar_link            = $_POST["ar_link"];
    $ar_username        = $_POST["ar_username"];
    $ar_password        = $_POST["ar_password"];
    $hasContract        = $_POST["hasContract"];
    $contractStart      = $_POST["contract_start"];
    $contractEnd        = $_POST["contract_end"];
    $contractPrice      = $_POST["contract_price"];
    $note               = $_POST["note"];

    $hasFtp             = $_POST["hasFtp"];
    $ftp_link           = $_POST["ftp_link"];
    $ftp_user           = $_POST["ftp_user"];
    $ftp_password       = $_POST["ftp_password"];

    //$documentsFile      = isset($_FILES["documents_file"])?$_FILES["documents_file"]:null;
    $documentsUrl       = $_POST["documents_url"];

    $contactName        = isset($_POST["contact_name"])?$_POST["contact_name"]:"";
    $contactEmail       = isset($_POST["contact_email"])?$_POST["contact_email"]:"";
    $contactPhone       = isset($_POST["contact_phone"])?$_POST["contact_phone"]:"";
    $contactMobile      = isset($_POST["contact_mobile"])?$_POST["contact_mobile"]:"";
    $contactCity        = isset($_POST["contact_city"])?$_POST["contact_city"]:"";
    $contactAddress     = isset($_POST["contact_address"])?$_POST["contact_address"]:"";


    $retPath = $defVal->getDefaultValue("portal_public_path");
    $portalPublicPath = $retPath[0][0];


    $retPath = $defVal->getDefaultValue("portal_doc_folder");
    $portalDocFolder = $retPath[0][0];
    $retPath = $defVal->getDefaultValue("portal_feeds_folder");
    $portalFeedsFolder = $retPath[0][0];


    // CONTROLLO SE ESISTE GIà UN PORTALE CON IL NOME E INDIRIZZO PASSATI

    $ret = $pMng->read(array("name= ?","site = ?"),null,array($name,$site),"id");
    if(count($ret)> 0)
        $id_portal = $ret[0]["id"];




    /* ############## SALVATAGGIO #############*/

        $pMng->beginTransaction();
        //SALVO INFO BASE
        $id_portal = $pMng->SavePortalBasicInfo($id_portal,$name,$site,$logo_name,$maxProperties,$note,$enabled = 1);
        if($id_portal == null || $id_portal ==""  || strpos($id_portal,"error")!== false){
            $pMng->rollback();
            echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI BASE DEL PORTALE");
            exit();
        }

        //SALVO INFO Del contratto
        $ret = $pMng->SavePortalContractInfo($id_portal,$contractStart,$contractEnd,$contractPrice);


        if($ret == null || $ret =="" ){
            $pMng->rollback();
            echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI CONTRATTO DEL PORTALE");
            exit();
        }
        //SALVO INFO DI LOGIN AL PORTALE
        $ret = $pMng->SavePortalLoginInfo($id_portal,$ar_link,$ar_username,$ar_password);
        if($ret == null || $ret ==""){
            $pMng->rollback();
            echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI LOGIN DEL PORTALE");
            exit();
        }
        //SALVO INFO FTP DEL PORTALE
        if($hasFtp){
            $ret = $pMng->SavePortalFtpInfo($id_portal,$ftp_link,$ftp_user,$ftp_password);
            if($ret == null || $ret ==""){
                $pMng->rollback();
                echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI FTP DEL PORTALE");
                exit();
            }
        }
        //SALVO INFO DEL CONTATTO
        $ret = $pMng->SavePortalContactInfo($id_portal,$contactName,$contactEmail,$contactPhone,$contactMobile,$contactAddress,$contactCity);
        if($ret == null || $ret ==""){
            $pMng->rollback();
            echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI CONTATTO DEL PORTALE");
            exit();
        }

        $portalNameEncoded = str_replace(".","_",$name);
        // CREO LE CARTELLE DI DOC E FEED
        $docPath = BASE_PATH."/".$portalPublicPath."/".$portalNameEncoded."/".$portalDocFolder;
        $feedPath = BASE_PATH."/".$portalPublicPath."/".$portalNameEncoded."/".$portalFeedsFolder;
        if (!file_exists($docPath)) {
            mkdir($docPath, 0777, true);
        }
        if (!file_exists($feedPath)) {
            mkdir($feedPath, 0777, true);
        }

        //SALVO GLI EVENTUALI DOC NELLA CARTELLA
        $docFinalPath = "";
        if(isset($_FILES['inp_portal_feeds_doc'])){
            if (!$_FILES['inp_portal_feeds_doc']['size'] == 0 && !$_FILES['inp_portal_feeds_doc']['error'] == 0) {
                $info = pathinfo($_FILES['inp_portal_feeds_doc']['name']);
                $ext = $info['extension']; // get the extension of the file
                $newname = $portalNameEncoded . "_doc" . $ext;
                $docFinalPath = $docPath . '/' . $newname;
                move_uploaded_file($_FILES['inp_portal_feeds_doc']['tmp_name'], $docFinalPath);
            }
        }

        $ret = $pMng->SavePortalDocumentation($id_portal,$docFinalPath,$documentsUrl);
        if($ret == null || $ret ==""){
            $pMng->rollback();
            echo("ERRORE NEL SALVATAGGIO DELLE INFORMAZIONI DI DOCUMENTAZIONE DEL PORTALE");
            exit();
        }

        $pMng->commit();
        echo("Success");






    // TODO  FATTE LE ALTRE FUNZIONI DI SALVATAGGIO, IMPLEMENTARLE E PASSARE A QUELLE DI UPDATE
    // TODO RECUPERARE PATH IMMAGINE SALVATA
    // TODO SALVARE FILE DI DOCUMENTAZIONE E RECUPERARE PATH


}else{
    echo("ACCESSO NON CONSENTITO");
}