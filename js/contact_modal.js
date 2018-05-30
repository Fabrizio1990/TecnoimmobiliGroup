var modalTemplateMailName ="Richiesta informazioni immobiile";

var alertBox;
var successBox;
var btnSendMail;
var btnCloseContactForm;

$(function () {
    alertBox = $("#property_contact_form .CF_M_err_validation_box");
    successBox = $("#property_contact_form .CF_M_success_box");
    btnSendMail =   $("#property_contact_form #btn_CF_M_sendMessage");
    btnCloseContactForm = $("#property_contact_form #btn_CF_M_close");
    //bindButtons();
});

$(document).ready(function(){

    // BIND ALL MODAL TRIGGER BUTTONS
    $(".contact-modal-toggle").bind("click",function(event) {
        event.preventDefault();
        if($("#property_contact_form").hasClass("in"))
            return;

        var hiddenInfoContainer = $(this).parent().next(".CF_M_hiddenInfo");

        initContactFormModal();


        showContactForm(hiddenInfoContainer);
    });

    //BIND SEND MESSAGE BUTTON OF CONTACT MODAL
    /*btnSendMail.bind("click",function(event) {
        event.preventDefault();
        console.log("INVIO MAIL");
    });*/

    //BIND CLOSE MODAL BUTTON
    btnCloseContactForm.bind("click",function(){
        $("#property_contact_form").modal('toggle');
    })



    //CONTACT FORM VALIDATE
    form = $("#CONTACT_FORM_MODAL").validate({
        rules: {
            inp_CF_M_name:{required: true, minlength: 2, maxlength: 100},
            inp_CF_M_phone:{required: true,phones:true},
            inp_CF_M_email:{required: true,email:true,maxlength: 200},
            inp_CF_M_message:{required: true, minlength: 2, maxlength: 1000},
            check_CF_M_personal_data:{required:true}
        },
        invalidHandler : function(f, v) {
            $("#CF_M_err_validation_box").show();
            $("#btn_CF_M_send_mail").prop("disabled", false);
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
            $("#CF_M_err_validation_box").hide();
            $("#CF_M_success_box").hide();
            $("#btn_CF_M_send_mail").prop("disabled", true);
            //GENERATE TEMPLATE(BODY) OVERRIDE PARAMS, THIS WILL REPLACE PLACEHOLDERS
            //FORMAT IS :  par=>val|par2=>val2 ecc...

            var templateOverrideParams ="";
            //GET ALL INFO
            var tecnoimmobiliLogo = encodeURIComponent($("#inp_CF_L_tecnoimmobili_logo").val()),
                propertyLink = document.URL,
                propertyImage = encodeURIComponent($("#inp_CF_M_property_mainImage").val()),
                tipology = encodeURIComponent($("#inp_CF_M_property_tipology").val()),
                contract = encodeURIComponent($("#inp_CF_M_property_contract").val()),
                town = encodeURIComponent($("#inp_CF_M_property_town").val()),
                price = encodeURIComponent($("#inp_CF_M_property_price").val()),
                ref_code= encodeURIComponent($("#inp_CF_M_property_refCode").val()),
                sender_name = encodeURIComponent($("#inp_CF_M_name").val()),
                sender_email = encodeURIComponent($("#inp_CF_M_email").val()),
                sender_phone = encodeURIComponent($("#inp_CF_M_phone").val()),
                message = encodeURIComponent($("#inp_CF_M_message").val());

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
                modalTemplateMailName,
                templateOverrideParams,
                mailInfo,
                function(resp,params){
                    if(resp > 0) {
                        $("#btn_CF_M_send_mail").prop("disabled", false);
                        $("#CF_M_success_box").show();
                    }else{
                        alert("ERRORE NELL'INVIO DELLA MAIL "+resp);
                    }
                }
            );
        }
    });
    //END CONTACT FORM


});



function initContactFormModal(){


    if(!btnCloseContactForm.hasClass("HIDDEN")){
        console.log("nascondo il pulsante chiudi");
        btnCloseContactForm.addClass("HIDDEN");
    }
    if(btnSendMail.hasClass("HIDDEN"))
        btnSendMail.removeClass("HIDDEN");
    btnSendMail.prop("disabled",false);
}

function showContactForm(infoContainer){

    //GET HIDDEN INFO
    var email = infoContainer.children(".inp_CF_M_ag_email_info").val(),
    phone = infoContainer.children(".inp_CF_M_ag_telephone_info").val(),
    mobile = infoContainer.children(".inp_CF_M_ag_mobile_info").val(),
    tecnoimmLogo = infoContainer.children(".inp_CF_M_tecnoimmobili_logo").val(),
    propertyImage = infoContainer.children(".inp_CF_M_property_mainImage").val(),
    propertyTipology = infoContainer.children(".inp_CF_M_property_tipology").val(),
    propertyContract = infoContainer.children(".inp_CF_M_property_contract").val(),
    propertyTown = infoContainer.children(".inp_CF_M_property_town").val(),
    propertyPrice = infoContainer.children(".inp_CF_M_property_price").val(),
    propertyRefCode = infoContainer.children(".inp_CF_M_property_refCode").val();

    //POPULATE VISIBLE INFO
    $("#property_contact_form #contact_email").text(email);
    $("#property_contact_form #contact_phone").text(phone);
    $("#property_contact_form #contact_mobile_phone").text(mobile);
    //POPULATE HIDDEN INFO
    $("#property_contact_form #inp_CF_M_ag_email_info").val(email);
    $("#property_contact_form #inp_CF_M_property_refCode").val(propertyRefCode);
    $("#property_contact_form #inp_CF_M_tecnoimmobili_logo").val(tecnoimmLogo);
    $("#property_contact_form #inp_CF_M_property_mainImage").val(propertyImage);
    $("#property_contact_form #inp_CF_M_property_tipology").val(propertyTipology);
    $("#property_contact_form #inp_CF_M_property_contract").val(propertyContract);
    $("#property_contact_form #inp_CF_M_property_town").val(propertyTown);
    $("#property_contact_form #inp_CF_M_property_price").val(propertyPrice);
    //CLEAR INPUTS
    $("#property_contact_form #inp_CF_M_name").val('');
    $("#property_contact_form #inp_CF_M_email").val('');
    $("#property_contact_form #inp_CF_M_phone").val('');
    $("#property_contact_form #inp_CF_M_message").val('');
    //HIDE INFO BOXES
    if(!alertBox.hasClass("HIDDEN"))
        alertBox.addClass("HIDDEN");
    if(!successBox.hasClass("HIDDEN"))
        successBox.addClass("HIDDEN");
    //SHOW MODAL
    $("#property_contact_form").modal('show');

}
