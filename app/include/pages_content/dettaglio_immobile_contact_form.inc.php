<div id="property_contact_form" class="property_contact_form boxes clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="big_title">Hai delle domande?
            <small>Non preoccuparti! Siamo qui per aiutarti.</small>
        </h3>

        <div id="CF_err_validation_box" class="alert alert-danger  HIDDEN">
            <a href="#" class="alert-link">Attenzione, compila tutti i campi per inviare la richiesta.</a>
        </div>
        <div id="CF_success_box" class="alert alert-success  HIDDEN">
            <a href="#" class="alert-link">Richiesta inviata con successo</a>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
        <div class="ImageWrapper boxes_img">
            <img src="<?php echo(SITE_URL) ?>/images/01_about.jpg" class="img-responsive" alt="">
            <div class="ImageOverlayH"></div>
            <div class="Buttons StyleSc">
                <span class="WhiteSquare"><a href="#"><i class="fa fa-facebook"></i></a></span>
                <span class="WhiteSquare"><a href="#"><i class="fa fa-twitter"></i></a></span>
                <span class="WhiteSquare"><a href="#"><i class="fa fa-google-plus"></i></a></span>
            </div>
        </div>
        <div class="servicetitle"><h3>Contatti</h3></div>
        <ul>
            <li><i class="fa fa-envelope"></i> <span id="contact_email"> <?php echo $agentMail ?> </span></li>
            <li><i class="fa fa-phone-square" ></i> <span id="contact_phone"><?php echo $agentTel ?></span></li>
            <li><i class="fa fa-phone-square"></i> <span id="contact_mobile_phone"><?php echo $agentMobile ?></span></li>
        </ul>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <form id="CONTACT_FORM" class="row" action="" name="CONTACT_FORM" method="post" novalidate>
            <input type="hidden" name="inp_CF_tecnoimmobili_logo" id="inp_CF_tecnoimmobili_logo" value="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobilili_logo_ext.png' ?>">
            <input type="hidden" name="inp_CF_property_mainImage" id="inp_CF_property_mainImage" value="<?php echo $coverImgLink?>">
            <input type="hidden" name="inp_CF_property_tipology" id="inp_CF_property_tipology" value="<?php echo $tipology?>">
            <input type="hidden" name="inp_CF_property_contract" id="inp_CF_property_contract" value="<?php echo $contract?>">
            <input type="hidden" name="inp_CF_property_town" id="inp_CF_property_town" value="<?php echo $town ?>">
            <input type="hidden" name="inp_CF_property_price" id="inp_CF_property_price" value="<?php echo $price?>">
            <input type="hidden" name="inp_CF_property_refCode" id="inp_CF_property_refCode" value="<?php echo $referenceCode?>">

            <input type="text" name="inp_CF_name" id="inp_CF_name" class="form-control" placeholder="Nome">
            <input type="text" name="inp_CF_email" id="inp_CF_email" class="form-control" placeholder="Email">
            <input type="text" name="inp_CF_phone" id="inp_CF_phone" class="form-control" placeholder="Telefono">

            <input type="hidden" name="frm_contact_property_link" id="frm_contact_property_link" value="<?php echo Utils::getCurrentUrl();?>">
            <textarea class="form-control" name="inp_CF_message" id="inp_CF_message" rows="6" placeholder="Testo ...."></textarea>

<label>
                <input name="check_CF_personal_data" id="check_CF_personal_data" type="checkbox">
                Acconsento al trattamento dei miei dati personali da parte di TecnoimmobiliGroup Service
</label>

            <input type="submit" id="btn_CF_send_mail" class="btn btn-tecnoimm-red"  value="Invia messaggio">

        </form>
    </div>

</div>

