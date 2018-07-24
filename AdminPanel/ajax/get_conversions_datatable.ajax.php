
<?php
    set_time_limit(0);
    ini_set('', '1024M');
	header('Content-type: text/json; charset=utf-8');
    require_once("../../config.php");
    require_once(BASE_PATH."/app/classes/UserManager.php");
    require_once(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");

    $array = array("aaData"=>array());

    if(isset($_REQUEST["portal_id"])){
        $portal_id = $_REQUEST["portal_id"];
        $cnvMng  = new OptionsConversionManager();
        $conversions = $cnvMng->getPortalConversions($portal_id);

        if(count($conversions) > 0){
            $prevCatId = 0;
            $parsedConversionOpts ="";
            foreach ($conversions as $conversion){

                $idConversion = $conversion["id"];
                $catSelected = $conversion["category_id"];
                $fieldSelected = $conversion["original"];
                $conversionVal = $conversion["converted"];
                $actions = "
        <div class=\"form-group\">
            <div class=\"btn-group\">
                <input type=\"hidden\" class=\"doc_id\" value=\"13\">
                <button type=\"button\" class=\"btn btn-info save_conversion\">
                    <i class=\"fa fa-save\"></i>
                </button>
                <button type=\"button\" class=\"btn btn-danger delete_conversion\">
                    <i class=\"fa fa-remove\"></i>
                </button>
            </div>";
                if($catSelected == 4 || $catSelected == 5)
                    continue;
                /*if($catSelected != $prevCatId){
                    $parsedConversionOpts = $cnvMng->getConversionFieldArray($catSelected);
                }*/
                $selCategory = "<input type='hidden' class='id_conversion' value='".$idConversion."' /><div class='col-md-3'><div class='form-group'>
                <select name='sel_category[]' class='form-control sel_category'>".$cnvMng->getConversionCategoryOpts($catSelected)."</select></div></div>";
                $selFieldSelected = "<select name='sel_default_value[]' class='form-control sel_default_value'>".$cnvMng->getConversionFieldOpts($catSelected,$fieldSelected)."</select>";
                $inpConversionVal = "<input type='text' name='inp_converted_value' class='form-control inp_converted_value' value='".$conversionVal."'/>";

                array_push($array["aaData"],array($selCategory,$selFieldSelected,$inpConversionVal,$actions));
                $prevCatId = $catSelected;
            }
        }

    }

    echo(json_encode($array));



?>