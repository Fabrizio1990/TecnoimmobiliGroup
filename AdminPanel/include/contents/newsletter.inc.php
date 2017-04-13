<!-- DETTAGLIO RICHIESTE -->
<div   class="row">
    <div  class="col-xs-12">
        <div id="box_request_details" class="box box-info collapsed-box">
            <div class="box-header">
                <h3 class="box-title">Dettaglio Richiesta</h3>
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
                        <i id="BTN_BOX_COLLAPSE" class="fa fa-plus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="request_details">
                <!-- QUI VERRà POPOLATO IL DETTAGLIO DELLA RICHIESTA -->
                <h2>Seleziona una richiesta per vederne il dettaglio</h2>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>



<!-- LISTA RICHIESTE -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista Richieste</h3>
                <!-- pulsanti riduci e chiudi -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-secondary btn-sm pull-right" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php include(BASE_PATH."/AdminPanel/include/widgets/newsletter_list_widget.inc.php"); ?>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.row -->


