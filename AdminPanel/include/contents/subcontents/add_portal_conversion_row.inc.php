<?php
if(!defined ("BASE_PATH"))
    require_once("../../../../config.php");
require_once(BASE_PATH."/app/classes/OptionsConversionManager.php");
$cnvMng  = new OptionsConversionManager();


$idConversion = isset($idConversion)?$idConversion:"";
$catSelected = isset($catSelected)?$catSelected:"1";
$fieldSelected = isset($fieldSelected)?$fieldSelected:"";
$conversionVal = isset($conversionVal)?$conversionVal:"";
//echo('fieldSelected = '.$fieldSelected);
?>
<div class="row row_conversion">
    <input type="hidden" class="id_conversion" value="<?php echo($idConversion)?>" />
        <div class="col-md-3">
            <div class="form-group">
                <select name="sel_category[]" class="form-control sel_category">
                    <?php
                        echo($cnvMng->getConversionCategoryOpts($catSelected));
                    ?>
            </select>
            </div>
        </div>

    <div class="col-md-3">
        <div class="form-group">
            <select name="sel_default_value[]" class="form-control sel_default_value">
                <?php
                    echo($cnvMng->getConversionFieldOpts($catSelected,$fieldSelected));
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <input type="text" name="inp_converted_value[]" class="form-control inp_converted_value" value="<?php echo $conversionVal ?>"/>
        </div>
    </div>
    <div class="col-md-3 ALIGN_CENTER">
        <div class="form-group">
            <div class="btn-group">
                <input type="hidden" class="doc_id" value="13">
                <button type="button" class="btn btn-info save_conversion">
                    <i class="fa fa-save"></i>
                </button>
                <button type="button" class="btn btn-danger delete_conversion">
                    <i class="fa fa-remove"></i>
                </button>
            </div>
        </div>
    </div>
</div>