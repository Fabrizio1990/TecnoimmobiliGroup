//THE MAIL ID (NOT REAL ID ON DB BUT NAMEID)
var templateMailName ="Richiesta informazioni generica"

$(document).ready(function () {
    form = $("#CONTACT_FORM").validate({
        rules: {
            inp_CF_name:{required: true, minlength: 2, maxlength: 100},
            inp_CF_phone:{phones:true},
            inp_CF_email:{email:true,maxlength: 200},
            inp_CF_message:{required: true, minlength: 2, maxlength: 1000},
            check_CF_personal_data:{required:true}
        },
        submitHandler: function (form) {
            //GENERATE TEMPLATE(BODY) OVERRIDE PARAMS, THIS WILL REPLACE PLACEHOLDERS
            //FORMAT IS :  par=>val|par2=>val2 ecc...
            var templateOverrideParams = "messaggio=>"+encodeURIComponent($("#inp_CF_message").val());

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