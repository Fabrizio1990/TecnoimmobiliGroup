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