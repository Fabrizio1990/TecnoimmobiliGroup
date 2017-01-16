<!-- ################# STATO - REGIONE ##################### -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Provincia</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_country" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un paese" onchange="getRegions(this,'','Seleziona una regione')">
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
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_region" class="form-control select2" data-placeholder="Seleziona un paese" style="width: 100%;" onchange="getCities(this,'','Seleziona una città')" >
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
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_city" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona una provincia" onchange="getTowns(this,'','Seleziona un comune')">
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
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_town" class="form-control select2" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getDistricts(this,'','Seleziona una zona')">

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->





</div><!-- /.row -->

<!-- ################# ZONA -  ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Zona</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_district" class="form-control select2" data-placeholder="Seleziona una zona" style="width: 100%;" >

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->