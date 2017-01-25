/**
 * Created by Developer on 11/01/2017.
 */
var form;
var GMap = null;

function selectFile(elem){
    $(elem).next(".file_explorer").click();
}
$(document).ready(function () {


    /* GOOGLE MAP REFRESH ON LOCATION TAB CLICK */
    $("#tab_location_li").click(function(){
        setTimeout(function(){initMap(18);},1);
        /*google.maps.event.trigger(GMap.map, 'resize')*/
    });
    // refresh the map when address blur
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


    // SELECT 2 INIT
    $(".select2").select2();


    //FORM VALIDATION
    form = $("#FORM_ADS").validate({
        ignore: 'input[type=hidden]',
        rules:
        {
            /*--- SELECT ---*/
            // LOCATION
            sel_category            : { required: true },
            sel_tipology            : { required: true },
            sel_locals              : { required: true },
            sel_rooms               : { required: true },
            sel_floors              : { required: true },
            sel_elevators           : { required: true },
            sel_conditions          : { required: true },
            sel_property_status     : { required: true },
            sel_heatings            : { required: true },
            sel_bathrooms           : { required: true },
            sel_box                 : { required: true },
            sel_gardens             : { required: true },
            sel_contracts           : { required: true },
            sel_energy_class        : { required: true },
            sel_ipe_um              : { required: true },
            /* LOCATION */
            sel_country             : { required: true },
            sel_region              : { required: true },
            sel_city                : { required: true },
            sel_town                : { required: true },
            sel_district            : { required: true },
            // ADS STATUS
            sel_ads_status          : { required: true },
            sel_negotiation_status  : { required: true },
            sel_negotiation         : { required: true },
            sel_property_status2    : { required: true },
            sel_price_lowered       : { required: true },
            sel_prestige            : { required: true },
//
//
            /*--- INPUT ---*/
            /* DESCRIPTION */
            inp_surface             : { required: true , number: true },
            inp_price               : { required: true , number: true },
            inp_ipe                 : { required: true , number: true },
            txt_description         : { required: true , minlength: 50, maxlength: 500 },
            /* LOCATION */
            inp_address             : { required: true , minlength: 3, maxlength: 240 },
            inp_street_num          : { required: true , maxlength: 50 }
            // ADS STATUS
        },

        submitHandler: function(form) {
            saveAds(form);
            openInfoModal(2,"Salvato","Immobile Salvato con successo","Chiudi");
        },
        invalidHandler: function(event, validator) {
            openInfoModal(5,"Attenzione!","Alcuni campi non sonos tati compilati correttamente , ricontrolla i dati e riprova");
        }
    });

});

function saveAds(form){
    var serializedData = $(form).serialize();
    console.log(serializedData);
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
        GMap.init("map",fullAddress,zoom,2,BASE_PATH+"/images/icons/map_marker.png",false);


}


