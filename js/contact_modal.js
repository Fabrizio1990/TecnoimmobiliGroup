
function bindButtons(){
    $(".contact-modal-toggle").bind("click",function(event) {
        event.preventDefault();
        if($("#ContactFormModal").hasClass("in"))
            return;

        var alert  =  $("#ContactFormModal .contact_form_missing_fields");
        if(!alert.hasClass("HIDDEN"))
            alert.addClass("HIDDEN");

        var agentInfoBox = $(this).parent().next();
        var email = agentInfoBox.children(".cntct_email_info").val();
        var phone = agentInfoBox.children(".cntct_telephone_info").val() ;
        var mobile = agentInfoBox.children(".cntct_mobile_info").val();
        var refCode = agentInfoBox.children(".cntct_ref_code").val();

        showContactForm(email,phone,mobile,refCode);
    });

    $("#c_f_send_message").bind("click",function() {
        var name,fromEmail,toEmail,phone,object,message,body,refCode;
        var getMailTemplateParams, sendMailParams;
        var alert  =  $("#ContactFormModal .contact_form_missing_fields");
        if(!alert.hasClass("HIDDEN"))
            alert.addClass("HIDDEN");


        name = $("#ContactFormModal #frm_contact_name").val();
        fromEmail = $("#ContactFormModal #frm_contact_email").val();
        toEmail   = $("#ContactFormModal #contact_email").text();
        toEmail = "webmaster@tecnoimmobiligroup.it";// OVERRIDE MAIL PER TEST
        phone = $("#ContactFormModal #frm_contact_phone").val();
        object = $("#ContactFormModal #frm_contact_object").val();
        message = $("#ContactFormModal #frm_contact_body").val();
        refCode = $("#ContactFormModal #frm_contact_ref_code").val();



        if(name=="" || fromEmail == "" || phone == "" || object == "" || message == ""){
            alert.removeClass("HIDDEN");
            return;
        }

        getMailTemplateParams = "reference_code="+refCode+"&sender_name="+encodeURIComponent(name)+"&sender_mail="+encodeURIComponent(fromEmail)+"&sender_phone="+encodeURIComponent(phone)+"&sender_message="+encodeURIComponent(message);



        sendMailParams = "to=" + encodeURIComponent(toEmail);
        sendMailParams+= "&object="+ encodeURIComponent(object);
        sendMailParams += "&ccn" + encodeURIComponent("info@tecnoimmobiligroup.it");


        load_page(BASE_PATH +"/ajax/mails/get_contact_mail_content.ajax.php?"+getMailTemplateParams,null,function(resp,params){
            params+= "&body="+encodeURIComponent(resp);
            sendMail(params);
        },sendMailParams);

    });
}


function sendMail(params){
    ajaxCall(BASE_PATH+"/ajax/mails/send_mail_generic.ajax.php",params,null,
        function(resp){
            console.log(resp);
        },
        null,"POST"
    )
}

function showContactForm(email,phone,mobile,refCode){
    $("#ContactFormModal #contact_email").text(email);
    $("#ContactFormModal #contact_phone").text(phone);
    $("#ContactFormModal #contact_mobile_phone").text(mobile);


    $("#ContactFormModal").modal('show');

    $("#ContactFormModal #frm_contact_ref_code").val(refCode);
    $("#ContactFormModal #name").val('');
    $("#ContactFormModal #email").val('');
    $("#ContactFormModal #phone").val('');
    $("#ContactFormModal #object").val('');
    $("#ContactFormModal #body").val('');

}
