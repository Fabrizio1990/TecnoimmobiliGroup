<!-- ID AGENTE  -->
<input type ="hidden" name="id_agent" id="id_agent" value="<?php echo $id_agent ?>" />

<!-- NOME AGENTE | COGNOME AGENTE -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Nome</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_name" name="inp_agent_name" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_name ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Cognome</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_lastname" name="inp_agent_lastname" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_lastname ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- EMAIL  | EMAIL PERSONALE-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_email" name="inp_agent_email" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_email ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Email Personale</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_private_email" name="inp_agent_private_email" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_private_email ?>" >
            </div>
        </div><!-- /.form-group -->

    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- TELEFONO  | CELLULARE-->
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label>Telefono</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-home"></i>
            </div>
            <input  id="inp_agent_telephone" name="inp_agent_telephone" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_phone ?>" >
        </div>
    </div><!-- /.form-group -->
</div><!-- /.col-md-6 -->

<div class="col-md-6">
    <div class="form-group">
        <label>Cellulare</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-home"></i>
            </div>
            <input  id="inp_agent_mobile_phone" name="inp_agent_mobile_phone" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_mobile_phone ?>" >
        </div>
    </div><!-- /.form-group -->

</div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- ################# FAX - SKYPE ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Fax</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_fax" name="inp_agent_fax" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_fax ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Skype</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_skype" name="inp_agent_skype" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_skype ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- ################# Indirizzo di residenza -  PARTITA IVA -  ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Indirizzo di residenza</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_address" name="inp_agent_address" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_address ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>P.Iva</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_pIva" name="inp_agent_pIva" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_pIva ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- ################# CODICE FISCALE -  REA ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Codice fiscale</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_CF" name="inp_agent_CF" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_CF ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>R.E.A</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <input  id="inp_agent_REA" name="inp_agent_REA" type="text" class="form-control" placeholder="Nessun dato inserito" value ="<?php echo $agent_REA ?>" >
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->



<!-- ########## STATO (ABILITATO/DISABILITATO) - STATO PUBBLICAZIONE -  ########### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Sato Attivazione</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </div>

                <select id="sel_agent_status" name="sel_agent_status" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona uno stato di attivazione" ">
                <option value="">Seleziona un valore</option>
                <?php echo $optAgentStatus?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6"></div>

</div><!-- /.row -->
