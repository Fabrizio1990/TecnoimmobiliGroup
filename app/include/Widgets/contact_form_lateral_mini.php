<link href="<?php echo(SITE_URL) ?>/css/contact_form_lateral_mini.css" rel="stylesheet">
<?php
$referenceCode = isset($referenceCode)?$referenceCode:"Assente";
$agencyName = isset($agencyName)?$agencyName:"Tecnoimmobili Group Service";
$agencyAddress = isset($agencyAddress)?$agencyAddress:"Corso duca degli abruzzi, 42";
$agentName = isset($agentName,$agentLastname)?($agentName." ".$agentLastname):"Tommaso Restaino";
$agentMobile = isset($agentMobile) ? $agentMobile : "3496251482";
$agentTel = isset($agentTel) ? $agentTel : "0115183879";
$agentTelShort = substr($agentTel,0,4)."...";
$agentMail = isset($agentMail) ? $agentMail : "info@tecnoimmobiligroup.it";
?>
<div class="widget clearfix ALIGN_LEFT LIGHT-GREY-BORDER PADDING-20 BG_COLOR_WITHE" id="generic_contact_form_container">

    <div class="row MARGIN_0">

        <div class="col-md-12 no-lateral-padding">

            <img class="contact_form_logo_tecnoimm" src="<?php echo SITE_URL ?>/images/Logos/Logo_200x32.png" alt="TecnoimmobiliGroup Logo" title="<?php echo $agencyName ?>" />
            <br>
            <br>
            <p>
                <b>Agenzia:</b><br>
                <?php echo $agencyName ?><br>
                <b>Indirizzo:</b><br>
                <?php echo $agencyAddress ?><br>
                <b>Agente:</b><br>
                <?php echo $agentName ?>

            </p>

        </div>


        <div class="col-md-12 no-lateral-padding">
            <h3 class="MARGIN_BOTTOM_5">Chiama ora</h3>
            <p >Riferimento imm : <b id="GCF_ref_code"><?php echo $referenceCode ?></b></p>
        </div>

        <div class="col-md-12 no-lateral-padding clearfix ">
            <button id="btn_show_phone" class="form-control btn btn-tecnoimm-blue" onclick="showPhone()"><i class="fa fa-phone COLOR_RED"> </i> <?php echo $agentTelShort?></button>
        </div>
        <div id="phone_number_container" class="DISPL_NONE col-md-12 FONT_18 FONT_BOLD ALIGN_LEFT PADDING-10 BORDER_ROUND_5 ">
            <i class="fa fa-phone COLOR_RED"> <a href="tel:<?php echo $agentTel?>" class="FONT_16 FONT_BOLD  FONT_LATO" ><?php echo $agentTel?></a></i>
            <br>
            <br>
            <i class="fa fa-phone COLOR_RED"> <a href="tel:<?php echo $agentMobile?>" class="FONT_16 FONT_BOLD  FONT_LATO" ><?php echo $agentMobile?></a></i>
        </div>
    </div>
    <!-- INIZIO FORM -->
    <div class="row MARGIN_0 MARGIN_TOP_20">
        <form name="CONTACT_FORM_LATERAL" id="CONTACT_FORM_LATERAL" novalidate accept-charset="UTF-8">
            <input type="hidden" id="inp_CF_L_recipient" name="inp_CF_L_recipient" value="<?php echo $agentMail ?>" />
            <input type="hidden" name="inp_CF_L_tecnoimmobili_logo" id="inp_CF_L_tecnoimmobili_logo" value="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobilili_logo_ext.png' ?>">
            <input type="hidden" name="inp_CF_L_property_mainImage" id="inp_CF_L_property_mainImage" value="<?php echo $coverImgLink?>">
            <input type="hidden" name="inp_CF_L_property_tipology" id="inp_CF_L_property_tipology" value="<?php echo $tipology?>">
            <input type="hidden" name="inp_CF_L_property_contract" id="inp_CF_L_property_contract" value="<?php echo $contract?>">
            <input type="hidden" name="inp_CF_L_property_town" id="inp_CF_L_property_town" value="<?php echo $town ?>">
            <input type="hidden" name="inp_CF_L_property_price" id="inp_CF_L_property_price" value="<?php echo $price?>">
            <input type="hidden" name="inp_CF_L_property_refCode" id="inp_CF_L_property_refCode" value="<?php echo $referenceCode?>">


            <div class="col-md-12 no-lateral-padding">
                <h3>Invia un messaggio</h3>
            </div>
            <div id="CF_L_err_validation_box" class="alert alert-danger  HIDDEN">
                <a href="#" class="alert-link">Attenzione, compila tutti i campi per inviare la richiesta.</a>
            </div>
            <div id="CF_L_success_box" class="alert alert-success HIDDEN">
                <a href="#" class="alert-link">Mail Inviata</a>
            </div>
            <div class="col-md-12 no-lateral-padding">
                <input name="inp_CF_L_name" id="inp_CF_L_name" type="text" class="form-control" placeholder="Nome">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input name="inp_CF_L_email" id="inp_CF_L_email" type="text" class="form-control" placeholder="Email">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input name="inp_CF_L_phone" id="inp_CF_L_phone" type="text" class="form-control" placeholder="Telefono">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <textarea name="inp_CF_L_message" id="inp_CF_L_message" class="form-control" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <div class="col-md-12 no-lateral-padding user_data_management_agreement">
                <label>
                    <input id="check_CF_L_personal_data" name="check_CF_L_personal_data" type="checkbox">
                    Acconsento al trattamento dei miei dati personali da parte di TecnoimmobiliGroup Service
                </label>
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input id="btn_CF_L_send_mail" name="btn_CF_L_send_mail" type="submit" class="form-control btn-tecnoimm-red" value="Invia Mail" />
            </div>
        </form>
    </div>
</div>