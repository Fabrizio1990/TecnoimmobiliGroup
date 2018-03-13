<?php
if(isset($_REQUEST["category"])){
    include("../../../config.php");
    include(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");

    $cnvMng = new OptionsConversionManager();

    $opts = $cnvMng->getConversionFieldOpts($_REQUEST["category"]);
    echo($opts);

}
else{
    echo("Accesso non autorizzato");
}