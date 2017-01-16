/**
 * Created by Developer on 11/01/2017.
 */

$(function () {
    $(".file_explorer").change(function(e) {
        url = BASE_PATH+"/AdminPanel/ajax/add_ads_saveImage.ajax.php";
        var elem = $(e.target);
        var imgName = elem.parent().children(".hidden_img_name")[0].value;
        if(imgName != undefined && imgName!= null && imgName!="")
            url+="?img_name="+imgName;
        var imgField = elem.parent().parent().parent().prev().children("img")[0];
        SEND_INP_FILES(elem,url,function(resp){loadImage(resp,imgField)});

    });
});


function loadImage(image_path,elem){
    elem.src = image_path+"?"+Math.random(0,50);
}


function saveImage(){

}
