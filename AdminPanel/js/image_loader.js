/**
 * Created by Developer on 11/01/2017.
 */

/*$(function () {
    $(".file_explorer").change(function(e) {
        var elem = e.target;
        saveImage(elem);
    });
});*/


function loadImage(image_path,elem){
    elem.src = image_path+"?"+Math.random(0,50);
}


function saveImage(elem,url,imgField,imgName=""){
    url = SITE_URL+url;

    if(imgName != undefined && imgName!= null && imgName!="")
        url+="?img_name="+imgName;
    SEND_INP_FILES(elem,url,function(resp){loadImage(resp,imgField)});
}
