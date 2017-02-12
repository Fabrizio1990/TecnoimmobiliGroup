/**
 * Created by Developer on 11/01/2017.
 */

$(function () {
    $(".file_explorer").change(function(e) {
        var elem = e.target;
        saveImage(elem);
    });
});


function loadImage(image_path,elem){
    elem.src = image_path+"?"+Math.random(0,50);
}


function saveImage(elem){
    var jqElem = $(elem);
    url = BASE_PATH+"/AdminPanel/ajax/add_property_saveImage.ajax.php";
    var imgName = jqElem.parent().children(".hidden_img_name")[0].value;
    if(imgName != undefined && imgName!= null && imgName!="")
        url+="?img_name="+imgName;
    var imgField = jqElem.parent().parent().parent().prev().children("img")[0];
    //console.log(elem[0].files[0]);
    SEND_INP_FILES(elem,url,function(resp){loadImage(resp,imgField)});
}
