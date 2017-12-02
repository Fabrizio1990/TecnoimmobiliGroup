<?php
//---------- DA PAGINA getAgencyData ------
$placeHolder ="{PH}";
define("ERR_AGENCY_NOT_FOUND","Errore: Agenzia non trovata in getAgencyData.inc.php");




// DA PAGINA saveproperty.inc.php
define("ERR_MISSING_PARAMS","Errore: non sono stati inviati tutti i parametri richiesti");
define("ERR_EMPTY_PARAMS","Errore: Alcuni parametri obbligatori sono stati inviati vuoti");
define("ERR_INVALID_CONVERSION","Errore: Uno o più campi non sono stati convertiti correttamente");
define("ERR_INVALID_CONVERSION_R","Errore: il campo '$placeHolder' non è stato convertito correttamente");

function printMessage($resource,$additionalText ="",$isReplaceText = false){
    global $placeHolder;
    $response = $isReplaceText ? str_replace($placeHolder,$additionalText,constant($resource)):(constant($resource)." ".$additionalText);

    echo ($response);
}
