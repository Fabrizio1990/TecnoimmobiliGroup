var alertBox;
var successBox;
var btnSendMail;
var btnCloseContactForm;
var isModal = true;

$(function () {
    isModal = $("#property_contact_form").hasClass("modal");
    alertBox = $("#property_contact_form .contact_form_missing_fields");
    successBox = $("#property_contact_form .contact_form_sent");
    btnSendMail =   $("#property_contact_form #c_f_send_message");
    btnCloseContactForm = $("#property_contact_form #c_f_close");
    bindButtons();
});



function initContactFormModal(){
    if(!alertBox.hasClass("HIDDEN"))
        alertBox.addClass("HIDDEN");
    if(!successBox.hasClass("HIDDEN"))
        successBox.addClass("HIDDEN");

    console.log("QUI");
    if(!btnCloseContactForm.hasClass("HIDDEN")){
        console.log("nascondo il pulsante chiudi");
        btnCloseContactForm.addClass("HIDDEN");
    }
    if(btnSendMail.hasClass("HIDDEN"))
        btnSendMail.removeClass("HIDDEN");
    btnSendMail.prop("disabled",false);
}

function bindButtons(){

    if(isModal){
        btnCloseContactForm.bind("click",function(){
            $("#property_contact_form").modal('toggle');
        })


        $(".contact-modal-toggle").bind("click",function(event) {
            event.preventDefault();
            if($("#property_contact_form").hasClass("in"))
                return;

            initContactFormModal();

            var agentInfoBox = $(this).parent().next();
            var email = agentInfoBox.children(".cntct_email_info").val();
            var phone = agentInfoBox.children(".cntct_telephone_info").val() ;
            var mobile = agentInfoBox.children(".cntct_mobile_info").val();
            var refCode = agentInfoBox.children(".cntct_ref_code").val();

            showContactForm(email,phone,mobile,refCode);
        });
    }


    btnSendMail.bind("click",function() {
        var name,fromEmail,toEmail,phone,object,message,body,refCode;
        var getMailTemplateParams, sendMailParams;




        if(!alertBox.hasClass("HIDDEN"))
            alertBox.addClass("HIDDEN");
        if(!successBox.hasClass("HIDDEN"))
            successBox.addClass("HIDDEN");


        name = $("#property_contact_form #frm_contact_name").val();
        fromEmail = $("#property_contact_form #frm_contact_email").val();
        toEmail   = $("#property_contact_form #contact_email").text();
        toEmail = "webmaster@tecnoimmobiligroup.it";// OVERRIDE MAIL PER TEST
        phone = $("#property_contact_form #frm_contact_phone").val();
        object = $("#property_contact_form #frm_contact_object").val();
        message = $("#property_contact_form #frm_contact_body").val();
        refCode = $("#property_contact_form #frm_contact_ref_code").val();

        if(name=="" || fromEmail == "" || phone == "" || object == "" || message == ""){
            showAlert();
            //alertBox.removeClass("HIDDEN");
            return;
        }
        if(!validateEmail(fromEmail)){
            showAlert("La mail inserita non è valida!");
            return
        }
        if(!validateTelephone(phone)){
            showAlert("Numero di telefono non valido!");
            return
        }

        getMailTemplateParams = "reference_code="+refCode+"&sender_name="+encodeURIComponent(name)+"&sender_mail="+encodeURIComponent(fromEmail)+"&sender_phone="+encodeURIComponent(phone)+"&sender_message="+encodeURIComponent(message);



        sendMailParams = "to=" + encodeURIComponent(toEmail);
        sendMailParams+= "&object="+ encodeURIComponent(object);
        sendMailParams += "&ccn" + encodeURIComponent("info@tecnoimmobiligroup.it");

        btnSendMail.prop("disabled",true);
        load_page(SITE_URL +"/ajax/mails/get_contact_mail_content.ajax.php?"+getMailTemplateParams,null,function(resp, params){
            params+= "&body="+encodeURIComponent(resp);
            sendMail(params);
        },sendMailParams);

    });
}


function sendMail(params){
    ajaxCall(SITE_URL+"/ajax/mails/send_mail_generic.ajax.php",params,null,
        function(resp){
            if(resp > 0){
                if(!alertBox.hasClass("HIDDEN"))
                    alertBox.addClass("HIDDEN");
                successBox.removeClass("HIDDEN");

                if(isModal){
                    btnSendMail.addClass("HIDDEN");
                    btnCloseContactForm.removeClass("HIDDEN");
                }else{
                    btnSendMail.prop("disabled",true);
                }
            }
        },
        null,"POST"
    )
}

function showContactForm(email,phone,mobile,refCode){
    $("#property_contact_form #contact_email").text(email);
    $("#property_contact_form #contact_phone").text(phone);
    $("#property_contact_form #contact_mobile_phone").text(mobile);


    $("#property_contact_form #frm_contact_ref_code").val(refCode);
    $("#property_contact_form #frm_contact_name").val('');
    $("#property_contact_form #frm_contact_email").val('');
    $("#property_contact_form #frm_contact_phone").val('');
    $("#property_contact_form #frm_contact_object").val('');
    $("#property_contact_form #frm_contact_body").val('');

    $("#property_contact_form").modal('show');

}


function showAlert(text = null){
    if(text == null)
        text = "Attenzione, compila tutti i campi per inviare la richiesta!";

    $("#property_contact_form  .contact_form_missing_fields a").text(text);
    if(alertBox.hasClass("HIDDEN"))
        alertBox.removeClass("HIDDEN");
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
}


function validateTelephone(number){
    var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    return re.test(number.toLowerCase());
}