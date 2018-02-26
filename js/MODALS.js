/* modal types:
 1 -> PRIMARY
 2 -> INFO
 3 -> WARNING
 4 -> SUCCESS
 5 -> DANGER
 DEF -> NORMAL WHITE MODAL

*/
// ##################  MODAL FUNCTIONS ####################
// TYPE 		= TIPO MODALE DA APRIRE (CAMBIA SOLO IL COLORE)
// TITLE 		= TITOLO MODALE
// BODY 		= CORPO MODALE
// btnSaveFunc 	= funzione da chiamare alla pressione del tasto start es: function(){console.log("SALVATO")}
// btnCloseTxt 	= TESTO PULSANTE CHIUDI
// btnSaveTxt 	= TESTO PULSANTE SALVA
// hidden		= SE TRUE APRE LA MODALE NASCOSTA
// callback		= EVENTUALE FUNZIONE DA CHIAMARE DOPO L' APERTURA DELLA MODALE
function openModal(type,title,body,btnSaveFunc = null,btnCloseTxt = "Chiudi",btnSaveTxt = "Salva",hidden = false,callback = null){
    var modalId = "myModal";
    //  if modal already exist populate it with data
    if ( $( "#" + modalId ).length ) {
        setModalData(modalId,type,title,body,btnSaveFunc,btnCloseTxt ,btnSaveTxt);
        if(callback!=null)callback();
        if(!hidden)showModal(modalId);
    //  else get modal from page and populate data
    }else{
        var modalUrl = SITE_URL + "/app/include/Templates/modal.php";
        var params = "title="+title+"&body="+body+"&closeTxt="+btnCloseTxt+"&saveTxt="+btnSaveTxt;
        $.get( modalUrl + "?" + params, function( data ) {
            $("body").append( data );
            setModalData(modalId,type,title,body,btnSaveFunc,btnCloseTxt ,btnSaveTxt);
            if(callback!=null)callback();
            if(!hidden)showModal(modalId);
        });
    }
}

function setModalData(id,type,title,body,btnSaveFunc = null,btnCloseTxt = "Chiudi",btnSaveTxt = "Salva"){
    $( "#" + id + " .modal-title" ).text(title);
    //USO text("").append(body) perchè svuoto il contenuto prima di fare l' append
    // serve l' append invece che il text perchè altrimenti non mi fa inserire elementi html come select create da jquery
    $( "#" + id + " .modal-body" ).text("").append(body);
    $( "#" + id + " .modal_close" ).text(btnCloseTxt);
    $( "#" + id + " .modal_save" ).text(btnSaveTxt);
    if(btnSaveFunc!=null){
        $( "#" + id + " .modal_save" ).unbind( "click");
        $( "#" + id + " .modal_save" ).bind( "click", function() {btnSaveFunc();});
    }
    setModalType(id,type);
}
// ##########################################################



// ################## INFO MODAL FUNCTIONS ####################

function openInfoModal(type,title,body,btnCloseTxt = "Chiudi",btnCloseFunc = null,hidden = false,callback = null){
    var modalId = "myModalInfo";
    // if modal already exist populate it with data
    if ( $( "#" + modalId ).length ) {
        setInfoModalData(modalId,type,title,body,btnCloseTxt,btnCloseFunc);
        if(callback!=null)callback();
        if(!hidden)showModal(modalId);
    // else get modal from page and populate data
    }else{
        var modalUrl = SITE_URL + "/app/include/Templates/modal_info.php";
        var params = "title="+title+"&body="+body+"&closeTxt="+btnCloseTxt;
        $.get( modalUrl + "?" + params, function( data ) {
            $("body").append( data );
            setInfoModalData(modalId,type,title,body,btnCloseTxt,btnCloseFunc);
            if(callback!=null)callback();
            if(!hidden)showModal(modalId);
        });
    }
}


function setInfoModalData(id,type,title,body,btnCloseTxt ,btnCloseFunc) {

    setModalType(id,type);


    $("#" + id + " .modal-title").text(title);
    //USO text("").append(body) perchè svuoto il contenuto prima di fare l' append
    // serve l' append invece che il text perchè altrimenti non mi fa inserire elementi html come select create da jquery
    $("#" + id + " .modal-body").text("").append(body);

    $("#" + id + " .modal_close").text(btnCloseTxt);



    if(btnCloseFunc!=null) {
        $("#" + id + " .modal_close").unbind("click");
        $("#" + id + " .modal_close").bind("click", function () {
            btnCloseFunc();
        });
    }


}

// ##########################################################


// ################## GENERIC FUNCTIONS ####################

function setModalType(id,type){
    var cls = "";
    switch(type){
        case 0:     //PRIMARY
           $("#" + id +" button ").removeClass("btn-outline").addClass("btn-default");
            break;
        case 1:     //PRIMARY
            $("#" + id +" button ").removeClass("btn-default").addClass("btn-outline");
            cls = "modal-primary";
            break;
        case 2:     //INFO
            $("#" + id +" button ").removeClass("btn-default").addClass("btn-outline");
            cls = "modal-info";
            break;
        case 3:     //WARNING
            $("#" + id +" button ").removeClass("btn-default").addClass("btn-outline");
            cls = "modal-warning";
            break;
        case 4:     //SUCCESS
            $("#" + id +" button ").removeClass("btn-default").addClass("btn-outline");
            cls = "modal-success";
            break;
        case 5:     //DANGER
            $("#" + id +" button ").removeClass("btn-default").addClass("btn-outline");
            cls = "modal-danger";
            break;
        default :
            break;
    }

    elem = $("#" + id);
    elem.removeClass("modal-danger modal-success modal-warning modal-info modal-primary");
    if(cls!="") {

        elem.addClass(cls);
    }
}

function showModal(id){
    $("#"+id).modal('hide');
    $("#"+id).modal('show');
}

function hideModal(id){
    $("#"+id).modal('hide');
}

function deleteModal(id){
    $("#"+id).remove();
}

// ##########################################################