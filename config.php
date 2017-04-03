<?php
date_default_timezone_set('Europe/Rome');
$envoirments = ["development","test","production"];

define("SITE_URL", "http://localhost/Tecnoimmobili/Tecnoimmobiligroup_nuovo");
define("BASE_PATH", realpath(dirname(__FILE__) ));
define("LOG_PATH", BASE_PATH."/app/logs/");
define("ENVOIRMENT",$envoirments[0]);
define("DEBUG",ENVOIRMENT == $envoirments[2]?false:true);

require (BASE_PATH."/app/classes/LogHelper/Flog.php");

// MY ERROR HANDLER THAT SUBSTITUTE THE PHP ONES
require_once(BASE_PATH."/err_handler.php");

