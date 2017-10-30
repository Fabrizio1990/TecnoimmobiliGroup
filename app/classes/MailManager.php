<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 17:17
 */
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
require_once(BASE_PATH."/app/classes/Mailer.php");
class MailManager extends DbManager implements IDbManager {


    const defTable  = "mailer";
    private $currTable;
    private $mailer = null;
    public function __construct($configPath = "/app/classes/Configs/emailConfig.ini") {
        parent::__construct();
        $this->currTable = self::defTable;
        $this->mailer = new Mailer($configPath);
    }
    public function create($values, $fields = null,$printQuery = false)
    {
        $def_fields     = array("`type`","`status`","`from_email`","`from_name`","`to`","`cc`","`ccn`","`ishtml`","`object`","`body`","`altbody`","`attachment_path`");

        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values,$printQuery);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery =false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
        return $ret;
    }

    public function update($fields,$params,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::update($this->currTable,$fields,$params,$values,$extra_params,$printQuery);
        return $ret;
    }

    public function delete($params = null,$values = null,$extra_params = null,$printQuery =false)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params,$printQuery);
        return $ret;
    }



    public function addEmail($type,$status,$from_email,$from_name,$to,$cc,$ccn,$object,$body,$altBody = "",$ishtml = 0,$attachments =""){

        $values = array($type,$status,$from_email,$from_name,$to,$cc,$ccn,$ishtml,$object,$body,$altBody,$attachments);

        $ret = $this->create($values,null,false);
        return $ret;
    }

    public function getMailToSend($status = "1,4"){
        $ret = $this->read("status in(1,4)");
        return $ret;
    }


    public function sendMails($status = "1,4"){
        if($this->mailer == null)
            $this->mailer = new Mailer();

        $mails = $this->getMailToSend($status);
        foreach ($mails as $mail) {
            $isSent = $this->mailer->sendMail($mail["to"], $mail["cc"], $mail["ccn"], $mail["object"], $mail["body"], $mail["altbody"], $mail["attachment_path"], $mail["ishtml"], $mail["from_email"], $mail["from_name"]);

            if($isSent == 1)
                $this->updateStatus($mail["id"],2);
            else
                $this->updateStatus($mail["id"],4);
        }
    }

    public function getEmailTemplete($id){
        $this->currTable = "mail_templates";

        $ret = $this->read("id = ?",null,array($id) ,array("object","body","altbody","ishtml","attachment_path"),false);

        $this->setDefTable();
        return $ret;
    }

    public function getDefaultSenderData(){
        return array("mail"=>"info@tecnoimmobiligroup.it","name"=>"TecnoImmobiliGroup services");
    }


    public function updateStatus($idMail,$status){
        $ret = $this->update("status = ?","id = ?",array($status,$idMail));
        return $ret;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }


}
