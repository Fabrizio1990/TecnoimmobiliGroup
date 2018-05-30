<div class="modal fade" id="property_contact_form" tabindex="-1" role="dialog" aria-labelledby="ContactFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="big_title">Hai delle domande?
                    <small>Non preoccuparti! Siamo qui per aiutarti.</small>
                </h3>
                <div id="CF_M_err_validation_box" class="alert alert-danger  HIDDEN">
                    <a href="#" class="alert-link">Attenzione, compila tutti i campi per inviare la richiesta.</a>
                </div>
                <div id="CF_M_success_box" class="alert alert-success  HIDDEN">
                    <a href="#" class="alert-link">Richiesta inviata con successo</a>
                </div>
            </div>
            <div class="modal-body clearfix">

                <div class="text-left">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
                            <li><i class="fa fa-envelope"></i> <span id="contact_email"> </span></li>
                            <li><i class="fa fa-phone-square" ></i> <span id="contact_phone"></span></li>
                            <li><i class="fa fa-phone-square"></i> <span id="contact_mobile_phone"></span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form id="CONTACT_FORM_MODAL" class="row" action="" name="contactform" method="post">
                            <!-- HIDDEN INFO -->

                            <input type='hidden' name='inp_CF_M_ag_email_info' id="inp_CF_M_ag_email_info" value='' />
                            <input type="hidden" name="inp_CF_M_tecnoimmobili_logo" id="inp_CF_M_tecnoimmobili_logo" value="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobilili_logo_ext.png' ?>">
                            <input type="hidden" name="inp_CF_M_property_mainImage" id="inp_CF_M_property_mainImage" value="">
                            <input type="hidden" name="inp_CF_M_property_tipology" id="inp_CF_M_property_tipology" value="">
                            <input type="hidden" name="inp_CF_M_property_contract" id="inp_CF_M_property_contract"  value="">
                            <input type="hidden" name="inp_CF_M_property_town" id="inp_CF_M_property_town"  value="">
                            <input type="hidden" name="inp_CF_M_property_price" id="inp_CF_M_property_price"  value="">
                            <input type="hidden" name="inp_CF_M_property_refCode" id="inp_CF_M_property_refCode"  value="">

                            <!-- END HIDDEN INFO -->


                            <input type="text" name="inp_CF_M_name" id="inp_CF_M_name" class="form-control" placeholder="Nome">
                            <input type="text" name="inp_CF_M_email" id="inp_CF_M_email" class="form-control" placeholder="Email">
                            <input type="text" name="inp_CF_M_phone" id="inp_CF_M_phone" class="form-control" placeholder="Telefono">
                            <textarea class="form-control" name="inp_CF_M_message" id="inp_CF_M_message" rows="6" placeholder="Testo ...."></textarea>
                            <label>
                                <input name="check_CF_M_personal_data" type="checkbox">
                                Acconsento al trattamento dei miei dati personali da parte di TecnoimmobiliGroup Service

                            </label>
                            <button type="submit" id="btn_CF_M_sendMessage" class="btn btn-tecnoimm-red" >Invia messaggio</button>
                            <button type="button" id="btn_CF_M_close" class="btn btn-tecnoimm-red HIDDEN" >Chiudi</button>

                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->