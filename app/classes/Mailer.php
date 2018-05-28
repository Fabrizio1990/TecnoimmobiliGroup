<?php
require_once (BASE_PATH."/libs/backend/PHPMailer/PHPMailerAutoload.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
require_once(BASE_PATH."/app/classes/MyCrypter/MyCrypter.php");
class Mailer
{
    //SMTPDebug enables SMTP debug information (for testing)
    // 0 = none
    // 1 = errors and messages
    // 2 = messages onlyx

    private $TEST_MODE = true;

    private $mailer         = null;
    private $SMTPDebug      = 3;
    private $isSMTP         = false;
    private $host           = "";
    private $SMTPAuth       = true;
    private $username       = '';
    private $password       = '';
    private $SMTPSecure     = '';
    private $port           = 25;
    private $fromEmail      = "";
    private $fromName       = "";


    // get config file if sent as inp parameter or take the default one, with this
    // i can populate variables with config data
    function __construct($configPath = "/app/classes/Configs/emailConfig.ini") {
        $config = parse_ini_file(BASE_PATH.$configPath);
        $this->mailer       = new PHPMailer();

        //var_dump($config);
        //echo("<br><br>");
        $this->SMTPDebug    = $config['SMTPDebug'];
        $this->isSMTP       = $config['isSMTP'];


        $this->host         = $config['host'];
        $this->SMTPAuth     = $config['SMTPAuth'];
        $this->username     = $config['username'];
        $this->password     = $config['password'];
        $this->SMTPSecure   = $config['SMTPSecure'];
        $this->port         = $config['port'];
        $this->fromEmail    = $config['fromEmail'];
        $this->fromName     = $config['fromName'];
        $this->password     = $config['password'];
        //$this->password = MyCrypter::myDecrypt($config['password']);
        $this->init();
    }

    // Basic init of php mailer
    private function init(){
        $this->mailer->SMTPDebug = $this->SMTPDebug;
        $this->mailer->CharSet = 'UTF-8';
        $this->isSMTP ? $this->mailer->isSMTP() : null;
        $this->mailer->Host = $this->host;
        $this->mailer->SMTPAuth = $this->SMTPAuth;
        $this->mailer->Username = $this->username;
        $this->mailer->Password = $this->password;
        $this->mailer->SMTPSecure = $this->SMTPSecure;
        $this->mailer->Port = $this->port;
        $this->mailer->setFrom($this->fromEmail,$this->fromName);
    }

    //mail sender
    public function sendMail($recipients, $cc, $ccn, $object, $body, $altBody, $attachmentPaths = "", $isHtml = false, $fromEmail = "", $fromName = ""){

        //CHECK TEST MODE
        if($this->TEST_MODE){
            $recipients = "webmaster@tecnoimmobiligroup.it";
            $cc         = "";
            $ccn        = "";
        }

        if($fromEmail!=""){
            $this->mailer->setFrom($fromEmail,$fromName);
            $this->mailer->addReplyTo($fromEmail,$fromName);

        }

        $this->mailer->isHTML($isHtml);

        if($recipients == "" || $recipients == null){
            Flog::logError("Nessun destinatario presente","Mailer.php",true);
            return;
        }
        try {
            //reset phpmailer recipients to null
            $this->resetRecipients();

            $isHtml ? $this->mailer->isHTML(true) : $this->mailer->isHTML(false);
            $this->setRecipients($recipients);
            $this->setCC($cc);
            $this->setCCN($ccn);
            $this->setAttachments($attachmentPaths);
            $this->mailer->Subject  = $object;
            $this->mailer->Body     = $body;
            $this->mailer->AltBody  = $altBody;

            if(!$this->mailer->send()){
                Flog::logError('Mailer error: ' . $this->mailer->ErrorInfo,"Mailer.php",true);
                return 0;
            }

        }catch (phpmailerException $e){
            Flog::logError($e->errorMessage(),"Mailer.php",true);
            return 0;
        }
        return 1;

    }

    private function resetRecipients(){
        $this->mailer->ClearAddresses();
        $this->mailer->ClearCCs();
        $this->mailer->ClearBCCs();
        $this->mailer->clearAttachments();
    }

    private function setRecipients($recipients){

        if(!strpos($recipients,";")){// if single destination I set it directly
            $this->mailer->addAddress($recipients);
        }else{                        // else i get all destination and set one by one
            $to = explode(";",$recipients);
            for($i=0,$len = Count($to); $i <$len; $i++)
            {
                $this->mailer->AddCC($to[$i]);
            }
        }
    }

    private function setCC($cc){
        if($cc=="" || $cc==null)
            return;

        if(!strpos($cc,";")){// if single destination I set it directly
            $this->mailer->AddCC($cc);
        }else{                        // else i get all destination and set one by one
            $to = explode(";",$cc);
            for($i=0,$len = Count($cc); $i <$len; $i++)
            {
                $this->mailer->AddCC($cc[$i]);
            }
        }
    }

    private function setCCN($ccn){
        if($ccn=="" || $ccn==null)
            return;

        if(!strpos($ccn,";")){// if single destination I set it directly
            $this->mailer->addBCC($ccn);
        }else{                        // else i get all destination and set one by one
            $to = explode(";",$ccn);
            for($i=0,$len = Count($ccn); $i <$len; $i++)
            {
                $this->mailer->addBCC($ccn[$i]);
            }
        }
    }

    private function setAttachments($attachments){
        if($attachments=="" || $attachments==null)
            return;
        if(!strpos($attachments,";")){// if single destination I set it directly
            $this->mailer->addStringAttachment(file_get_contents(SITE_URL."/".$attachments), basename($attachments));
        }else{                        // else i get all destination and set one by one
            $attachments = explode(";",$attachments);
            for($i=0,$len = Count($attachments); $i <$len; $i++)
            {
                $this->mailer->addStringAttachment(file_get_contents(SITE_URL."/".$attachments[$i]), basename($attachments[$i]));
            }
        }
    }



}