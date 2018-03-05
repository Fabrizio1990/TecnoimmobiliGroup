<?php
if(isset($_POST["id_portal"],$_POST["sel_category"],$_POST["sel_default_value"],$_POST["inp_converted_value"])){
    include("../../config.php");
    include(BASE_PATH."/app/classes/OptionsConversionManager.php");
    $convMng = new OptionsConversionManager();

   //var_dump($_POST["inp_converted_value"]);
   //echo("SETTATI");
    $id_portal = $_POST["id_portal"];
    $tables = $_POST["sel_category"];
    $defValues = $_POST["sel_default_value"];
    $converted_values = $_POST["inp_converted_value"];
    if((count($tables) == count($defValues)) && (count($tables) == count($converted_values))){
        for ($i = 0 ,$len = count($tables); $i < $len; $i++){
            //TODO TUTTI I RETURN ANDREBBERO CONTROLLATI
            $ret = $convMng->saveConversion($id_portal,$tables[$i],$defValues[$i],$converted_values[$i]);
        }
    }

    echo $ret[0][0];

}