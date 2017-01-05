<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserManager.php");

$mng            = new UserManager();
$SS_usr         = SessionManager::getVal("user",true);
$agency_id 		= $SS_usr->id;
$mng->setOffline($agency_id);// set offline status on db

SessionManager::unsetVal("user");
SessionManager::unsetVal("authenticated");


header("Location:login.php");

?>
