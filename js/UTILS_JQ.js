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