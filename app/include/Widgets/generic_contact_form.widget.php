<?php
$referenceCode = isset($referenceCode)?$referenceCode:"Assente";
$agentMobile = isset($agentMobile) ? $agentMobile : "3496251482";
$agentTel = isset($agentTel) ? $agentTel : "0115183879";
$agentTelShort = substr($agentTel,0,4)."...";
$agentMail = isset($agentMail) ? $agentMail : "info@tecnoimmobiligroup.it";
?>
<div class="widget clearfix ALIGN_LEFT LIGHT-GREY-BORDER PADDING-20 BG_COLOR_WITHE">

    <div class="row MARGIN_0">
        <div class="col-md-12 no-lateral-padding">
            <h3 class="MARGIN_BOTTOM_5">Chiama ora</h3>
            <p >Riferimento imm : <b><?php echo $referenceCode ?></b></p>

        </div>
        <div class="col-md-6 no-lateral-padding clearfix ">
            <button id="btn_show_phone" class="form-control btn btn-tecnoimm-blue" onclick="showPhone()"><i class="fa fa-phone"> </i> <?php echo $agentTelShort?></button>
        </div>
        <div id="phone_number" class="DISPL_NONE col-md-12 BG_COLOR_GREY FONT_18 FONT_BOLD ALIGN_LEFT PADDING-10 BORDER_ROUND_5 ">
            <i class="fa fa-phone"> <a href="tel:<?php echo $agentTel?>" class="FONT_18 FONT_BOLD COLOR_BLACK FONT_LATO" ><?php echo $agentTel?></a></i>
            <br>
            <br>
            <i class="fa fa-phone"> <a href="tel:<?php echo $agentMobile?>" class="FONT_18 FONT_BOLD COLOR_BLACK FONT_LATO" ><?php echo $agentMobile?></a></i>
        </div>
    </div>

    <div class="row MARGIN_0 MARGIN_TOP_20">
        <div class="col-md-12 no-lateral-padding">
            <h3>Invia un messaggio</h3>
        </div>
        <div class="col-md-12 no-lateral-padding">
            <input type="text" class="form-control" placeholder="Nome">
        </div>

        <div class="col-md-12 no-lateral-padding">
            <input type="text" class="form-control" placeholder="Telefono">
        </div>

        <div class="col-md-12 no-lateral-padding">
            <input type="text" class="form-control" placeholder="Email">
        </div>

        <div class="col-md-12 no-lateral-padding">
            <textarea class="form-control" placeholder="Scrivi qui il tuo messaggio"></textarea>
        </div>

        <div class="col-md-12 no-lateral-padding">
            <button class="form-control btn-tecnoimm-red"> Invia Mail</button>
        </div>
    </div>
</div>