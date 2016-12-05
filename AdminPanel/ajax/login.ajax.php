<?php
// CONTROLLO SE SONO STATI MANDATI IN POST I PARAMETRI
if(isset($_POST["email"]) && isset($_POST["password"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/UserEntity.php");
    include(BASE_PATH."/app/classes/UserManager.php");

	
	$email 		= $_POST["email"];
	$password	= $_POST["password"];
	$remember	= isset($_POST["remember"])?$_POST["remember"]:0;



    $usrM = new UserManager();

    $ret = $usrM->checkLogin($email,$password);
    if($ret){
        SessionManager::setVal("user",$ret);
        SessionManager::setVal("authenticated",1);
        if($remember){
            SessionManager::setVal("email_login", $email);
        }else{
            SessionManager::unsetVal("email_login");
        }

        echo(1);
    }else{
	    echo(0);
    }
	
}else{
	header("location: http://www.tecnoimmobiligroup.it");
}