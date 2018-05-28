//THE MAIL ID (NOT REAL ID ON DB BUT NAMEID)
var templateMailName ="Richiesta informazioni generica";

$(document).ready(function () {
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
            check_CF_L_personal_data: {
                required:"Accetta il trattamento dei dati"
            }
        },
        submitHandler: function (form) {
            $("#btn_CF_send_mail").prop("disabled", true);
            $("#CF_err_validation_box").hide();
            $("#CF_success_box").hide();
            //GENERATE TEMPLATE(BODY) OVERRIDE PARAMS, THIS WILL REPLACE PLACEHOLDERS
            //FORMAT IS :  par=>val|par2=>val2 ecc...
            var templateOverrideParams ="";

            var tecnoimmobiliLogo = encodeURIComponent($("#inp_CF_tecnoimmobili_logo").val()),
                sender_name = encodeURIComponent($("#inp_CF_name").val()),
                sender_email = encodeURIComponent($("#inp_CF_email").val()),
                sender_phone = encodeURIComponent($("#inp_CF_phone").val()),
                message = encodeURIComponent($("#inp_CF_message").val());


            templateOverrideParams += "TECNOIMMOBILI_LOGO=>"+ tecnoimmobiliLogo +"|";
            templateOverrideParams += "SENDER_NAME=>"+sender_name+"|";
            templateOverrideParams += "SENDER_PHONE=>"+sender_phone+"|";
            templateOverrideParams += "SENDER_EMAIL=>"+sender_email+"|";
            templateOverrideParams += "MESSAGE=>"+message;

            //GENERATE MAIL INFO
            var mailInfo = new mailInfoObj(
                $("#inp_CF_email").val(),
                $("#inp_CF_name").val(),
                $("#inp_CF_toEmail_hidden").val(),
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

});