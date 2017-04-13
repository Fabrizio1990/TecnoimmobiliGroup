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
    load_page(BASE_PATH + "/AdminPanel/ajax/get_newsletter_details.ajax.php?id="+id_newsletter,"request_details",function(){
        $(".select2").select2();
        if($("#BTN_BOX_COLLAPSE").hasClass("fa-plus"))
            $("#box_request_details [data-widget='collapse']").click();
    });
}


