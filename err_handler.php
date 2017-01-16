<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 16/01/2017
 * Time: 14:23
 */
function myErrorHandler($errno, $errstr, $errfile, $errline)
{

    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }
    $filename = basename ($errfile);
    $err = "";
    switch ($errno) {
        case E_USER_ERROR:
            $err.= "<b>My ERROR</b> [$errno] $errstr<br />\n";
            $err.= "  Fatal error on line $errline in file $errfile";
            $err.= ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            $err.= "Aborting...<br />\n";

            //exit(1);
            break;

        case E_USER_WARNING:
            $err.= "<b>My WARNING</b> [$errno] $errstr on line $errline in file $errfile<br />\n";
            break;

        case E_USER_NOTICE:
            $err.= "<b>My NOTICE</b> [$errno] $errstr on line $errline in file $errfile<br />\n";
            break;

        default:
            $err.= "Unknown error type: [$errno] $errstr on line $errline in file $errfile<br />\n";
            break;
    }
    if(DEBUG)
        echo $err;

    Flog::logError($err,$filename);

    /* Don't execute PHP internal error handler */
    return true;
}

// OVVERRIDE DEFAULT PHP ERROR HANDLER WITH MINE
set_error_handler("myErrorHandler");