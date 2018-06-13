/**
 * Created by fabri on 28/05/2018.
 */
var templateMailName ="Richiesta informazioni immobiile";
$(function () {

    //CONTACT FORM VALIDATE
    form = $("#CONTACT_FORM_LATERAL").validate({
        rules: {
            inp_CF_L_name:{required: true, minlength: 2, maxlength: 100},
            inp_CF_L_phone:{required: true,phones:true},
            inp_CF_L_email:{required: true,email:true,maxlength: 200},
            inp_CF_L_message:{required: true, minlength: 2, maxlength: 1000},
            check_CF_L_personal_data:{required:true}
        },
        invalidHandler : function(f, v) {
            $("#CF_L_err_validation_box").show();
            $("#btn_CF_L_send_mail").prop("disabled", false);
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
            $("#CF_L_err_validation_box").hide();
            $("#CF_L_success_box").hide();
            $("#btn_CF_L_send_mail").prop("disabled", true);
            //GENERATE TEMPLATE(BODY) OVERRIDE PARAMS, THIS WILL REPLACE PLACEHOLDERS
            //FORMAT IS :  par=>val|par2=>val2 ecc...

            var templateOverrideParams ="";
            //GET ALL INFO
            var tecnoimmobiliLogo = encodeURIComponent($("#inp_CF_L_tecnoimmobili_logo").val()),
                propertyLink = document.URL,
                propertyImage = encodeURIComponent($("#inp_CF_L_property_mainImage").val()),
                tipology = encodeURIComponent($("#inp_CF_L_property_tipology").val()),
                contract = encodeURIComponent($("#inp_CF_L_property_contract").val()),
                town = encodeURIComponent($("#inp_CF_L_property_town").val()),
                price = encodeURIComponent($("#inp_CF_L_property_price").val()),
                ref_code= encodeURIComponent($("#inp_CF_L_property_refCode").val()),
                sender_name = encodeURIComponent($("#inp_CF_L_name").val()),
                sender_email = encodeURIComponent($("#inp_CF_L_email").val()),
                sender_phone = encodeURIComponent($("#inp_CF_L_phone").val()),
                message = encodeURIComponent($("#inp_CF_L_message").val());

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
                $("#inp_CF_L_recipient").val(),
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
                        $("#btn_CF_L_send_mail").prop("disabled", false);
                        $("#CF_L_success_box").show();
                    }else{
                        alert("ERRORE NELL'INVIO DELLA MAIL "+resp);
                    }
                }
            );
        }
    });
    //END CONTACT FORM


});


function showPhone(){

    $("#btn_show_phone").hide();
    $("#phone_number_container").show();
}

