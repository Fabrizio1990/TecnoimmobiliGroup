<!-- LISTA AGENZIE -->
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
