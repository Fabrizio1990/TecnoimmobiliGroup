function switchAgencyStatus(idAgency,status,switchElem){

    console.log("a "+idAgency);
    console.log("s "+status);
    var page = "../AdminPanel/ajax/switch_agencies_settings.ajax.php";
    var params = "idAgency="+idAgency+"&status="+status;
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
        //openModal(type,title,body,btnSaveFunc = null,btnCloseTxt = "Chiudi",btnSaveTxt = "Salva",hidden = false,callback = null)
        openModal(
            3,
            "Attenzione!",
            "Stai per modificare lo stato dell Agenzia, Procedere?",
            function(){

                var idAgency = _that.closest("tr").find(">:first-child").find("form").find("input:hidden").val();
                var status = _that.bootstrapSwitch('state');
                // qua non sono ancora stati switchati quindi prendo il valore che dovrà essere
                status = status?2:1;
                switchAgencyStatus(idAgency,status,_that);
                hideModal("myModal");
            },
            "No",
            "Si"
        );

    });

}