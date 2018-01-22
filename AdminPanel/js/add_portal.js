$(document).ready(function () {


    // Save image when input file change
    $(".file_explorer").change(function(e) {
        var elem = e.target;
        var imgField = $(elem).parent().parent().parent().prev().children("img")[0];
        var imgName = $(elem).parent().children(".hidden_img_name")[0].value;

        saveImage(elem,"/AdminPanel/ajax/add_portal_saveImage.ajax.php",imgField,imgName);
    });


    // CONTROLLO VISIBILITà DI CAMPI DISPONIBILI IN BASE A UN TOGGLE
    toggleVisibility($(".CONTRACT_DATA"),$('#inp_portal_hasContract').bootstrapSwitch('state'));

    toggleVisibility($(".FTP_INFO"),$('#inp_portal_hasFtp').bootstrapSwitch('state'));


    $('#inp_portal_hasContract').on('switchChange.bootstrapSwitch', function (event, state) {

        toggleVisibility($(".CONTRACT_DATA"),state);
        // TODO reset di tutti gli input relativi se da disabilitato riabilito

    });



    $('#inp_portal_hasFtp').on('switchChange.bootstrapSwitch', function (event, state) {

        toggleVisibility($(".FTP_INFO"),state);
        // TODO reset di tutti gli input relativi se da disabilitato riabilito

    });


    $('#btn_add_feed').on('click', function () {

       load_page(BASE_PATH+"/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php",null,function(page){
            $("#feed_container").append(page);
       });

    });


    /*$('#feed_container .box-header .btn_delete_feed').on('click', function (event) {
        $(event.target).closest(".box").remove();
    });*/

});



function selectFile(elem){
    $(elem).next(".file_explorer").click();
}

function removeFeedRow(elem){
    $(elem).closest(".box").remove();
}

function toggleVisibility(elem,enabled){
    if(enabled)
        elem.show();
    else
        elem.hide();
}

