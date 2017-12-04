<?php
//---------- DA PAGINA getAgencyData ------
$placeHolder ="{PH}";
define("ERR_AGENCY_NOT_FOUND","Errore: Agenzia non trovata in getAgencyData.inc.php");




// DA PAGINA saveproperty.inc.php
define("SUCCESS_PROPERTY_SAVED","Immobile salvato con successo sul sito");


define("ERR_MISSING_PARAMS","Errore: non sono stati inviati tutti i parametri richiesti");
define("ERR_EMPTY_PARAMS","Errore: Alcuni parametri obbligatori sono stati inviati vuoti");
define("ERR_INVALID_CONVERSION","Errore: Uno o più campi non sono stati convertiti correttamente");
define("ERR_MISSING_REGION","Errore: non è stato possibile risalire alla Regione di appartenenza");
define("ERR_INVALID_CONVERSION_R","Errore: il campo '$placeHolder' non è stato convertito correttamente");
define("ERR_SAVE_PROPERTY","Errore: il salvataggio dell' immobile ha riscontrato dei problemi, controlla i campi");
define("ERR_GENERATING_REFERENCE_CODE","Errore: generazione e salvataggio del codice di riferimento fallita");
define("ERR_GETTING_VALID_AGENT","Errore: Recupero agente fallito, controlla id agenzia");
define("ERR_ASSOCIATING_PROPERTY_AGENCY","Errore: Salvataggio associazione immobile->agenzia fallito");
define("ERR_SAVE_DESCRIPTION_FAILED","Errore: Salvataggio associazione immobile->agenzia fallito");
define("ERR_SAVE_MAGAZINE_INFO","Errore: Salvataggio info rivista non riuscito");

function printMessage($resource,$additionalText ="",$isReplaceText = false){
    global $placeHolder;
    $response = $isReplaceText ? str_replace($placeHolder,$additionalText,constant($resource)):(constant($resource)." ".$additionalText);

    echo ($response);
}
