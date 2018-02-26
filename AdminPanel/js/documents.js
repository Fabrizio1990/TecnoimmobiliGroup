$(document).ready(function () {

    // BIND DELETE ONCLICK FUNCTION
    $(".delete_document").bind("click",function(e){
        var doc_id = $(this).siblings(".doc_id").val();
        deleteDoc(doc_id);
    });
    // BIND EDIT ONCLICK FUNCTION
    $(".edit_document").bind("click",function(e){
        $row = $(this).closest("tr");
        var doc_id = $(this).siblings(".doc_id").val();
        var title = $row.find(".doc_title").html();
        var description = $row.find(".doc_desc").html();
        moveToEdit(doc_id,title,description);
    });

    form = $("#form_document").validate({
        lang: 'it',
        rules: {
            inp_title           : { required: true },
            txt_description     : { required: true , minlength: 20, maxlength: 500  },
            inp_file: {
                required: function(element) {
                    return $("#inp_edit_id").val() =="";
                } ,
                extension: $("#valid_extensions").val()
            },
        },
        submitHandler: function(form) {
            saveDoc(form);
        },
        invalidHandler: function(event, validator) {
            openInfoModal(3,"Attenzione!","Alcuni campi non sono tati compilati correttamente , ricontrolla i dati e riprova");
        }
    });
});

// DELETE DOCK
function deleteDoc(doc_id){
    var url = SITE_URL+'/AdminPanel/ajax/document_delete.ajax.php';

    var success = function(resp){

        if(resp =="1")
            openInfoModal(1,"Documento Eliminato","Eliminazione documento avvenuta con successo","Chiudi",function(){window.location.reload()});
        else
            openInfoModal(5,"Attenzione!","E' avvenuto un errore  nell' eliminazione del documento");
    };

    var fail = function(resp){
        openInfoModal(5,"Attenzione!","E' avvenuto un errore  nella chiamata ");
    };

    ajaxCall(url,"doc_id="+doc_id,null,success,fail,"POST");
}




// SAVE / EDIT DOCK
function saveDoc(form){
    var uploadPage = SITE_URL+'/AdminPanel/ajax/document_save.ajax.php';
    var doc_id = document.getElementById("inp_edit_id").value;
    var title = document.getElementById("inp_title").value;
    var desc = document.getElementById("txt_description").value;
    var input = document.getElementById("inp_file");
    file = input.files[0];
    if((file != undefined && $("#inp_edit_id").val() == "")  ||($("#inp_edit_id").val() != "")){
        formData= new FormData();
        formData.append("inp_edit_id",doc_id);
        formData.append("inp_file", file);
        formData.append("inp_title",title);
        formData.append("txt_description",desc);

        $.ajax({
            url: uploadPage,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                if(data=="1")
                    openInfoModal(1,"Documento Salvato","Salvataggio avvenuto con successo","Chiudi",function(){window.location.reload()});
                else
                    openInfoModal(5,"Attenzione!","E' avvenuto un errore  nel salvataggio del documento");
            },
            error: function(){
                openInfoModal(5,"Attenzione!","E' avvenuto un errore  nella chiamata");
            }
        });
    }else{
        alert('Input something!');
    }
}


// MOVE ROW DATA TO SAVE PANEL
function moveToEdit(id,title, description){
    $("#inp_edit_id").val(id);
    $("#inp_title").val(title);
    $("#txt_description").val(description);
    createUndoEditBtn();
    scrollTO("#form_document",1000);
}

// FUNCTIONS FOR UNDO EDIT BUTTON
function undoEdit(){
    toggleUndoEditBtn();
    $("#inp_edit_id").val("");
}

function createUndoEditBtn(){
    if($("#btn_doc_undo_edit" ).length){
        var btn_undo = $( "#btn_doc_undo_edit" );
        if(btn_undo.hasClass("HIDDEN")) btn_undo.removeClass("HIDDEN");
    }else{
        $("#doc_panel .box-footer").append('<button type="button" class="btn btn-primary" id="btn_doc_undo_edit" onclick="undoEdit()">Annulla Modifica</button>');
    }
}

function toggleUndoEditBtn() {
    if ($("#btn_doc_undo_edit").length) {
        var btn_undo = $("#btn_doc_undo_edit");
        if (btn_undo.hasClass("HIDDEN")) {
            btn_undo.removeClass("HIDDEN");
        } else {
            $("#inp_title").val("");
            $("#txt_description").val("");
            btn_undo.addClass("HIDDEN");
        }
    } else {
        $("#doc_panel .box-footer").append('<button type="button" class="btn btn-primary" id="btn_doc_undo_edit" onclick="undoEdit()">Annulla Modifica</button>');
    }
}