<!-- #################### Nome  - Sito  ######################## -->
<div class="row">

    <div class="col-md-2 col-md-offset-5">

        <div class="box box-primary">
            <div class="box-header ALIGN_CENTER">
                <h3 class="box-title ">Logo Portale</h3>
            </div>
            <div class="box-body  ">
                <img  id="img_portal" name="img_portal" class="img img-responsive image_portal IMAGE_DRAG "  src="<?php echo $imgPortal ?>"/>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="upload_image_container col-md-12 col-sm-12 col-xs-12 ALIGN_CENTER">
                        <input type="hidden" id= "hidden_img_name" class="hidden_img_name" value="" />
                        <button type="button" onclick="selectFile(this);" class="btn btn-primary ">carica</button>
                        <input type="file" id="logo_img" name="logo_img" class="file_explorer" accept="image/jpeg,image/png">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- #################### Nome  - Sito  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Nome Portale</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                <input id="inp_portal_name" name="inp_portal_name" type="text" class="form-control" placeholder="Nome del portale"  value="<?php echo $inpPortalName ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Sito</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                <input id="inp_portal_site" name="inp_portal_site" type="text" class="form-control" placeholder="Sito del Portale"  value="<?php echo $inpPortalSite ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- #################### Numero Annunci  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Limite annunci</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-bar-chart"></i></div>
                <input id="inp_portal_max_properties" name="inp_portal_max_properties" type="number" class="form-control" placeholder="Limite annunci"  value="<?php echo $inpPortalMaxProperties ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6"> </div><!-- /.col-md-6 -->

</div><!-- /.row -->



<div class="HR"></div>



<!-- #################### PERSONAL AREA LINK  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Link Area riservata</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                <input id="inp_portal_personal_area_link" name="inp_portal_personal_area_link" type="text" class="form-control" placeholder="Link area riservata"  value="<?php echo $inpPortalPersonalAreaLink ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6"> </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- #################### User  - Psw  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Username Area riservata</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input id="inp_portal_username" name="inp_portal_username" type="text" class="form-control" placeholder="Username area riservata"  value="<?php echo $inpPortalUsername ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Password Area riservata</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input id="inp_portal_password" name="inp_portal_password" type="text" class="form-control" placeholder="Password area riservata"  value="<?php echo $inpPortalPassword ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<div class="HR"></div>


<!-- #################### HAS CONTRACT  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Contratto</label>
            <div class="input-group">
                <input id="inp_portal_hasContract" name="inp_portal_hasContract" type='checkbox' class='switch' <?php echo($inpPortalHasContract?"checked":"")?> />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6"> </div><!-- /.col-md-6 -->

</div><!-- /.row -->



<!-- #################### CONTRACT_START - CONTRACT_END  ######################## -->
<div class="row CONTRACT_DATA">

    <div class="col-md-6">
        <div class="form-group">
            <label>Inizio contratto</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar-times-o"></i></div>
                <input id="inp_portal_contract_start" name="inp_portal_contract_start" type="date" class="form-control" placeholder="Inizio contratto"  value="<?php if($inpPortalHasContract) echo $inpPortalContractStart ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Fine contratto</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar-times-o"></i></div>
                <input id="inp_portal_contract_end" name="inp_portal_contract_end" type="date" class="form-control" placeholder="Fine contratto"  value="<?php if($inpPortalHasContract)echo $inpPortalContractEnd ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### CONTRACT PRICE  ######################## -->

<div class="row CONTRACT_DATA">

    <div class="col-md-6">
        <div class="form-group">
            <label>Prezzo</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                <input id="inp_portal_contract_price" name="inp_portal_contract_price" type="text" class="form-control" placeholder="Prezzo contratto"  value="<?php echo $inpPortalContractPrice ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6"> </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<div class="HR"></div>



<!-- ####################  NOTE   ######################## -->
<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Note</label>
            <textarea class="form-control txt_portal_notes" rows="3" placeholder="Annotazioni"><?php echo $txtPortalNotes ?></textarea>
        </div>
    </div>

</div><!-- /.row -->