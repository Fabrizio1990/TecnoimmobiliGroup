//UTILITY OBJECT , THIS CONTAIN ALL EMAIL INFO
var mailInfoObj = function(_fromMail,_fromName,_toMail,_cc,_ccn,_object  = "",_body = "",_isHtml = true){
    this.fromMail = _fromMail;
    this.fromName = _fromName;
    this.toMail = _toMail;
    this.cc =_cc;
    this.ccn =_ccn;
    this.object =_object;
    this.body = _body;
    this.isHtml =_isHtml;
};

//GET TEMPLATE, REPLACE PLACEHOLDERS WITH OVERRIDE PARAMS AND SEND MAIL
function SendTemplateMail(templateName,templateOverrideParams,mailInfo,callBack = null,paramsDelimiter = "|",valueDelimiter = "=>") {
    //PARAM USED TO GET TEMPLATE
    var templateParams = "templateName="+templateName+"&params="+templateOverrideParams+"&paramsDelimiter="+paramsDelimiter+"&valueDelimiter="+valueDelimiter;
    //PARAMS USED TO SEND MAIL (THIS STRING WILL BE COMPLETED WITH BODY AND OBJ AFTER TEMPLATE IS RECIVED
    var emailParams = "from="+mailInfo.fromMail+"&fromName="+mailInfo.fromName+"&to="+mailInfo.toMail+"&cc="+mailInfo.cc+"&ccn="+mailInfo.ccn;


    //LOAD TEMPLATE
    load_page(SITE_URL +"/ajax/mails/get_mail_template.ajax.php?"+templateParams,null,    function(resp, params){ //PARAMS IS emailParams
        if(resp.includes("Errore")){
            alert("Errore nel recupero del template della mail");
        }
        //RET IS A JSON {obj:"oggetto",body="corpo"}
        var additionalInfo = JSON.parse(resp);
        //NO NEED TO ENCODING BECOUSE PAGE ALREADY RETURN URLENCODED JSON
        var mailBody = additionalInfo.body;
        var mailObj = additionalInfo.obj;
        //PARAMS CONTAINS EMAILPARAMS AND I WILL ADD BODY AND OBJECT BEFORE SEND MAIL
        params+= "&body="+mailBody+"&altBody="+mailBody+"&object="+mailObj;
        //SEND MAIL
        ajaxCall(SITE_URL+"/ajax/mails/send_mail_generic.ajax.php",params,null,
            callBack,
            null,"POST"
        )
    },emailParams);
    //LAST EMAILPARAMS WAS SENT ON CALLBACK AND RECIVED AS PARAMS

}



function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email.toLowerCase());
}


function validateTelephone(number){
    var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    return re.test(number.toLowerCase());
}