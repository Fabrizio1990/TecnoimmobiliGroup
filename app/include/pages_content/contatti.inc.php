<link href="<?php echo(SITE_URL) ?>/css/contact_form.css" rel="stylesheet">
<?php
require_once(BASE_PATH . "/app/classes/ImageHelper/ImagesInfo.php");
$imgInfo = isset($imgInfo)?$imgInfo:new ImagesInfo();
$logoPath = isset($logoPath)?$logoPath:$imgInfo->info["agencies_logo"]["normal"]["path"];

$logoUrl = isset($logoUrl)?$logoUrl:SITE_URL."/".$logoPath."/"."deflogo_round.png";
$referenceCode = isset($referenceCode)?$referenceCode:"Assente";
$agencyName = isset($agencyName)?$agencyName:"Tecnoimmobili Group Service";
$agencyAddress = isset($agencyAddress)?$agencyAddress:"Corso duca degli abruzzi, 42";
$agentName = isset($agentName,$agentLastname)?($agentName." ".$agentLastname):"Tommaso Restaino";
$agencyMobile = isset($agentMobile) ? $agentMobile : "3496251482";
$agencyTel = isset($agencyTel) ? $agencyTel : "0115183879";
$agencyFax = isset($agentFax) ? $agentFax : "01131774125";
$agencyMail = isset($agentMail) ? $agentMail : "info@tecnoimmobiligroup.it";
$agencySkype =  isset($agencySkype) ? $agencySkype : "";
$agencyDescriptionDef = "Tecnoimmobili Group Service® è una realtà capace di sorprendere i propri Clienti che affidano ad essa l'incarico di vendere o comprare casa.";
$agencyDescription = isset($agencyDescription)?$agencyDescription:$agencyDescriptionDef;

$mailObj = isset($mailObj)?$mailObj:"Richiesta Generica di contatto da pagina dettaglio agenzia";

?>

    <div class="agent_boxes boxes clearfix CONTACT_FORM">
        <div class="agent_details clearfix">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="agents_widget">
                        <h3 class="big_title"><?php echo $agencyName ?>
                            <?php if(isset($agencyProperties)) { ?>
                                <small>Propietà trattate attualmente : <?php echo ("<b>".count($agencyProperties)."</b>")?>; </b></small>
                        <?php }else{
                                echo "<small>Contatti</small>";
                            }?>

                        </h3>
                    <div class="agencies_widget row">
                        <div class="col-lg-5 clearfix">
                            <img class="img-thumbnail img-responsive" src="<?php echo $logoUrl ?>" alt="<?php echo $agencyName?> Logo">
                        </div><!-- end col-lg-5 -->
                        <div class="col-lg-7 clearfix">
                            <div class="agencies_meta clearfix">
                                <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $agencyMail?>" title="Email Agenzia"><?php echo $agencyMail?></a></span>
                                <span><i class="fa fa-phone-square"></i> <a href="tel:<?php echo $agencyTel?>" title="Telefono fisso agenzia"><?php echo $agencyTel?></a> </span>
                                <span><i class="fa fa-phone-square"></i> <a href="tel:<?php echo $agencyMobile?>" title="Cellulare agenzia"><?php echo $agencyMobile?></a> </span>
                                <span><i class="fa fa-phone-square green_number"></i> <a href="tel:800974237" title="Numero verde TecnoimmobiliGroup Service"> 800 97 42 37</a> </span>
                                <?php
                                if($agencyFax != ""){?>
                                    <span><i class="fa fa-print"></i><a href="tel:<?php echo $agencyFax?>" title="Fax agenzia"> <?php echo $agencyFax?></a></span>
                                <?php }?>
                                <?php
                                if($agencySkype != ""){?>
                                    <span><i class="fa fa-skype"></i> <a href="skype:<?php echo $agencySkype?>"  title="Skype Agenzia"><?php echo $agencySkype?></a></span>
                                <?php }?>
                                <span><i class="fa fa-facebook-square"></i> <a href="https://www.facebook.com/tecnoimmobiligroup" target="_blank">Pagina Facebook</a></span>
                                <span><i class="fa fa-twitter-square"></i> <a href="https://twitter.com/tecnoimmobili" target="_blank">Pagina Twitter</a></span>
                                <span><i class="fa fa-linkedin-square"></i> <a href="https://www.linkedin.com/in/tecnoimmobiligroup/detail/recent-activity/" target="_blank">Pagina Linkedin</a></span>
                            </div><!-- end agencies_meta -->

                        </div><!-- end col-lg-7 -->

                        <div class="clearfix"></div>

                        <hr>

                        <div class="col-lg-12">
                            <p class="JUSTIFIED"><?php echo $agencyDescription ?></p>
                        </div>
                    </div><!-- end agencies_widget -->
                </div><!-- agents_widget -->
            </div><!-- end col-lg-7 -->

            <div class="col-lg-5 col-md-5 col-sm-12">
                <h3 class="big_title">Cottatta L'agenzia<small>Hai domande? contattaci !</small></h3>
                <div id="CF_err_validation_box" class="alert alert-danger  HIDDEN">
                    <a href="#" class="alert-link">Attenzione, compila tutti i campi per inviare la richiesta.</a>
                </div>
                <div id="CF_success_box" class="alert alert-success  HIDDEN">
                    <a href="#" class="alert-link">Richiesta inviata con successo</a>
                </div>
                <form name="CONTACT_FORM" id="CONTACT_FORM" novalidate accept-charset="UTF-8">
                    <input type="hidden" name="inp_CF_tecnoimmobili_logo" id="inp_CF_tecnoimmobili_logo" value="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobilili_logo_ext.png' ?>">
                    <input type="hidden" id="inp_CF_toEmail_hidden" value="<?php echo $agencyMail ?>" />
                    <div class="col-md-12 no-lateral-padding">
                        <h3>Invia un messaggio</h3>
                    </div>
                    <div id="CF_success_box" class="alert alert-success HIDDEN">
                        <a href="#" class="alert-link">Mail Inviata</a>
                    </div>
                    <div class="col-md-12 no-lateral-padding">
                        <input name="inp_CF_name" id="inp_CF_name" type="text" class="form-control" placeholder="Nome">
                    </div>

                    <div class="col-md-12 no-lateral-padding">
                        <input name="inp_CF_email" id="inp_CF_email" type="text" class="form-control" placeholder="Email">
                    </div>

                    <div class="col-md-12 no-lateral-padding">
                        <input name="inp_CF_phone" id="inp_CF_phone" type="text" class="form-control" placeholder="Telefono">
                    </div>

                    <div class="col-md-12 no-lateral-padding">
                        <textarea name="inp_CF_message" id="inp_CF_message" class="form-control" placeholder="Scrivi qui il tuo messaggio"></textarea>
                    </div>
                    <div class="col-md-12 no-lateral-padding user_data_management_agreement">
                        <label>
                            <input name="check_CF_personal_data" type="checkbox">
                            Acconsento al trattamento dei miei dati personali da parte di TecnoimmobiliGroup Service

                        </label>
                    </div>

                    <div class="col-md-12 no-lateral-padding">
                        <input id="btn_CF_send_mail" type="submit" class="form-control btn-tecnoimm-red" value="Invia Mail" />
                    </div>
                </form>

            </div><!-- end col-lg-6 -->
        </div><!-- end agent_details -->
    </div><!-- end agent_boxes -->