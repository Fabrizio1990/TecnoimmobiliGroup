<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 11/12/2016
 * Time: 17:16
 */

// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class Utils {

    public static function rstToOptionsJson($rst,$valField,$textField){
        $arrOpts = Array();
        for($i=0,$len = count($rst);$i<$len;$i++){
            //echo($rst[$i][$valField]."<br>");
            //echo(utf8_encode($rst[$i][$textField])."<br>");
            array_push($arrOpts,array("value"=>utf8_encode($rst[$i][$valField]),"text" => utf8_encode($rst[$i][$textField])));
        //"<option value='".$rst[$i][$valField]."'>".$rst[$i][$textField]."</option>");
        }
        //var_dump($arrOpts);
        return json_encode($arrOpts);
    }








}


