function goToAuction(){
    var page = SITE_URL+"/ajax/research_set_session.ajax.php";
    var params = "sel_contract=7&sel_category=1";
    ajaxCall(page,params,null,researchSet,researchNotSet,"POST");
}

function researchSet(res){
    document.location.href = SITE_URL+"/Residenziale/Asta%20Immobiliare/Qualsiasi/Qualsiasi/filtri/campoOrdinamento=date_up%7Casc";
}

function researchNotSet(){
    openInfoModal(5,"Errore!","è avvenuto un errore durante la ricerca, riprova a breve.","Chiudi");
}