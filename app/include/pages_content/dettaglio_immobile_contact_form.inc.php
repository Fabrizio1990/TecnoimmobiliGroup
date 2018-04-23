<div id="property_contact_form" class="property_contact_form boxes clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="big_title">Hai delle domande?
            <small>Non preoccuparti! Siamo qui per aiutarti.</small>
        </h3>

        <div class="alert alert-danger contact_form_missing_fields HIDDEN">
            <a href="#" class="alert-link">Attenzione, compila tutti i campi per inviare la richiesta.</a>
        </div>
        <div class="alert alert-success contact_form_sent HIDDEN">
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
        <form id="contact" class="row" action="" name="contactform" method="post">
            <input type="text" name="frm_contact_name" id="frm_contact_name" class="form-control" placeholder="Nome">
            <input type="text" name="frm_contact_email" id="frm_contact_email" class="form-control" placeholder="Email">
            <input type="text" name="frm_contact_phone" id="frm_contact_phone" class="form-control" placeholder="Telefono">
            <input type="text" name="frm_contact_object" id="frm_contact_object" class="form-control" placeholder="Oggetto">
            <input type="hidden" name="frm_contact_ref_code" id="frm_contact_ref_code" value="<?php echo $reference_code ?>">
            <input type="hidden" name="frm_contact_property_link" id="frm_contact_property_link" value="<?php echo Utils::getCurrentUrl();?>">
            <textarea class="form-control" name="frm_contact_body" id="frm_contact_body" rows="6" placeholder="Testo ....">Richiedo maggiori informazioni sull'immobile con:&#13;&#10;riferimento = <?php echo $reference_code?>&#13;&#10;link = <?php echo Utils::getCurrentUrl();?></textarea>

            <button type="button" id="c_f_send_message" class="btn btn-tecnoimm-red" >Invia messaggio</button>

        </form>
    </div>

</div>

