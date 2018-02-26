function bindSwitches() {
    var options = {
        inverse: true,
        size: "mini",
        onColor: 'success',
        offColor: 'danger',
        animate: true,
    };
    $(".switch").bootstrapSwitch(options);

    $('.switch').on('switchChange.bootstrapSwitch', function (event, state) {
        var _that = $(this);
        //_that.bootstrapSwitch('state', !state, true); // sembra che qua faccia lo switch dello stato
        var portalId = _that.closest("tr").find("td:first-child").find(".id_portal").val();

        var status = state ? 1 : 0;
        console.log("new state = "  +state);
        switchPortalStatus(portalId,status,_that)


    });

}




function toggleLimitEdit(elem){
    var row = $(elem).closest("td");
    var valueDiv = row.children(".valueMode");
    var editDIv = row.children(".editMode");

    if(valueDiv.hasClass("HIDDEN")){
        valueDiv.removeClass("HIDDEN");
        editDIv.addClass("HIDDEN");
    }else{
        editDIv.removeClass("HIDDEN");
        valueDiv.addClass("HIDDEN");
    }
}

function saveNewLimit(portalId,buttonReference) {
    var quantity = $(buttonReference).closest("td").children(".editMode").find(".newLimit").val();
    var currentQuantityElem = $(buttonReference).closest("td").children(".valueMode").find(".currentLimit");
    console.log("PORTAL ID = "+portalId);
    console.log("quantiyt = " +quantity);
    var page = SITE_URL+"/AdminPanel/ajax/portal_set_limits.ajax.php"
    var params = "new_limit="+quantity+"&portal_id="+portalId;
    var additionalParams = new Array(currentQuantityElem,quantity);
    ajaxCall(page,params,additionalParams,limitSaved,null,"POST");
}

function limitSaved(resp,info) {
    info[0].innerHTML = info[1];
    toggleLimitEdit(info[0]);

    //refresh datatable
    //TODO il refresh di tutta la tabella potrebbe farti perdere la referenza alla riga che stavi visualizzando, se succede devo trovare il modo di refreshare solo la riga
    $('#DT_PORTALS').DataTable().ajax.reload();

}


function switchPortalStatus(portalId,status,switchElem){

    if(status == 1)
        console.log(" Abilito STATUS");
    else
        console.log("  Disabilito");


    var page = "../AdminPanel/ajax/switch_portal_status.ajax.php";
    var params = "portal_id="+portalId+"&new_status="+status;
    ajaxCall(page,params,switchElem,statusSwitched,ajax_fail,"POST");

}

function statusSwitched(resp,switchElem){
    if(resp!="0" && resp!="1")
        openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni. errcode = "+resp,"Chiudi");
    /*else
        switchElem.bootstrapSwitch('toggleState', true, true);*/
}