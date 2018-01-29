<?php
// PAGINA DI INSERIMENTO PORTALI



if(isset($_POST["inp_portal_name"],$_POST["inp_portal_site"],$_POST["inp_portal_max_properties"], $_POST["inp_portal_personal_area_link"] ,$_POST["inp_portal_username"],$_POST["inp_portal_password"],$_POST["inp_portal_hasContract"],$_POST["inp_portal_contract_start"],$_POST["inp_portal_contract_end"],$_POST["inp_portal_hasFtp"],$_POST["inp_portal_link_ftp"],$_POST["inp_portal_user_ftp"],$_POST["inp_portal_psw_ftp"])){



    include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    require_once(BASE_PATH."/app/classes/DefValues.php");
    include(BASE_PATH."/app/classes/ImageHelper/ImageManager.php");
    include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $pMng = new PortalManager();
    $defVal = new DefValues();

    $id_portal          = isset($_POST["id_portal"]) ? $_POST["id_portal"] : 0;
    $logo_name          = urldecode($_POST["logo_portal"]);
    $name               = $_POST["inp_portal_name"];
    $site               = $_POST["inp_portal_site"];
    $maxProperties      = $_POST["inp_portal_max_properties"];
    $ar_link            = $_POST["inp_portal_personal_area_link"];
    $ar_username        = $_POST["inp_portal_username"];
    $ar_password        = $_POST["inp_portal_password"];
    $hasContract        = $_POST["inp_portal_hasContract"];
    $contractStart      = $_POST["inp_portal_contract_start"];
    $contractEnd        = $_POST["inp_portal_contract_end"];
    $contractPrice      = $_POST["inp_portal_contract_price"];
    $note               = isset($_POST["txt_notes"])?$_POST["txt_notes"]:"";

    $hasFtp             = $_POST["inp_portal_hasFtp"];
    $ftp_link           = $_POST["inp_portal_link_ftp"];
    $ftp_user           = $_POST["inp_portal_user_ftp"];
    $ftp_password       = $_POST["inp_portal_psw_ftp"];

    //$documentsFile      = isset($_FILES["documents_file"])?$_FILES["documents_file"]:null;
    $documentsUrl       = $_POST["inp_portal_feeds_doc_link"];

    $contactName        = isset($_POST["inp_portal_contact_name"])?$_POST["inp_portal_contact_name"]:"";
    $contactEmail       = isset($_POST["inp_portal_contact_email"])?$_POST["inp_portal_contact_email"]:"";
    $contactPhone       = isset($_POST["inp_portal_contact_phone"])?$_POST["inp_portal_contact_phone"]:"";
    $contactMobile      = isset($_POST["inp_portal_contact_mobile"])?$_POST["inp_portal_contact_mobile"]:"";
    $contactCity        = isset($_POST["inp_portal_contact_city"])?$_POST["inp_portal_contact_city"]:"";
    $contactAddress     = isset($_POST["inp_portal_contact_address"])?$_POST["inp_portal_contact_address"]:"";


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

        $portalFolderName = "portal_".$id_portal;
        // CREO LE CARTELLE DI DOC E FEED
        $docPath = BASE_PATH."/".$portalPublicPath."/".$portalFolderName."/".$portalDocFolder;
        $feedPath = BASE_PATH."/".$portalPublicPath."/".$portalFolderName."/".$portalFeedsFolder;
        if (!file_exists($docPath)) {
            mkdir($docPath, 0777, true);
        }
        if (!file_exists($feedPath)) {
            mkdir($feedPath, 0777, true);
        }

        //SALVO GLI EVENTUALI DOC NELLA CARTELLA
        $docFinalPath = "";

        if(isset($_FILES['inp_portal_feeds_doc'])){
            echo("FILE SETTATO");
            if (!$_FILES['inp_portal_feeds_doc']['size'] == 0 && !$_FILES['inp_portal_feeds_doc']['error'] == 0) {
                echo("FILE ESISTE REALMENTE E LO SALVEREI VA");
                $info = pathinfo($_FILES['inp_portal_feeds_doc']['name']);
                $ext = $info['extension']; // get the extension of the file
                $newname = "doc" . $ext;
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


        // TODO SALVARE FILE DI DOCUMENTAZIONE E RECUPERARE PATH

}else{
    echo("ACCESSO NON CONSENTITO");
}