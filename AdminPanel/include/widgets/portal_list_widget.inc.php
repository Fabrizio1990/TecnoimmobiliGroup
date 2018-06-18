<div class="row">
    <div class="col-xs-12">
        <div class="box box-info ">
            <div class="box-header ui-sortable-handle">
                <h3 class="box-title">Lista Portali</h3>
                <!-- pulsanti riduci e chiudi -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-secondary btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Chiudi">
                        <i class="fa fa-times"></i>
                    </button>

                    <button type="button" class="btn btn-secondary btn-sm"  data-toggle="tooltip" id="btn_add_feed" title="Aggiungi portale" style="margin-right: 5px;">
                        <i class="fa fa-plus-square"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm"  data-toggle="tooltip" id="btn_feed_generation" title="Genera tutti i feed" style="margin-right: 5px;">
                        <i class="fa fa-refresh"></i>
                    </button>

                    <button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
                        <i class="fa fa-minus"></i>
                    </button>



                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="DT_PORTALS" class="table table-bordered table-hover display responsive no-wrap" width="100%">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Portale</th>
                        <th>Azioni</th>
                        <th>Limite Annunci</th>
                        <th>annunci attivi</th>
                        <th>Online</th>
                        <th>Data Inserimento</th>

                    </tr>
                    </thead>
                    <tbody>
                    <!-- il corpo della tabella viene scritto dalla funzione javascript al fondo della pagina -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Logo</th>
                        <th>Portale</th>
                        <th>Azioni</th>
                        <th>Limite Annunci</th>
                        <th>annunci attivi</th>
                        <th>Online</th>
                        <th>Data Inserimento</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

