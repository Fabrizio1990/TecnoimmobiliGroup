function showPhone() {
    $('#btn_show_phone').hide();
    $('#phone_number_container').show();
}

$(document).ready(function () {
    form = $("#FORM_GENERIC_CONTACT").validate({
        rules: {
            inp_GCF_name:{required: true, minlength: 2, maxlength: 100},
            inp_GCF_phone:{phones:true},
            inp_GCF_email:{email:true,maxlength: 200},
            inp_GCF_message:{required: true, minlength: 2, maxlength: 1000},
            check_GCF_personal_data:{required:true}
        },

        submitHandler: function (form) {
            GFCGetMailData(form);
        }
    });

});

function GFCGetMailData(){

    //DISABILITO PULSANTE DI INVIO MAIL
    $("#btn_GFC_send_mail").prop("disabled",true);
    //RECUPERO DATI DELLA MAIL
    var refCode = encodeURIComponent($("#GCF_ref_code").text());
    var senderName  = encodeURIComponent($("#inp_GCF_name").val());
    var fromEmail = encodeURIComponent($("#inp_GCF_email").val());
    var toEmail = encodeURIComponent($("#inp_GCF_toEmail_hidden").val());
    var phone = encodeURIComponent($("#inp_GCF_phone").val());
    var obj = "Richiesta informazioni TecnoimmobiliGroup";
    obj = $("#inp_GCF_mail_obj").length > 0 ? $("#inp_GCF_mail_obj").val() :obj;
    var message = encodeURIComponent($("#inp_GCF_message").val());


    //RECUPERO DATI DEL DESTINATARIO
    var sendMailParams = "to=" + toEmail;
    sendMailParams+= "&object="+obj;
    sendMailParams += "&ccn" + encodeURIComponent("info@tecnoimmobiligroup.it");


    var getMailTemplateParams = "reference_code="+refCode+"&sender_name="+encodeURIComponent(senderName)+"&sender_mail="+encodeURIComponent(fromEmail)+"&sender_phone="+encodeURIComponent(phone)+"&sender_message="+encodeURIComponent(message);

    //RECUPERO IL TEMPLATE DELLA MAIL
    load_page(
        SITE_URL +"/ajax/mails/get_contact_mail_content.ajax.php?"+getMailTemplateParams,
        null,
        function(resp, params){
            params+= "&body="+encodeURIComponent(resp);
            GCFSendMail(params);
        },
        sendMailParams);

}

//INVIO MAIL
function GCFSendMail(params){
    console.log(params);
    ajaxCall(SITE_URL+"/ajax/mails/send_mail_generic.ajax.php",params,null,
        GFCMailSent,
        null,"POST"
    )
}

function GFCMailSent(resp){
    if(resp > 0){
        //RIABILITO PULSANTE
        $("#btn_GFC_send_mail").prop("disabled",false);
        $("#GFC_MAIL_SENT_RESPONSE").show();
    }
}