<?php
require_once ("resources.php");
function getConvertedField($conversionRet,$fieldName){
    global  $debugMode;
    if($conversionRet ==""){
        printMessage("ERR_INVALID_CONVERSION_R",$fieldName." ".$conversionRet,true);
        exit();
    }else{
        if($debugMode)echo($fieldName." -> ".$conversionRet."<br>");
    }
    return $conversionRet;
}

/*function getConvertedField($conversionRet,$fieldName){
    global  $debugMode;
    if($conversionRet ==""){
        printMessage("ERR_INVALID_CONVERSION_R",$fieldName." ".$conversionRet,true);
        exit();
    }else{
        if($debugMode)echo($fieldName." -> ".$conversionRet."<br>");
    }
    return $conversionRet;
}*/