<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 17:16
 */

// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
/*require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");*/

class Utils {

    public static function rstToOptionsJson($rst,$label1 = "value",$label2 = "text"){
        $arrOpts = Array();
        for($i=0,$len = count($rst);$i<$len;$i++){
            array_push($arrOpts,array($label1=>$rst[$i][0],$label2 => $rst[$i][1]));
        }
        return json_encode($arrOpts);
    }



    static function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
        $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
        $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");

        $result = str_replace($escapers, $replacements, $value);

        $result = htmlentities($result, ENT_QUOTES);
        return $result;
    }

    static function stringToSha1($string){
        return sha1($string);
    }

    static function randomString($len = 8) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_-?^';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $len; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    static  function formatPrice($price){
        return number_format ( $price , 0 ,",",".");
    }

    static function truncateText($text,$maxLen,$truncateChars ="..."){
        $ret = strlen($text)>$maxLen?substr($text,0,$maxLen)." ".$truncateChars:$text;
        return $ret;
    }

    static function getCurrentUrl(){
        $url =  "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
        return $escaped_url ;
    }


}


