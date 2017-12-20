<?php
include("../../config.php");
include(BASE_PATH."/app/classes/DbManager.php");
include(BASE_PATH."/app/classes/Mailer.php");
$dbMng  = new DbManager();
$mailer = new Mailer();


// Get The lastest 20 mail ready to sent or with errors
$mails  = $dbMng->executeQuery("select * from mailer where status in(1,4) order by status, ts LIMIT 20");

// for each email taken i'll sent it and update table with correct status
foreach ($mails as $mail) {
    $res = $mailer->sendMail($mail["to"], $mail["cc"], $mail["ccn"], $mail["object"], $mail["body"], $mail["altbody"], $mail["attachment_path"], $mail["ishtml"], $mail["from_email"], $mail["from_name"]);

    $mailStatus = $res==1?2:4;

    $dbMng->executeQuery("UPDATE mailer SET status = $mailStatus WHERE id=".$mail['id']);

}