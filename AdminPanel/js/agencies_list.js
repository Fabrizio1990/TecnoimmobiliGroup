
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

function populateAgencyList(){
    getOpts(GEBI("sel_agencies_switch_properties"),'agencies_list',null,0,"Mantieni Agenzia Corrente",null);
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
                var status = state ? 1 : 2;

                if(!state && $("#sel_agencies_switch_properties")){
                    var optionSelected = $("#sel_agencies_switch_properties").val();
                    if(optionSelected!=0)
                        switchPropertiesAgency(idAgency,optionSelected);
                }
                if(state && $("#sel_restore_agency_properties")){
                    var optionSelected = $("#sel_restore_agency_properties").val();
                    if(optionSelected == 1){
                        restorePropertiesAgency(idAgency);
                    }
                }


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
        message += "<p>Durante la disabilitazione dell' agenzia potresti aver assegnato i suoi immobili ad un altra agenzia, vuoi eseguire il controllo e ripristinare gli immobili di questa agenzia se presenti? <select id='sel_restore_agency_properties' class='form-control'><option value='0'>NO</option><option value='1'>SI</option></select></p>";
    else
        message += "<p class='test'>Assegna gli immobili all' agenzia : <select class='form-control' id='sel_agencies_switch_properties'></option></select><script>populateAgencyList()</script> </p>";

    return message;
}


function switchPropertiesAgency(idAgFrom,idAgTo){
    if(idAgTo == 0)
        return;
    var params = "ACTION=1&idAgFrom="+idAgFrom+"&idAgTo="+idAgTo;
    ajaxCall("../AdminPanel/ajax/agencies_switch_properties.ajax.php",params,null,switchPropertiesAgencySuccess,null,"POST");
}

function restorePropertiesAgency(idAgency){
    var params = "ACTION=0&idAgency="+idAgency;
    ajaxCall("../AdminPanel/ajax/agencies_switch_properties.ajax.php",params,null,restorePropertiesAgencySuccess,null,"POST");
}

switchPropertiesAgencySuccess = function(resp,callback_params){
    if(resp.indexOf("SUCCESSO")>0)
        console.log("IMMOBILI SPOSTATI CON SUCCESSO");
    else
        console.log("ERRORE NELLO SPOSTAMENTO DEGLI IMMOBILI");
}

restorePropertiesAgencySuccess = function(resp,callback_params){
    if(resp.indexOf("SUCCESSO")>0)
        console.log("IMMOBILI RIPRISTINATI CON SUCCESSO");
    else
        console.log("ERRORE NEL TENTATIVO DI RIPRISTINO DEGLI IMMOBILI");
}

