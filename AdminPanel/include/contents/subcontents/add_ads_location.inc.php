<!-- ################# STATO - REGIONE ##################### -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Stato</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_country" name="sel_country" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un paese" onchange="getRegions(this,'','Seleziona una regione')">
                    <?php echo $optCountries?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Regione</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_region" name="sel_region" class="form-control select2" data-placeholder="Seleziona un paese" style="width: 100%;" onchange="getCities(this,'','Seleziona una città')" >
                    <option value="">Seleziona un valore</option>
                    <?php echo $optRegions?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->

<!-- ################# CITTA - COMUNE -  ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Provincia</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_city" name="sel_city" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona una provincia" onchange="getTowns(this,'','Seleziona un comune')">
                    <option value="">Seleziona un valore</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Comune</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <select id="sel_town" name="sel_town" class="form-control select2" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getDistricts(this,'','Seleziona una zona')">

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->





</div><!-- /.row -->

<!-- ################# ZONA -  INDIRIZZO ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Zona</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <select id="sel_district" name="sel_district" class="form-control select2" data-placeholder="Seleziona una zona" style="width: 100%;" >

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->

    <div class="col-md-4">
        <div class="form-group">
            <label>Indirizzo</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                <input id="inp_address" name="inp_address" type="text" class="form-control" placeholder="Inserisci lindirizzo">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-4 -->

    <div class="col-md-2">
        <div class="form-group">
            <label>Civico</label>
            <div class="input-group">
                <input  id="inp_street_num" name="inp_street_num" type="text" class="form-control" placeholder="N° civico">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-2 -->

</div><!-- /.row -->


<!-- ############## MOSTRA INDIRIZZO - LATITUDINE - LONGITUDINE ################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Mostra indirizzo</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <select id="sel_show_street_num" name="sel_show_street_num" class="form-control select2" data-placeholder="Seleziona un valore" style="width: 100%;" >
                    <option value="">Seleziona un valore</option>
                    <option value="1" >SI</option>
                    <option value="0"> No</option>
                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->

    <div class="col-md-3">
        <div class="form-group">
            <label>Latitudine</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-o"></i>
                </div>
                <input  id="inp_latitude" name="inp_latitude" type="text" class="form-control" placeholder="Latitudine" disabled>
            </div>
        </div><!-- /.form-group -->

    </div><!-- /.col-md-3 -->

    <div class="col-md-3">
        <div class="form-group">
            <label>Longitudine</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-o"></i>
                </div>
                <input  id="inp_longitude" name="inp_longitude" type="text" class="form-control" placeholder="Longitudine" disabled>
            </div>
        </div><!-- /.form-group -->

    </div><!-- /.col-md-3 -->

</div><!-- /.row -->


<!-- MAP -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info ">
            <div class="box-header ui-sortable-handle">
                <h3 class="box-title">Mappa</h3>
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
                <div id="map"></div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.row -->
