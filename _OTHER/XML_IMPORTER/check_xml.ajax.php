<?php
set_time_limit (0);
function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        print libxml_display_error($error);
    }
    libxml_clear_errors();
}

// Enable user error handling
libxml_use_internal_errors(true);

//$defUrl = "http://localhost/Tecnoimmobili/SITE/_export/export_immobili.php";
$defUrl = "http://www.tecnoimmobiligroup.it/_export/export_immobili.php";
$xmlUrl = isset($_POST["xmlUrl"])?$_POST["xmlUrl"]:$defUrl;


$xml = new DOMDocument();
$xml->load($xmlUrl);
var_dump($xml);
if (!$xml->schemaValidate('XML_XSD/xsd_validator.xsd')) {
    print '<b style=\'color:red\'>DOMDocument::schemaValidate() Generated Errors!</b>';
    libxml_display_errors();
}else {
    echo("XML VALIDO");
}