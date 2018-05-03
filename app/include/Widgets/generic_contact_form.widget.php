<link href="<?php echo(SITE_URL) ?>/css/generic_contact_form.css" rel="stylesheet">
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
        <form name="FORM_GENERIC_CONTACT" id="FORM_GENERIC_CONTACT" novalidate accept-charset="UTF-8">
            <input type="hidden" id="inp_GCF_toEmail_hidden" value="<?php echo $agentMail ?>" />
            <div class="col-md-12 no-lateral-padding">
                <h3>Invia un messaggio</h3>
            </div>
            <div id="GFC_MAIL_SENT_RESPONSE" class="alert alert-success HIDDEN">
                <a href="#" class="alert-link">Mail Inviata</a>
            </div>
            <div class="col-md-12 no-lateral-padding">
                <input name="inp_GCF_name" id="inp_GCF_name" type="text" class="form-control" placeholder="Nome">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input name="inp_GCF_phone" id="inp_GCF_phone" type="text" class="form-control" placeholder="Telefono">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input name="inp_GCF_email" id="inp_GCF_email" type="text" class="form-control" placeholder="Email">
            </div>

            <div class="col-md-12 no-lateral-padding">
                <textarea name="inp_GCF_message" id="inp_GCF_message" class="form-control" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <div class="col-md-12 no-lateral-padding user_data_management_agreement">
                <label>
                    <input name="check_GCF_personal_data" type="checkbox">
                    Acconsento al trattamento dei miei dati personali da parte di TecnoimmobiliGroup Service

                </label>
            </div>

            <div class="col-md-12 no-lateral-padding">
                <input id="btn_GFC_send_mail" type="submit" class="form-control btn-tecnoimm-red" value="Invia Mail" />
            </div>
        </form>
    </div>
</div>