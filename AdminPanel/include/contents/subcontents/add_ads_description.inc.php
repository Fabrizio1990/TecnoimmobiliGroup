<!-- #################### CATEGORIA - TIPOLOGIA ######################## -->
<div class="row">

    <div class="col-md-6">
        <!-- DATE RANGE -->
        <div class="form-group">
            <label>Categoria</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_category" name="sel_category" class="form-control select2" style="width: 100%;" onchange="getTipologies(this,'','Seleziona una tipologia')" data-placeholder="Seleziona una categoria" >
                    <option value="" >Seleziona una categoria</option>
                    <?php echo($optCategory); ?>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Tipologia</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_tipology" name="sel_tipology" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona una tipologia">
                    <option value="">Seleziona una tipologia</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->

<!-- #################### SUPERFICIE - LOCALI ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Superficie</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                <input id="inp_surface" name="inp_surface" type="number" class="form-control" placeholder="Inserisci la superficie">
                <span class="input-group-addon">m<sup>2</sup></span>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Locali</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_locals" name="sel_locals" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero dei locali">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optLocals); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- #################### CAMERE - PIANO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Camere</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_rooms" name="sel_rooms" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero delle camere">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optRooms); ?>
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Piano</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_floors" name="sel_floors" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il piano">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optFloors); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- #################### ASCENSORE - CONDIZIONI ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Ascensore</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_elevators" name="sel_elevators" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optElevators); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Condizioni</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_conditions" name="sel_conditions" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona le condizioni">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optConditions); ?>
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### STATO ATTUALE - RISCALDAMENTO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Stato attuale</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_property_status" name="sel_property_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona lo stato attuale">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optPropertyStatus); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Riscaldamento</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_heatings" name="sel_heatings" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di riscaldamento">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optHeatings); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### BAGNI - BOX ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Bagni</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_bathrooms" name="sel_bathrooms" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero dei bagni">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optBathrooms); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Box</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_box" name="sel_box" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di box">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optBox); ?>
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### GIARDINO - CONTRATTO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Giardino</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_gardens" name="sel_gardens" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di giardino">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optGardens); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Contratto</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_contracts" name="sel_contracts" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di contratto">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optContracts); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### PREZZO - CLASSE ENERGETICA  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Prezzo</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa  fa-eur"></i></div>
                <input id="inp_price" name="inp_price" type="number" class="form-control" placeholder="Inserisci il prezzo" >

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Classe energetica</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_energy_class" name="sel_energy_class" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona la classe energetica">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optEnergyClass); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- ####################  IPE UM - IPE   ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Unità di misura IPE</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_ipe_um" name="sel_ipe_um" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php echo($optIpeUm); ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->



    <div class="col-md-6">
        <div class="form-group">
            <label>Valore IPE</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                <input id="inp_ipe" name="inp_ipe" type="number" class="form-control" placeholder="Inserisci l' IPE" value ="175">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- ####################  DESCRIZIONE   ######################## -->
<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Descrizione Immobile</label>
            <textarea id="txt_description" name="txt_description" class="form-control" rows="3" placeholder="Inserisci una descrizione"></textarea>
        </div>
    </div>

</div><!-- /.row -->