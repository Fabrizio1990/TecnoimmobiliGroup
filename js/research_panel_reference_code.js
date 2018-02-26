function findPropertyByReferenceCode(){

    var refVal = document.getElementById("inp_search_property").value;
    if(refVal.length == 0 ){
        document.getElementById("search_by_ref_error").innerHTML = "Inserisci il coidce riferimento";
    }else if(refVal.length < 5)
        document.getElementById("search_by_ref_error").innerHTML = "Codice riferimento troppo corto";
    else{
        ajaxCall(SITE_URL+"/ajax/generateUrlFromRef.ajax.php","ref="+encodeURIComponent(refVal),null,propertyFound,propertyNotFound,"POST");
    }

}

function propertyFound(resp){
    if(resp.length>0 && resp!="" && resp!=0){
        document.location = resp;
    }else{
        document.getElementById("search_by_ref_error").innerHTML = "Riferimento non trovato";
    }
}

function propertyNotFound(resp){
    document.getElementById("search_by_ref_error").innerHTML = "è avvenuto un errore nella ricerca";
    console.log(resp);
}