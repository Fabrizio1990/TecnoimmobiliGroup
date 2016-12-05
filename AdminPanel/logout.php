<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");

SessionManager::unsetVal("user");
SessionManager::unsetVal("authenticated");


header("Location:login.php");

?>
