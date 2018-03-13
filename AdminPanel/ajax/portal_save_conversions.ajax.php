<?php
if(isset($_POST["id_portal"],$_POST["sel_category"],$_POST["sel_default_value"],$_POST["inp_converted_value"])){
    include("../../config.php");
    include(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");
    $convMng = new OptionsConversionManager();

   //var_dump($_POST["inp_converted_value"]);
   //echo("SETTATI");
    $id_portal = $_POST["id_portal"];
    $categories = $_POST["sel_category"];
    $defValues = $_POST["sel_default_value"];
    $converted_values = $_POST["inp_converted_value"];
    if((count($categories) == count($defValues)) && (count($categories) == count($converted_values))){
        for ($i = 0 ,$len = count($categories); $i < $len; $i++){
            //TODO TUTTI I RETURN ANDREBBERO CONTROLLATI
            $ret = $convMng->saveConversion($id_portal,$categories[$i],$defValues[$i],$converted_values[$i]);
        }
    }

    echo $ret[0][0];

}