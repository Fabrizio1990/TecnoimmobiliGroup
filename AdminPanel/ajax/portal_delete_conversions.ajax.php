<?php
if(isset($_POST["id_conversion"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/OptionsConversionManager.php");
    $convMng = new OptionsConversionManager();

    $id_conversion = $_POST["id_conversion"];

    $ret = $convMng->deleteConversion($id_conversion);

    echo $ret[0][0];

}