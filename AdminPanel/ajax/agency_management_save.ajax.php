<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 16/01/2017
 * Time: 12:57
 */

// Check if all params was sent
if(isset($_POST["inp_agency_banner"],$_POST["inp_agency_name"],$_POST["inp_agency_pIva"],$_POST["sel_country"],$_POST["sel_region"],$_POST["sel_city"],$_POST["sel_town"],$_POST["sel_district"],$_POST["inp_address"],$_POST["inp_street_num"],$_POST["sel_status"],$_POST["sel_sub_status"],$_POST["sel_portal_status"])){



    $id_agency                          = isset($_POST["id_agency"])?$_POST["id_agency"]:"";
    $inp_logo                           = isset($_POST["img_logo"])?$_POST["img_logo"]:"public/images/images_agencies_icons/min/default/logo.png";
    $inp_banner                         = $_POST["inp_agency_banner"];
    $inp_name                           = $_POST["inp_agency_name"];
    $inp_pIva                           = $_POST["inp_agency_pIva"];
    $inp_CF                             = $_POST["inp_agency_CF"];
    $inp_REA                            = $_POST["inp_agency_REA"];
    $inp_business_register              = $_POST["inp_agency_BR"]; // BUSINESS REGISTER
    $sel_country                        = $_POST["sel_country"];
    $sel_region                         = $_POST["sel_region"];
    $sel_city                           = $_POST["sel_city"];
    $sel_town                           = $_POST["sel_town"];
    $sel_district                       = $_POST["sel_district"];
    $inp_address                        = $_POST["inp_address"];
    $inp_street_num                     = $_POST["inp_street_num"];
    $inp_longitude                      = $_POST["inp_longitude"];
    $inp_latitude                       = $_POST["inp_latitude"];
    $sel_status                         = $_POST["sel_status"];
    $sel_sub_status                     = $_POST["sel_sub_status"];
    $sel_portal_status                  = $_POST["sel_portal_status"];
    $txt_description                    = isset($_POST["ag_description"])?$_POST["ag_description"]:"";

    // DATI OPERATORE DEFAULT
    $id_agent                       = $_POST["id_agent"];
    $inp_agent_name                 = $_POST["inp_agent_name"];
    $inp_agent_lastname             = $_POST["inp_agent_lastname"];
    $inp_agent_email                = $_POST["inp_agent_email"];
    $inp_agent_private_email        = $_POST["inp_agent_private_email"];
    $inp_agent_phone                = $_POST["inp_agent_telephone"];
    $inp_agent_mobile_phone         = $_POST["inp_agent_mobile_phone"];
    $inp_agent_fax                  = $_POST["inp_agent_fax"];
    $inp_agent_skype                = $_POST["inp_agent_skype"];
    $inp_agent_address              = $_POST["inp_agent_address"];
    $inp_agent_pIva                 = $_POST["inp_agent_pIva"];
    $inp_agent_CF                   = $_POST["inp_agent_CF"];
    $inp_agent_REA                  = $_POST["inp_agent_REA"];
    $sel_agent_id_status            = $_POST["sel_agent_status"];


    // Check if all params was valorized
    if($inp_banner =="" || $inp_name =="" || $inp_pIva =="" || $inp_CF =="" || $inp_REA == "" || $inp_business_register == "" || $sel_country =="" || $sel_region =="" || $sel_city =="" || $sel_town =="" || $sel_district =="" || $inp_address =="" || $inp_street_num =="" || $sel_status =="" ||  $sel_sub_status =="" || $sel_portal_status =="")
    {

            echo("Errore: Alcuni campi non sono stati inviati o non sono stati valorizzati");// campi con valore "";
            exit();

        }else{//if all params are ok i can proceed to Insert/Update
            include("../../config.php");
            include(BASE_PATH."/app/classes/AgencyManager.php");
            include(BASE_PATH."/app/classes/UserManager.php");
            include(BASE_PATH."/app/classes/Utils.php");

            $agMng = new AgencyManager();



            // -----------------------------------------------
            // ----------------  UPDATE ----------------------
            // -----------------------------------------------
            if($id_agency!="" && $id_agency!=null){
                $date_up = date("y-m-d h:i:s");
                $values = array($inp_logo,$inp_banner,$inp_name,$txt_description,$sel_country,$sel_region,$sel_city,$sel_town,$sel_district,$inp_address,$inp_street_num,$inp_longitude,$inp_latitude,$inp_pIva,$inp_CF,$inp_REA,$inp_business_register,$sel_status,$sel_sub_status,$sel_portal_status,$date_up,$id_agency);

                // AGENCY UPDATE
                $ret = $agMng->updateAgency($values,array("id = ?"));
                if($ret != "0"  &&  $ret != "1"){
                    echo("errore - Aggiornamento dell' agenzia fallito");
                    exit;
                }
                // AGENT UPDATE
                $ret = insertOrUpdateAgent();
                if( $ret!="0" && ($ret == null || $ret =="" || strpos($ret,"error"))){
                    echo("errore - Aggiornamento dell' agente fallito");
                    exit;
                }

                echo"success";

            // -----------------------------------------------
            // ----------------  INSERT ----------------------
            // -----------------------------------------------
            }else{
                // AGENCY CRATE
                $values = array($inp_logo,$inp_banner,$inp_name,$txt_description,$sel_country,$sel_region,$sel_city,$sel_town,$sel_district,$inp_address,$inp_street_num,$inp_longitude,$inp_latitude,$inp_pIva,$inp_CF,$inp_REA,$inp_business_register,$sel_status,$sel_sub_status,$sel_portal_status);

                $id_agency = $agMng->saveAgency($values);
                if( $id_agency == null ||
                    $id_agency =="" ||
                    strpos($id_agency,"error"))
                {
                    echo "errore nel salvataggio dell' agenzia";
                    exit;
                }

                // USER CREATE
                $ret = insertOrUpdateAgent();

                if($ret == null || $ret =="" || strpos($ret,"error")){
                    echo "errore nel salvataggio dell' agente";
                    exit;
                }
                else
                    echo "success";
            }
        }

}else{
    echo("Errore: Alcuni campi non sono stati inviati");
}

function insertOrUpdateAgent(){
    global $id_agency,$inp_agent_name, $inp_agent_lastname, $inp_agent_email, $inp_agent_private_email, $sha1Psw , $inp_agent_phone, $inp_agent_mobile_phone, $inp_agent_fax, $inp_agent_skype, $inp_agent_address, $inp_agent_pIva, $inp_agent_CF, $inp_agent_REA, $sel_agent_id_status, $id_agent;


    $ret = "";

    $usrMng = new UserManager();

    if($id_agent =="" || $id_agent == 0){
        // USER CREATE
        $strPsw = Utils::randomString(8);
        $sha1Psw = Utils::stringToSha1($strPsw);

        $agentValues = array($id_agency,2,$inp_agent_name, $inp_agent_lastname, $inp_agent_email, $inp_agent_private_email, $sha1Psw , $inp_agent_phone, $inp_agent_mobile_phone, $inp_agent_fax, $inp_agent_skype, $inp_agent_address, $inp_agent_pIva, $inp_agent_CF, $inp_agent_REA, $sel_agent_id_status);
        $ret = $usrMng->createUser($agentValues);

        //SE UPDATE DEVO INVIARE LA MAIL CON LE CREDENZIALI
        if(($ret > 1 || $ret =="Success")){
            include(BASE_PATH."/app/classes/MailManager.php");
            $mailMng = new MailManager();
            $template = $mailMng->getEmailTemplete(1);// 1 è l' id della mail di iscrizione nuovo utente

            $ccn = "webmaster@tecnoimmobiligroup.it";
            // prendo il corpo del template e sostituisco i placeholder
            $body = str_replace("{email}",$inp_agent_email,$template[0]["body"]);
            $body = str_replace("{password}",$strPsw,$body);
            // prendo il corpo alternativo del template e sostituisco i placeholder
            $altBody = str_replace("{email}",$inp_agent_email,$template[0]["altbody"]);
            $altBody = str_replace("{email}",$inp_agent_email,$altBody);

            // INVIO LA MAIL CON LE CREDENZIALI
            $mailMng->addEmail(3,1,"","",$inp_agent_email,"",$ccn,$template[0]["object"],$body,$altBody,$template[0]["ishtml"],"");

        }

    }else{
        // USER UPDATE
        $agentValues = array($id_agency,$inp_agent_name, $inp_agent_lastname, $inp_agent_email, $inp_agent_private_email , $inp_agent_phone, $inp_agent_mobile_phone, $inp_agent_fax, $inp_agent_skype, $inp_agent_address, $inp_agent_pIva, $inp_agent_CF, $inp_agent_REA, $sel_agent_id_status,$id_agent);


        $ret = $usrMng->updateUser($agentValues,array("id= ?"),null,null,false);
    }
    return $ret;
}
?>