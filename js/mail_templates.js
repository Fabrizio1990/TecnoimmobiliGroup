/*
    I PARAMETRI (additionalParams) DEVONO ESSERE MANDATI NEL FORMATO:
    params=par1=>val1|par2=>val2
    gli identificativi dei parametri devono corrispondere al placeholder che vogliono sostituire
*/
function GetMailTemplate(templateId,from,to,additionalParams,paramsDelimiter = "|",valueDelimiter = "=>",callback =null,callbackParams =null) {
    var params ="templateId="+templateId;
    params+="&params="+encodeURIComponent(additionalParams);
    params+="&paramsDelimiter="+encodeURIComponent(paramsDelimiter);
    params+="&valueDelimiter="+encodeURIComponent(valueDelimiter);
    load_page(SITE_URL +"/ajax/mails/get_mail_template.ajax.php?"+additionalParams,null,callback,callbackParams);
}