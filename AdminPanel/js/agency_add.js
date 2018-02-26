function selectFile(elem){
    $(elem).next(".file_explorer").click();
}

$(document).ready(function () {
    $(".select2").select2();

    // Open select file window selection when click on button
    $(".logo_agency").bind("click",function(e){
        console.log("CLICCATO");
        selectFile(e.target);
    });

    // Save image when input file change
    $(".file_explorer").change(function(e) {
        var elem = e.target;
        var imgField = $(elem).prev("img")[0];
        saveImage(elem,"/AdminPanel/ajax/agencies_add_saveLogo.ajax.php",imgField);
    });

    // Get GEOLOCATION
    $("#inp_address").blur(function(){
        initMap(18);
    });
    // refresh the map when street num blur, but only if address is set
    $("#inp_street_num").blur(function(){
        if($("#inp_address").val()!="")
            initMap(18);
    });
    // refresh the map when the region or city or town change, but only if address is set
    $("#sel_country,#sel_region,#sel_city,#sel_town").change(function(){
        if($("#inp_address").val() !="")
            initMap(18);
    });






    form = $("#FORM_AGENCY").validate({
        ignore: 'input[type=hidden]',
        rules:
        {
            /*--- SELECT ---*/
            //AGENCY
            sel_country             : { required: true },
            sel_region              : { required: true },
            sel_city                : { required: true },
            sel_town                : { required: true },
            sel_district            : { required: true },
            sel_status              : { required: true },
            sel_sub_status          : { required: true },
            sel_portal_status       : { required: true },
            //AGENT
            sel_agent_status        : { required: true },

            /*--- INPUT ---*/
            //AGENCY
            inp_agency_banner       : { required: true , minlength: 5, maxlength: 200},
            inp_agency_name         : { required: true , minlength: 5, maxlength: 200},
            inp_agency_pIva         : { piva: true },
            inp_agency_CF           : { required: true , codfiscale: true },
            inp_agency_REA          : { required: true , maxlength: 200},
            inp_agency_BR           : { required: true , maxlength: 200},
            inp_address             : { required: true , minlength: 5, maxlength: 200 },
            inp_street_num          : { required: true , maxlength: 50 },
            competence_area         : { required: true , minlength: 2 ,maxlength: 200 },
            // AGENT
            inp_agent_name          : { required: true , minlength: 2, maxlength: 200},
            inp_agent_lastname      : { required: true , minlength: 2, maxlength: 200},
            inp_agent_email         : { required: true , email: true,  minlength: 5, maxlength: 200},
            inp_agent_private_email : { email: true, maxlength: 200},
            inp_agent_telephone     : { phones : true},
            inp_agent_mobile_phone  : { required : true, phones : true},
            inp_agent_fax           : { phones : true},
            inp_agent_skype         : { maxlength: 200},
            inp_agent_address       : { maxlength: 200},
            inp_agent_pIva          : { required: false,piva: true },
            inp_agent_CF            : { required : true, codfiscale: true },
            inp_agent_REA           : { maxlength: 20},


        },

        submitHandler: function(form) {

            var img_logo =  removeUrlParameters(fileNameFromUrl(document.getElementById("img_logo").src));
            saveAgency(form,img_logo);
        },
        invalidHandler: function(event, validator) {
            openInfoModal(5,"Attenzione!","Alcuni campi non sono tati compilati correttamente , ricontrolla i dati e riprova");
        }
    });


});


function saveAgency(form,img_logo){
    var page = SITE_URL+"/AdminPanel/ajax/agency_management_save.ajax.php";
    var params = $(form).serialize();
    params += "&img_logo="+img_logo;

    //console.log(params);
    ajaxCall(page,params,null,agencySaved,null,"POST");
}


function agencySaved(resp){
    if(resp=="1"||resp=="0" || resp.toLowerCase() =="success")
        openInfoModal(2,"Successo","L' agenzia è stata Salvata con successo","Chiudi",function(){window.location.reload();});
    else
        openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni.","Chiudi");
}


function initMap(defZoom = 2){
    zoom = defZoom;
    var fullAddress ="";
    address     = $("#inp_address").val();

    address_num = $("#inp_street_num").val();
    town        = $("#sel_town option:selected").text();
    country     = $("#sel_country option:selected").text();
    fullAddress = address +" "+ address_num +  " " +town +" " +country;

    // if full address is empty or is Italia  i set italia and put the zoom to 4
    if(fullAddress.trim() == "" || fullAddress.trim() == "Italia") {
        fullAddress = "Italia";
        zoom = 4;
    }
    GMap = new MyMap(true);
    GMap.geocode(fullAddress);

    setTimeout(function(){
        $("#latitude").val(GMap.getLatitude());
        $("#longitude").val(GMap.getLongitude());
    },1000);


}


