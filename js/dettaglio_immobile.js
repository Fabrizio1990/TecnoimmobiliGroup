var templateMailName ="Richiesta informazioni immobiile";
$(function () {

    //CONTACT FORM VALIDATE
    form = $("#CONTACT_FORM").validate({
        rules: {
            inp_CF_name:{required: true, minlength: 2, maxlength: 100},
            inp_CF_phone:{required: true,phones:true},
            inp_CF_email:{required: true,email:true,maxlength: 200},
            inp_CF_message:{required: true, minlength: 2, maxlength: 1000},
            check_CF_personal_data:{required:true}
        },
        invalidHandler : function(f, v) {
            $("#CF_err_validation_box").show();
            $("#btn_CF_send_mail").prop("disabled", false);
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") == "checkbox") {
                error.insertBefore($(element).parents('label')/*.prev($('.CF_personal_data_section'))*/);
            } else {
                error.insertBefore(element);
            }
        },
        messages: {
            check_CF_personal_data: {
                required:"Accetta il trattamento dei dati"
            }
            /*email: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            }*/
        },
        submitHandler: function (form) {
            $("#CF_err_validation_box").hide();
            $("#CF_success_box").hide();
            $("#btn_CF_send_mail").prop("disabled", true);
            //GENERATE TEMPLATE(BODY) OVERRIDE PARAMS, THIS WILL REPLACE PLACEHOLDERS
            //FORMAT IS :  par=>val|par2=>val2 ecc...

            var templateOverrideParams ="";
            //GET ALL INFO
            var tecnoimmobiliLogo = encodeURIComponent($("#inp_CF_tecnoimmobili_logo").val()),
            propertyLink = document.URL,
            propertyImage = encodeURIComponent($("#inp_CF_property_mainImage").val()),
            tipology = encodeURIComponent($("#inp_CF_property_tipology").val()),
            contract = encodeURIComponent($("#inp_CF_property_contract").val()),
            town = encodeURIComponent($("#inp_CF_property_town").val()),
            price = encodeURIComponent($("#inp_CF_property_price").val()),
            ref_code= encodeURIComponent($("#inp_CF_property_refCode").val()),
            sender_name = encodeURIComponent($("#inp_CF_name").val()),
            sender_email = encodeURIComponent($("#inp_CF_email").val()),
            sender_phone = encodeURIComponent($("#inp_CF_phone").val()),
            message = encodeURIComponent($("#inp_CF_message").val());

            //PUPULATE OVERRIDE PARAMS
            templateOverrideParams += "TECNOIMMOBILI_LOGO=>"+tecnoimmobiliLogo+"|";
            templateOverrideParams += "PROPERTY_LINK=>"+propertyLink+"|";
            templateOverrideParams += "PROPERTY_IMAGE=>"+propertyImage+"|";
            templateOverrideParams += "TIPOLOGY=>"+tipology+"|";
            templateOverrideParams += "CONTRACT=>"+contract+"|";
            templateOverrideParams += "TOWN=>"+town+"|";
            templateOverrideParams += "PRICE=>"+price+"|";
            templateOverrideParams += "REF_CODE=>"+ref_code+"|";
            templateOverrideParams += "SENDER_NAME=>"+sender_name+"|";
            templateOverrideParams += "SENDER_PHONE=>"+sender_phone+"|";
            templateOverrideParams += "SENDER_EMAIL=>"+sender_email+"|";
            templateOverrideParams += "MESSAGE=>"+message;


            //GENERATE MAIL INFO
            //_fromMail,_fromName,_toMail,_cc,_ccn,_object  = "",_body = "",_isHtml = true
            var mailInfo = new mailInfoObj(
                sender_email,
                sender_name,
                $("#contact_email").text(),
                "",
                "info@tencoimmobiligroup.it"
            );
            //SEND MAIL
            SendTemplateMail(
                templateMailName,
                templateOverrideParams,
                mailInfo,
                function(resp,params){
                    if(resp > 0) {
                        $("#btn_CF_send_mail").prop("disabled", false);
                        $("#CF_success_box").show();
                    }else{
                        alert("ERRORE NELL'INVIO DELLA MAIL "+resp);
                    }
                }
            );
        }
    });
    //END CONTACT FORM

    //CAROUSEL
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: false,
        animationLoop: true,
        slideshow: true,
        itemWidth: 122,
        itemMargin: 0,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "fade",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        sync: "#carousel"
    });


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
            //console.log("release : " + value);
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

