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

    public static function rstToOptionsJson($rst){
        $arrOpts = Array();
        for($i=0,$len = count($rst);$i<$len;$i++){
            //echo($rst[$i][$valField]."<br>");
            //echo(utf8_encode($rst[$i][$textField])."<br>");
            array_push($arrOpts,array("value"=>$rst[$i][0],"text" => $rst[$i][1]));
        //"<option value='".$rst[$i][$valField]."'>".$rst[$i][$textField]."</option>");
        }
        //var_dump($arrOpts);
        return json_encode($arrOpts);
    }

    function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
        $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
        $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
        $result = str_replace($escapers, $replacements, $value);
        return $result;
    }








}


