
function switchAgencyStatus(idAgency,status,switchElem){
    //console.log("a "+idAgency);
    //console.log("s "+status);
    if(status == 1)
        console.log(" Abilito STATUS");
    else
        console.log("  Disabilito");



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

function getAgencyList(){
    getOpts(GEBI("sel_agencies"),'agencies_list',null,0,"Mantieni Agenzia Corrente",null);
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
        _that.bootstrapSwitch('state', !state, true); // sembra che qua faccia lo switch dello stato

        var messasge = getSwitchMessage(state);

        openModal(
            3,
            "Attenzione!",
            messasge,
            function(){

                var idAgency = _that.closest("tr").find(">:first-child").find("form").find("input:hidden").val();
                var status = status = state ? 1 : 2;
                switchAgencyStatus(idAgency, status, _that);
                hideModal("myModal");
            },
            "No",
            "Si"
        );

    });

}

/*
    SE ABILITO CONTROLLO SE L' AGENZIA AVEVA IMMOBILI CHE SONO POI STATI SPOSTATI IN ALTRE AGENZIE, IN TAL CASO CHIEDO SE VOGLIONO RIPRISTINARE L' ASSOCIAZIONE

    SE DISABILITO CHIEDO SE VOGLIONO SPOSTARE GLI IMMOBILI IN UN ALTRA AGENZIA
*/

function getSwitchMessage(newState){
    var message;
    message = "<p>Stai per modificare lo stato dell Agenzia, Procedere?</p>";

    if(newState)
        message += "<p>Voi ripristinare i vecchi alloggi spostati i altre agenzie? <select id='restore_ads_opt' class='form-control'><option value='0'>NO</option><option value='1'>SI</option></select></p>";
    else
        message += "<p class='test'>Assegna gli immobili all' agenzia : <select class='form-control' id='sel_agencies'></option></select><script>getAgencyList()</script> </p>";

    return message;
}

