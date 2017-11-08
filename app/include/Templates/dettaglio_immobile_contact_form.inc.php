<div class="property_contact_form boxes clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="big_title">Hai delle domande?
            <small>Non preoccuparti! Siamo qui per aiutarti.</small>
        </h3>
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
        <form id="contact" class="row" action="http://designingmedia.com/html/estate-plus/contact.php" name="contactform" method="post">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
            <input type="text" name="object" id="object" class="form-control" placeholder="Oggetto">
            <input type="hidden" name="contact_property_ref" id="contact_property_ref" value="<?php echo $reference_code ?>">
            <input type="hidden" name="contact_property_link" id="contact_property_link" value="<?php echo Utils::getCurrentUrl();?>">
            <textarea class="form-control" name="body" id="body" rows="6" placeholder="Testo ....">Richiedo maggiori informazioni sull'immobile con:&#13;&#10;riferimento = <?php echo $reference_code?>&#13;&#10;link = <?php echo Utils::getCurrentUrl();?></textarea>
            <button type="button" id="c_f_send_message" class="btn btn-tecnoimm-red" >Invia messaggio</button>
        </form>
    </div>

</div>

