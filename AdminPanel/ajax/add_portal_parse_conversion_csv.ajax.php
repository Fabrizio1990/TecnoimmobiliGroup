<?php

if(isset($_FILES["conversionCSV"])){
    set_time_limit(0);
    include("../../config.php");
    require_once(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");

    $convMng = new OptionsConversionManager();

    $csv = file_get_contents($_FILES['conversionCSV']['tmp_name']);
    $fieldDelimiter = $_POST["fieldDelimiter"];
    $useHeader = $_POST["useHeader"];
    $allowEmpty = $_POST["allowEmpty"];


    $lines = explode(PHP_EOL, $csv);
    $linesCount = count($lines);
    //lo switch di boostrap restituisce false come stringa
    $startingIdx = $useHeader =="false" ? 1:0;

    for($i = $startingIdx ; $i < $linesCount ; $i++){

        $rowValues = explode($fieldDelimiter, $lines[$i]);

        //IF CONVERTED VALUE == NF I WILL SKIP THIS CONVERSION
        $convertedVal   = isset($rowValues[4])?$rowValues[4]:"";
        if($convertedVal=="NF" || $convertedVal == "")
            continue;

        $portalName     = $rowValues[0];
        $portalId = $convMng->portalNameToId($portalName);
        $tableCatId     = $rowValues[1];
        $idOriginalVal  = $rowValues[2];
        $originalTxt  = $rowValues[3];
        // THIRD ELEMENT IS ONLY TO CSV COMPRENSION BUT IS USED ONLY FOR LOG
        if($portalName == ""){
            echo("ERR: Manaca il nome del portale a linea ".$i ." per il valore" .$originalTxt);
            continue;
        }
        if($tableCatId == ""){
            echo("ERR: ID CATEGORIA TABELLA MANCANTE a linea ".$i ." per il valore" .$originalTxt);
            continue;
        }

        $ret = $convMng->saveConversion($portalId,$tableCatId,$idOriginalVal,$convertedVal,false);
    }


    echo("Success");
}
else{
    echo("NON è setatto");
}





// START FROM 1 TO AVOID HEADERS
