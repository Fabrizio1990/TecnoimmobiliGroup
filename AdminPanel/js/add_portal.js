var form;
$(document).ready(function () {

    // Save image when input file change
    $(".file_explorer").change(function(e) {
        var elem = e.target;
        var imgField = $(elem).parent().parent().parent().prev().children("img")[0];
        var imgName = $(elem).parent().children(".hidden_img_name")[0].value;

        saveImage(elem,"/AdminPanel/ajax/add_portal_saveImage.ajax.php",imgField,imgName);
    });


    // Check and set right fields visibility
    toggleVisibility($(".CONTRACT_DATA"),$('#inp_portal_hasContract').bootstrapSwitch('state'));
    toggleVisibility($(".FTP_INFO"),$('#inp_portal_hasFtp').bootstrapSwitch('state'));


    //TOGGLE CONTRACT INFO
    $('#inp_portal_hasContract').on('switchChange.bootstrapSwitch', function (event, state) {
        toggleVisibility($(".CONTRACT_DATA"),state);
        // TODO reset di tutti gli input relativi se da disabilitato riabilito

    });
    //TOGGLE FTP INFO
    $('#inp_portal_hasFtp').on('switchChange.bootstrapSwitch', function (event, state) {

        toggleVisibility($(".FTP_INFO"),state);
        // TODO reset di tutti gli input relativi se da disabilitato riabilito

    });

    //BIND ADD FEED BUTTON
    $('#btn_add_feed').on('click', function () {
       load_page(SITE_URL+"/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php",null,function(page){

           $("#feed_container").append(page);
           var inserted =$("#feed_container .FEED_BOX").last();
           //POPULATE PATH INPUT AND LINK INPUT
           GetFeedPath(inserted);
           GetFeedSaveLink(inserted)

       });

    });

    //REFRESH FEED SAVE PATH INPUT
    function GetFeedPath(feedSection){
        var pathInput = $(feedSection).find(".inp_portal_feed_foolder");
        var portalName = $("#inp_portal_name").val();
        var feedPath = "public/portals/"+portalName;
        pathInput.val(feedPath);

    }
    //REFRESH FEED SAVE LINK INPUT
    function GetFeedSaveLink(feedSection){
        var urlInput = $(feedSection).find(".inp_portal_feed_link");
        var portalName = $("#inp_portal_name").val();
        var feedName = urlInput.closest(".FEED_DATA").find(".inp_portal_feed_name").val();
        var feedUrl = SITE_URL+"/public/portals/"+portalName+"/"+feedName;
        urlInput.val(feedUrl);
    }


    // ON FEED NAME KEYUP I WILL CREATE FOLDER PATH AND SITE URL OF FEED
    $('#feed_container').on('keyup', '.inp_portal_feed_name', function(ev){
        GetFeedSaveLink($(this).closest(".FEED_BOX"));
    });

    $("#inp_portal_name").on('keyup', function(ev){
        $(".FEED_BOX").each(function() {
            GetFeedPath($(this));
            GetFeedSaveLink($(this));
        });
    });


    //BIND FEED CREATION BUTTON
    $('#feed_container').on('click', '.btn_feed_generator', function(event){
        /*event.preventDefault();
        console.log("AVRò PREVENUTO?");*/
        //GetFeedSaveLink($(this).closest(".FEED_BOX"));
    });






    form = $("#FORM_PORTAL").validate({
        ignore: 'input[type=hidden]',

        rules:
            {

                inp_portal_name             : { required: true , minlength: 2, maxlength: 100 } ,
                inp_portal_site             : { required: true , url: true} ,
                inp_portal_max_properties   : { number : true} ,
                inp_portal_personal_area_link :{url: true},
                inp_portal_contract_start : {
                    required: function (element) {
                        return $('#inp_portal_hasContract').bootstrapSwitch('state');
                    },
                    date: true
                },
                inp_portal_contract_end:{
                    required : function(element){
                        return $('#inp_portal_hasContract').bootstrapSwitch('state');
                    },
                    date: true
                },
                inp_portal_link_ftp:{
                    required : function(element){
                        return $('#inp_portal_hasFtp').bootstrapSwitch('state');
                    },
                },
                inp_portal_user_ftp:{
                    required : function(element){
                        return $('#inp_portal_hasFtp').bootstrapSwitch('state');
                    },
                },
                inp_portal_psw_ftp:{
                    required : function(element){
                        return $('#inp_portal_hasFtp').bootstrapSwitch('state');
                    },
                },
                inp_portal_feeds_doc_link : {url: true},
                inp_portal_contact_email : {email: true}

            },

        submitHandler: function(form) {

            var img_name = removeUrlParameters(fileNameFromUrl($("#img_portal").attr("src")));
            if(img_name == "Immagine_eof.jpg"){
                openInfoModal(5,"Attenzione!","Devi inserire il logo del portale");
                return;
            }
            savePortal(form);

        },
        invalidHandler: function(event, validator) {
            openInfoModal(5,"Attenzione!","Alcuni campi non sono tati compilati correttamente , ricontrolla i dati e riprova");
        }
    });



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

function getFeeds(){

    var ret = new Array();
    $(".FEED_DATA").each(function( index ) {
        var tmp = {
            feed_name: $(this).find(".inp_portal_feed_name").val(),
            feed_extension: $(this).find(".sel_feed_file_type").val(),
            //feed_folder: $(this).find(".inp_portal_feed_foolder").val(),
            feed_link : $(this).find(".inp_portal_feed_link").val(),
            feed_filter_field : $(this).find(".inp_portal_filter_field").val(),
            feed_filter_value : $(this).find(".inp_portal_filter_value").val(),
            feed_notes : $(this).find(".txt_portal_feed_notes").val()
        };
        console.log(tmp.feed_extension);
        ret.push(tmp);
    });
    return ret;
}


//SAVE PORTAL FUNCTION
function savePortal(form){
    var page = SITE_URL+"/AdminPanel/ajax/add_portal_savePortal.ajax.php";
    var params = $(form).serialize();
    params+= "&hasContract="+$('#inp_portal_hasContract').bootstrapSwitch('state');

    params += "&logo_portal="+encodeURIComponent(removeUrlParameters(fileNameFromUrl($("#img_portal").attr("src"))));
    var feeds = getFeeds();
    params += "&feedsInfo="+JSON.stringify(feeds);

    ajaxCall(page,params,null,portalSaved,null,"POST");
}

//ON PORTAL SAVED
function portalSaved(resp){
    if(resp=="1"||resp=="0" || resp.toLowerCase() =="success")
    openInfoModal(2,"Successo","Il portale è stato Salvato con successo","Chiudi",function(){window.location.reload();});
else
    openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni.","Chiudi");
}


