<html>
<head>
    <script src="js/UTILS.js"></script>
    <script src="js/MODALS.js"></script>
</head>


<?php

include("config.php");



// ############################ MAIL #########################
include("app/classes/MailManager.php");

//$mailer = new Mailer();
$mailMng = new MailManager();
$mailMng->sendMails();
//$mailMng->getEmailTemplete(1);
/*$ret = $mailMng->sendMails();
foreach ($mails as $mail){
    $mailer->sendMail($mail["to"],$mail["cc"],$mail["ccn"],$mail["object"],$mail["body"],$mail["altbody"],$mail["attachment_path"],$mail["ishtml"], $mail["from_email"],$mail["from_name"]);
}*/


/*$dbMng  = new DbManager();
$mailer = new Mailer();
$mails  = $dbMng->executeQuery("select * from mailer where status in(1,4) ");
foreach ($mails as $mail){
    $mailer->sendMail($mail["to"],$mail["cc"],$mail["ccn"],$mail["object"],$mail["body"],$mail["altbody"],$mail["attachment_path"],$mail["ishtml"], $mail["from_email"],$mail["from_name"]);




    //$mailer->sendMail($mail["to"],$mail["cc"],$mail["ccn"],$mail["object"],$mail["body"],$mail["altbody"],$mail["attachment_path"]);
}*/
//$mailer->sendMail("webmaster@tecnoimmobiligroup.it","","","Mail di prova","Questa è una mail di prova","questo è un contenuto alternativo");




// #################### END MAIL ####################


/*include("app/classes/MyCrypter/MyCrypter.php");

include("app/classes/DbManager.php");*/


//include(SITE_URL."/app/classes/FileHelper/FileHelper.php");



//require_once(SITE_URL."/app/classes/OptionsManager.php");



//include("app/classes/UserEntity.php");

//include(SITE_URL."/app/classes/SessionManager.php");


//include("app/classes/UserManager.php");



/*include("app/classes/NewsEntity.php");*/


//include("app/classes/NewsManager.php");


//include("app/classes/PropertyManager.php");







/* ################# CRYPT TEST #################
    /*$cryptedString = MyCrypter::myEncrypt("test");
    echo("stringa criptata<br>");
    echo($cryptedString);
    echo("<br>stringa DEcriptata<br>");
    echo(MyCrypter::myDecrypt($cryptedString));*/


//$dbMng = new DbManager();

//$dbMng->openConnection();





/*$fMng = new FileHelper();
    $fileContent = $fMng->readFile(SITE_URL."/app/classes/conn_par.txt");
    $fileContentJson = json_decode($fileContent);
    //var_dump($fileContentJson);
    echo($fileContentJson->username);*/

//$db = new DbManager();

//$mng = new OptionsManager();

//$agencies = $mng ->readOptions("agencies_list");

//var_dump($agencies);

//$usrM = new PropertyManager();

//$resImg = $usrM->getImages(array("id_property=?","id_image_type = ?"),array("LIMIT 1"),array(4,1),"img_name");

//echo($resImg[0]["img_name"]);

//$res = $usrM->checkLogin("info@tecnoimmobiligroup.it","b151195");

//$SS_usr = SessionManager::getVal("user",true);

//$agency_id 		= $SS_usr->id;

//echo($agency_id);

//$usrM->setOffline($agency_id);

//echo(sha1("b151195"));

//echo($res);

//$propM = new PropertyManager();

//$res = $propM->read(array("reference_code = ?","id_cit = ?"),array("Group by ?"),array("123",4,"id"),array("id","id_contract","id_country","id_city"));

//$res = $propM->readAllAds(null,null,null ,null,false);

//var_dump($res);


//$newsM = new NewsManager();


//$res = $newsM->read(array("title = ?","description = ?"),array("Limit  12"),array("te'st","test"),array("id","title","description"));



//$res = $newsM->create(array("test create ","test create desc nuova struttura"));


//$res = $newsM->update(array("title = ?","description = ?"),array("id = ?"),array("update prova titolo2","update prova descr",18));


//$res = $newsM->delete(array("id=?"),array(18));



//var_dump($res);






?>
</body>
</html>
