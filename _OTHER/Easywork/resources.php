<?php
// DA PAGINA bridge.php
define("ERR_MISSING_ID_EASYWORK","Errore: ID_EASYWORK non è tra i parametri ricevuti");

//---------- DA PAGINA getAgencyData ------
$placeHolder ="{PH}";
define("ERR_AGENCY_NOT_FOUND","Errore: Agenzia non trovata in getAgencyData.inc.php");


//COMUNI
define("ERR_MISSING_PARAMS","Errore: non sono stati inviati tutti i parametri richiesti");
define("ERR_MISSING_REQUEST_PARAMS","Errore: non sono stati inviati tutti i dati dell' incarico");
define("ERR_EMPTY_PARAMS","Errore: Alcuni parametri obbligatori sono stati inviati vuoti");
define("ERR_INVALID_CONVERSION_R","Errore: il campo '$placeHolder' non è stato convertito correttamente");
define("ERR_MISSING_REGION","Errore: non è stato possibile risalire alla Regione di appartenenza");
define("ERR_MISSING_CATEGORY","Errore: non è stato possibile risalire alla categoria di appartenenza");

// DA PAGINA saveproperty.inc.php
define("SUCCESS_PROPERTY_SAVED","Immobile salvato con successo sul sito");

define("ERR_INVALID_CONVERSION","Errore: Uno o più campi non sono stati convertiti correttamente");
define("ERR_SAVE_PROPERTY","Errore: il salvataggio dell' immobile ha riscontrato dei problemi, controlla i campi");
define("ERR_GENERATING_REFERENCE_CODE","Errore: generazione e salvataggio del codice di riferimento fallita");
define("ERR_GETTING_VALID_AGENT","Errore: Recupero agente fallito, controlla id agenzia");
define("ERR_ASSOCIATING_PROPERTY_AGENCY","Errore: Salvataggio associazione immobile->agenzia fallito");
define("ERR_SAVE_DESCRIPTION_FAILED","Errore: Salvataggio descrizione non riuscito");
define("ERR_SAVE_APPOINTMENT","Errore: Salvataggio appuntamento non riuscito");
define("ERR_SAVE_MAGAZINE_INFO","Errore: Salvataggio info rivista non riuscito");

// DA PAGINA updateProperty.inc.php
define("SUCCESS_PROPERTY_UPDATED","Immobile aggiornato con successo sul sito");
define("ERR_UPDATE_PROPERTY","Errore: l' update dell' immobile ha riscontrato dei problemi, controlla i campi");
define("ERR_UPDATE_DESCRIPTION_FAILED","Errore: Aggiornamento descrizione non riuscito");
define("ERR_UPDATE_APPOINTMENT","Errore: Aggiornamento appuntamento non riuscito");
define("ERR_UPDATE_MAGAZINE_INFO","Errore: Aggiornamento info rivista non riuscito");



//DA PAGINA saveImage.inc.php
define("ERR_SLOT_NOT_DEFINED","Errore: Slot non è definito");
define("ERR_ID_EASYWORK_NOT_DEFINED","Errore: id_easywork non è definito nel salvataggio immagini");


// DA PAGINA saveOrUpdateRequest.inc.php
define("SUCCESS_REQUEST_SAVED","Richiesta salvata con successo");
define("SUCCESS_REQUEST_UPDATED","Richiesta aggiornata con successo");
define("ERR_REQUEST_NOT_SAVED","Errore: la richiesta non è stata salvata. contatta il webmaster");

function printMessage($resource,$additionalText ="",$isReplaceText = false){
    global $placeHolder;
    $response = $isReplaceText ? str_replace($placeHolder,$additionalText,constant($resource)):(constant($resource)." ".$additionalText);

    echo ($response);
}
