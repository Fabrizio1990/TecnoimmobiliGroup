﻿<!-- #################### STATO ANNUNCIO - TRATTATIVA RISERVATA ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Stato annuncio</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_stato_annuncio" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona lo stato dell' annuncio">
                    <option value="">Seleziona un valore</option>
                    <?php echo $optAdsyStatus?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Stato Trattativa</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_property_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php echo $optContractStatus ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->



</div><!-- /.row -->


<!-- #################### IN TRATTATIVA - PREZZO RIBASSATO   ######################## -->
<div class="row">

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Stato proprietà</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_property_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php echo $optPropertyStatus?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Trattativa riservata</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_trattativa" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <option value="0">No</option>
                    <option value="1">SI</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- #################### AFFITTATO - VENDUTO ######################## -->
<div class="row">


    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Prezzo ribassato</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_prezzo_ribassato" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <option value="0">No</option>
                    <option value="1">SI</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Venduto</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_venduto" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <option value="0">No</option>
                    <option value="1">SI</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### PRESTIGE ######################## -->
<div class="row">

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>PRESTIGE</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_prestige" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <option value="0">No</option>
                    <option value="1">SI</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->