<!-- AZIONE | ID_AGENZIA -->
<input type ="hidden" name="action" id="action" value="<?php echo $action ?>" />
<input type ="hidden" name="id_agency" id="id_agency" value="<?php echo $id_agency ?>" />

<!-- LONGITUDINE E LATITUDINE -->
<input type="hidden" name="inp_longitude" id="longitude" />
<input type="hidden" name="inp_latitude" id="latitude" />


<div class="row">
    <div class="col-md-12">
            <img id="img_logo" class="img img-responsive logo_agency IMAGE_DRAG"  src="<?php echo SITE_URL."/public/images/images_agencies_icons/min/".$logo_path ?>"/>
        <input type="file"  name="file_explorer" class="file_explorer" accept="image/jpeg">
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->
<div class="HR"></div>

<!-- BANNER AGENZIA | NOME AGENZIA -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Insegna</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agency_banner" name="inp_agency_banner" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $banner ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Nome</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agency_name" name="inp_agency_name" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $name ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- PARTITA IVA  | CODICE FISCALE-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Partita Iva</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agency_pIva" name="inp_agency_pIva" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $p_iva ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Codice Fiscale</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agency_CF" name="inp_agency_CF" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $CF ?>" >
            </div>
        </div><!-- /.form-group -->

    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- REA  | REGISTRO IMPRESE-->
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label>REA</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-home"></i>
            </div>
            <input  id="inp_agency_REA" name="inp_agency_REA" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $REA ?>" >
        </div>
    </div><!-- /.form-group -->
</div><!-- /.col-md-6 -->

<div class="col-md-6">
    <div class="form-group">
        <label>Registro imprese</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-home"></i>
            </div>
            <input  id="inp_agency_BR" name="inp_agency_BR" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $business_register ?>" >
        </div>
    </div><!-- /.form-group -->

</div><!-- /.col-md-6 -->

</div><!-- /.row -->


<div class="HR" ></div>

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
                    <?php echo $optCities?>
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
                    <option value="">Seleziona un valore</option>
                    <?php echo $optTowns?>
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
                    <option value="">Seleziona un valore</option>
                    <?php echo $optDistricts?>
                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->

    <div class="col-md-4">
        <div class="form-group">
            <label>Indirizzo</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                <input id="inp_address" name="inp_address" type="text" class="form-control" placeholder="Inserisci lindirizzo" value="<?php echo $street ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-4 -->

    <div class="col-md-2">
        <div class="form-group">
            <label>Civico</label>
            <div class="input-group">
                <input  id="inp_street_num" name="inp_street_num" type="text" class="form-control" placeholder="N° civico" value="<?php echo $street_num ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-2 -->

</div><!-- /.row -->

<div class="HR" ></div>

<!-- ########## STATO (ABILITATO/DISABILITATO) - STATO PUBBLICAZIONE -  ########### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Sato Attivazione</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_status" name="sel_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona uno stato di attivazione" ">
                <option value="">Seleziona un valore</option>
                <?php echo $optStatus?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Stato Pubblicazione</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>
                <select id="sel_sub_status" name="sel_sub_status" class="form-control select2" data-placeholder="Seleziona uno stato di pubblicazione" style="width: 100%;">
                    <option value="">Seleziona un valore</option>
                    <?php echo $optSubStatus?>
                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->



<!-- ########## STATO PORTALI  ########### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Sato Portali</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_portal_status" name="sel_portal_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona uno stato di attivazione" ">
                <option value="">Seleziona un valore</option>
                <?php echo $optPortalStatus?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6"></div>
</div><!-- /.row -->

<div class="HR" ></div>


<!-- ####################  DESCRIZIONE   ######################## -->
<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Descrizione Agenzia</label>
            <textarea id="ag_description" name="ag_description" class="form-control" rows="3" placeholder="Inserisci una descrizione"><?php echo $description ?></textarea>
        </div>
    </div>

</div><!-- /.row -->


