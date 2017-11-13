<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 14/11/2016
 * Time: 17:17
 */

class SessionManager
{

    private static $usecoockie = true;
    private static $cookieLifetime = 86400;//1 day

    private static function startSession(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }


    public static function setVal($key,$obj,$cookieDuration = null){
        if( SessionManager::$usecoockie)
            SessionManager::setCookie($key,$obj,$cookieDuration);
        else
            sessionManager::setSession($key,$obj);
    }

    public static function getVal($key,$isSerialized = false){
        if( SessionManager::$usecoockie)
            return SessionManager::getCookieVal($key,$isSerialized);
        else
            return SessionManager::getSessionVal($key,$$isSerialized);
    }

    public static function unsetVal($key){
        if( SessionManager::$usecoockie)
            SessionManager::cookieUnsetKey($key);
        else
            SessionManager::sessionUnsetkey($key);
    }

    // ++++++++++ FUNZIONI DI AGGIUNTA DATO SESSIONE/COOKIE ++++++++++++++

    public static function setSession($key,$val){
        SessionManager :: startSession();
        $_SESSION[$key] = (is_object($val) ? serialize($val) : $val);
    }

    public static function setCookie($key,$val,$cookieDuration){
        $durationVal = $cookieDuration==null?SessionManager::$cookieLifetime:$cookieDuration;
        setcookie($key, (is_object($val) ? serialize($val) : $val), time()+$durationVal, "/");
    }

    // ++++++++++ FUNZIONI DI RECUPERO DATO DA SESSIONE/COOKIE ++++++++++++++

    public static function getSessionVal($key,$isSerialized){
        SessionManager :: startSession();
        $ret = null;
        if(isset($_SESSION[$key])){
            $ret = $isSerialized ? unserialize($_SESSION[$key]) : $_SESSION[$key];
        }
        return $ret;
    }

    public static function getCookieVal($key,$isSerialized){
        $ret = null;
        if(isset($_COOKIE[$key])) {
            $ret = $isSerialized ? unserialize($_COOKIE[$key]) : $_COOKIE[$key];
        }
        return $ret;
    }

    // ++++++++++ FUNZIONI DI CANCELLAZIONE SESSIONE/COOKIE ++++++++++++++

    public static function sessionUnsetkey($key){
        SessionManager :: startSession();
        unset($_SESSION[$key]);
    }

    public static function cookieUnsetKey($key){
        setcookie($key, null, -1, '/');
    }
}