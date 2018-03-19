/**
 * Created by Developer on 27/02/2017.
 */
function scrollTO(elem,time){
    if(typeof elem == "string") elem = $(elem);

    $('html, body').animate({
        scrollTop: elem.offset().top
    }, time);
}

function JQGEBI(obj){
    if(obj instanceof jQuery){
        return obj;
    }
    return ($("#"+obj));
}

/*function JQAjaxCallFile(page,formData,success = null,fail = null,method = "POST"){
    $.ajax({
        url: page,
        data: formData,
        type: method,
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS

        success: function(data) {
            if(success!= null)
                success(data);
        },
        error: function(data) {
            successmessage = 'Error';
            $("label#successmessage").text(successmessage);
        },
    });
}*/