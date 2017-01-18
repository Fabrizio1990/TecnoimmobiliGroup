/**
 * Created by Developer on 11/01/2017.
 */
var form;


function selectFile(elem){
    $(elem).next(".file_explorer").click();
}
$(document).ready(function () {
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
            alert("validation ok");
        },
        invalidHandler: function(event, validator) {
            alert( "Alcuni campi non sono validi");
        }
    });

});

function saveAds(form){
    var serializedData = $(form).serialize();
    console.log(serializedData);
}