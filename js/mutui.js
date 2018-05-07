var mortageCalculator = null;

$(function () {

    /*MORTAGE CALCULATOR INIT*/
    mortageCalculator = new MortageCalculator();
    setTimeout(function(){calculateMortage();},1000);

    //BIND PRICE TO UPDATE FINAL VALUE ONCHANGE
    $("#inp_mortageWidget_priceAmount").on("keyup",function () {
        calculateMortage();
    });

    //TODO DA CONTROLLARE PERCHé VIENE RICHIAMATO DUE VOLTE , 1a per input
    //BIND RATETYPE TO UPDATE FINAL VALUE ONCHANGE
    $("input[type='radio'][name='inp_mortageWidget_rateType']").on("change",(function(){
        calculateMortage();
    }));


    // INIT CIRCLE SELECTOR
    /* jQueryKnob */

    $(".knob").knob({
        change : function (value) {
            calculateMortage();
        },
        release : function (value) {
         calculateMortage()
         console.log("release : " + value);
         },
        /*cancel : function () {
         console.log("cancel : " + this.value);
         },*/
        draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor
                    && (sa = ea - 0.3)
                    && (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });

});




function calculateMortage() {
    var price = $("#inp_mortageWidget_priceAmount").val();
    var years = $("#inp_mortageWidget_years").val();
    var taxType = $("input[type='radio'][name='inp_mortageWidget_rateType']:checked").val();

    if(mortageCalculator == null){
        mortageCalculator = new MortageCalculator();
    }

    $("#txt_mortageWidget_finalRate").text(Math.ceil(mortageCalculator.calculate(price,years,taxType)));
}

