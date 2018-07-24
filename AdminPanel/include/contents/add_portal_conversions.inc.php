<div class="box box-primary CONVERSION_BOX">
    <div class="box-header">
        <h3 class="box-title">CONVERSIONI</h3>
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Riduci / Ingrandisci">
                <i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body CONVERSION_DATA">

        <!-- #### BUTTON ADD CONVERSION ### -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control btn btn-tecnoimm-red btn_add_conversion">Aggiungi conversione</button>
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control btn btn-tecnoimm-blue btn_save_conversions">Salva</button>
                </div>
            </div>
        </div>


        <table id="DT_CONVERSIONS" class="table table-bordered table-hover display responsive no-wrap" width="100%">
            <thead>
            <tr>
                <th>Tabella</th>
                <th>Valore originale</th>
                <th>Valore convertito</th>
                <th>Azioni</th>
            </tr>
            </thead>
            <tbody>
            <!-- il corpo della tabella viene scritto dalla funzione javascript al fondo della pagina -->
            </tbody>
            <tfoot>
            <tr>
                <th>Tabella</th>
                <th>Valore originale</th>
                <th>Valore convertito</th>
                <th>Azioni</th>
            </tr>
            </tfoot>
        </table>

        <form id="form_conversions" name="form_conversions" action="POST">
            <input type="hidden" name="id_portal" id="id_portal" value="<?php echo $id_portal?>" />

            <?php
            /*if(count($conversions) > 0){
                $prevCatId = 0;
                foreach ($conversions as $conversion){

                    $idConversion = $conversion["id"];
                    $catSelected = $conversion["category_id"];
                    $fieldSelected = $conversion["original"];
                    $conversionVal = $conversion["converted"];
                    if($prevCatId > 0 && $catSelected != $prevCatId){
                        echo("<div class='HR'></div>");
                    }
                    include (BASE_PATH."/AdminPanel/include/contents/subcontents/add_portal_conversion_row.inc.php");
                    $prevCatId = $catSelected;
                }
                echo("<div class='HR'></div>");
            }*/

            ?>


        </form>


        <!-- #### BUTTON ADD CONVERSION ### -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <button class="form-control btn btn-tecnoimm-red btn_add_conversion">Aggiungi conversione</button>
                </div>
            </div>
            <div class="col-md-9"></div>
        </div>
    </div>
</div>