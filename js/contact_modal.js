
function bindButtons(){
    $(".contact-modal-toggle").bind("click",function(event) {
        event.preventDefault();
        if($("#ContactFormModal").hasClass("in"))
            return;

        var agentInfoBox = $(this).parent().next();
        console.log(agentInfoBox);
        var email = agentInfoBox.children(".email_info").val();
        var phone = agentInfoBox.children(".telephone_info").val() ;
        var mobile = agentInfoBox.children(".mobile_info").val();

        showContactForm(email,phone,mobile);
    });

    $("#c_f_send_message").bind("click",function() {
        /*var params;

        //encodeURIComponent()
        params = "to=";
        params+= "&object=";
        params+= "&body=";


        ajaxCall(BASE_PATH+"/ajax/mails/send_mail_generic.ajax.php",params,null,
            function(resp){
                console.log(resp);
            },
            null,"POST"
        )*/
    });
}

function showContactForm(email,phone,mobile){
    $("#ContactFormModal #contact_email").text(email);
    $("#ContactFormModal #contact_phone").text(phone);
    $("#ContactFormModal #contact_mobile_phone").text(mobile);
    $("#ContactFormModal").modal('show');

    $("#name").val('');
    $("#email").val('');
    $("#phone").val('');
    $("#object").val('');
    $("#body").val('');


}
