function switchRequestStatus(idRequest,status,switchElem){
    console.log("R "+idRequest);
    console.log("S "+status);
    var page = "../AdminPanel/ajax/switch_requests_settings.ajax.php";
    var params = "idRequest="+idRequest+"&status="+status;
    ajaxCall(page,params,switchElem,statusSwitched,ajax_fail,"POST");
}

function statusSwitched(resp,switchElem){
    if(resp!="0" && resp!="1")
        openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni. errcode = "+resp,"Chiudi");
    else
        switchElem.bootstrapSwitch('toggleState', true, true);
}

function bindSwitches() {
    var options = {
        size: "mini",
        onColor: 'success',
        offColor: 'danger',
        animate: true,
    };
    $(".switch").bootstrapSwitch(options);

    $('.switch').on('switchChange.bootstrapSwitch', function (event, state) {
        var _that = $(this);
        console.log(this); // DOM element
        console.log(event); // jQuery event
        console.log(state); // true | false
        _that.bootstrapSwitch('state', !state, true);
        openModal(
            3,
            "Attenzione!",
            "Stai per modificare lo stato della richiesta, Procedere?",
            function(){

                var idRequest = _that.closest("tr").find(">:first-child").find("input:hidden").val();
                console.log("-idReq"+idRequest);
                var status = _that.bootstrapSwitch('state');
                // qua non sono ancora stati switchati quindi prendo il valore che dovrà essere
                status = status?0:1;
                switchRequestStatus(idRequest,status,_that);
                hideModal("myModal");
            },
            "No",
            "Si"
        );
    });
}

// IN options_populate.js fixare il popolamento ricorsivo (non funziona con le select singole ma solo con le multiple

function getDetails(id_newsletter) {
    load_page(SITE_URL + "/AdminPanel/ajax/get_newsletter_details.ajax.php?id="+id_newsletter,"request_details",function(){
        $(".select2").select2();

        $('.price_input').priceFormat({
            prefix: '€ ',
            centsSeparator: ',',
            thousandsSeparator: '.',
            clearOnEmpty: true,
            centsLimit: 0
        });

        $('.mq_input').priceFormat({
            prefix: '',
            suffix: ' m²',
            centsSeparator: ',',
            thousandsSeparator: '.',
            clearOnEmpty: true,
            centsLimit: 0
        });
        $("#inp_submit_req").removeClass("HIDDEN");

        bindValidation();
        // TO GET VALUE USE THIS -> $("#price_min").unmask();

        if($("#BTN_BOX_COLLAPSE").hasClass("fa-plus"))
            $("#box_request_details [data-widget='collapse']").click();
    });
}

function bindValidation(){

    $("#FORM_REQUEST").validate({
        ignore: 'input[type=hidden]',
        rules:
        {
            /*--- SELECT ---*/
            // LOCATION
            sel_req_contracts        : { required: true },
            sel_req_category        : { required: true },
            sel_req_tipology        : { required: true },
            sel_region          : { required: true },
            sel_city                : { required: true },
            sel_town                : { required: true },
            sel_district            : { required: true },


            /*--- INPUT ---*/
            inp_req_name            : { required: true , minlength: 2 ,maxlength: 150},
            inp_req_lastname        : { required: true , minlength: 2 ,maxlength: 150 },
            inp_req_email           : { required: true , email:true},
            inp_req_telephone       : { phones : true},

            price_min               : {
                required: true,
                lessThanEqual :function(){
                    return [$('#price_min').unmask().trim(),$('#price_max').unmask().trim()]
                }
            },

            price_max               : {
                required:true,
                greatherThanEqual:function(){
                    return [$('#price_max').unmask().trim(),$('#price_min').unmask().trim()]
                }
            },

            mq_min                  : {
                required: true,
                lessThanEqual :function(){
                    return [$('#mq_min').unmask().trim(),$('#mq_max').unmask().trim()]
                }
            },


            mq_max         : {
                required:true,
                    greatherThanEqual:function(){
                    return [$('#mq_max').unmask().trim(),$('#mq_min').unmask().trim()]
                }
            },

        },

        submitHandler: function(form) {


            updateRequest();
        },
        invalidHandler: function(event, validator) {
            openInfoModal(5,"Attenzione!","Alcuni campi non sono tati compilati correttamente , ricontrolla i dati e riprova");
        }
    });
}



function updateRequest(){
    sel_contract = $("#sel_req_contracts"),sel_category = $("#sel_req_category"),selTipology = $("#sel_req_tipology"),sel_region = $("#sel_region"),sel_city = $("#sel_city"),sel_town = $("#sel_town"),sel_district = $("#sel_district");

    var id_request  = $("#H_id_request_details").val();
    var id_easywork = $("#H_id_EW_request_details").val();
    var status      = $("#H_status").val();
    var name        = $("#inp_req_name").val();
    var lastname    = $("#inp_req_lastname").val();
    var email       = $("#inp_req_email").val();
    var telephone   = $("#inp_req_telephone").val();
    var contract    = sel_contract.select2("val")!=null ?"" + sel_contract.select2("val"):"";
    var category    = sel_category.select2("val")!=null ?"" + sel_category.select2("val"):"";
    var tipology    = selTipology.select2("val")!=null ?"" + selTipology.select2("val"):"";
    var region      = sel_region.select2("val")!=null ?"" + sel_region.select2("val"):"";
    var city        = sel_city.select2("val")!=null ?"" + sel_city.select2("val"):"";
    var town        = sel_town.select2("val")!=null ?"" + sel_town.select2("val"):"";
    var district    = sel_district.select2("val")!=null ?"" + sel_district.select2("val"):"";
    var price_min   = $("#price_min").unmask();
    var price_max   = $("#price_max").unmask();
    var mq_min      = $("#mq_min").unmask();
    var mq_max      = $("#mq_max").unmask();


    var page = SITE_URL+"/AdminPanel/ajax/request_management_save.ajax.php";

    var params = "";

    params += "id_request="+id_request+"&";
    params += "id_easywork="+id_easywork+"&";
    params += "enabled="+status+"&";
    params += "name="+name+"&";
    params += "lastname="+lastname+"&";
    params += "email="+email+"&";
    params += "telephone="+telephone+"&";
    params += "contracts="+contract+"&";
    params += "categories="+category+"&";
    params += "tipologies="+tipology+"&";
    params += "regions="+region+"&";
    params += "cities="+city+"&";
    params += "towns="+town+"&";
    params += "districts="+district+"&";
    params += "price_min="+price_min.trim()+"&";
    params += "price_max="+price_max.trim()+"&";
    params += "mq_min="+mq_min.trim()+"&";
    params += "mq_max="+mq_max.trim();

    //console.log(params);
    ajaxCall(page,params,id_request,requestUpdated,null,"POST");
}


function requestUpdated(resp,params){
    console.log(isNaN("12s"));
    if(!isNaN(resp) && (parseInt(resp)>=0 || resp.toLowerCase() =="success"))
        openInfoModal(2,"Successo","La richiesta è stata aggiornata con successo","Chiudi");
    else
        openInfoModal(5,"Errore!","è avvenuto un errore durante il' aggiornamento della richiesta.","Chiudi");
}




