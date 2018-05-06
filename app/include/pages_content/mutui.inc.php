<link href="<?php echo(SITE_URL) ?>/css/mortage_calculator_widget.css" rel="stylesheet">
<?php
    $mortagePrice = isset($_REQUEST["mortagePrice"])?$_REQUEST["mortagePrice"]:50000;
?>
<div class="widget clearfix ALIGN_LEFT LIGHT-GREY-BORDER PADDING-20 BG_COLOR_WITHE" id="mortage_calculator_widget">


    <div class="row MARGIN_0">
        <h2 class="TXT_ALIGN_CENTER">Calcola il Mutuo</h2>

        <div class="col-md-12 no-lateral-padding col TXT_ALIGN_CENTER">

            <h3>Importo</h3>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-euro"></i></div>
                <input id="inp_mortageWidget_priceAmount" type="text" class="form-control" placeholder="Importo" value="<?php echo $mortagePrice ?>"/>
            </div>
        </div>

        <div class="col-md-12 no-lateral-padding col TXT_ALIGN_CENTER">
            <h3>Durata del mutuo (anni)<h3>
            <div>
                <!--<canvas width="112" height="112" style="width: 90px; height: 90px;"></canvas>-->
                <input id="inp_mortageWidget_years" type="text" class="knob" value="15" data-min="10" data-max="30" data-thickness="0.1" data-width="90" data-height="90" data-fgcolor="#00a65a" style="width: 49px; height: 30px; position: absolute; vertical-align: middle; margin-top: 30px; margin-left: -69px; border: 0px; background: none; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 18px; line-height: normal; font-family: Arial; text-align: center; color: rgb(0, 166, 90); padding: 0px; -webkit-appearance: none;">
            </div>
        </div>


        <div class="col-md-12 no-lateral-padding col TXT_ALIGN_CENTER">
            <h3>Tasso:</h3>
            <div class="form-group">
                <label>
                    <input type="radio" id="inp_mortageWidget_variableRate" name="inp_mortageWidget_rateType" class="minimal inp_mortageWidget_rateType" value="1" checked>variabile
                </label>

                <label>
                    <input type="radio" id="inp_mortageWidget_fixedRate" name="inp_mortageWidget_rateType" class="minimal inp_mortageWidget_rateType" value="2">fisso
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-12 no-lateral-padding col TXT_ALIGN_CENTER">
        <p><span id="txt_mortageWidget_finalRate">0</span> &euro; al mese</p>
    </div>

</div>
