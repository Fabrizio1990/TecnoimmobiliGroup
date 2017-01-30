/**
 * Created by Developer on 11/01/2017.
 */

function saveNews(){
    var title   = GEBI("inp_editor_title").value;
    var txt     = CKEDITOR.instances.editor1.getData();
    var id_edit = $("#id_edit_news").val();
    var edit    = id_edit!=""?"&id_news="+id_edit:"";

    var savePage = BASE_PATH+"/AdminPanel/ajax/news_management_save.ajax.php";
    var params = "title="+encodeURIComponent(title)+"&text="+encodeURIComponent(txt)+edit;
    ajaxCall(savePage,params,null,newsSaved,null,"POST");
}

function newsSaved(resp){
    if(resp=="1"||resp=="0")
        openInfoModal(2,"Successo","La news è stata salvata con successo","Chiudi",function(){window.location.reload();});
    else
        openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni.");
}

function deleteNews(id){
    var page = BASE_PATH+"/AdminPanel/ajax/news_management_delete.ajax.php";
    var params = "id_news="+id;
    ajaxCall(page,params,null,newsDeleted,null,"POST");
}
function newsDeleted(resp){
    if(resp=="1"||resp=="0")
        openInfoModal(2,"Successo","La news è stata eliminata con successo","Chiudi",function(){window.location.reload();});
    else
        openInfoModal(5,"Errore!","è avvenuto un errore durante la rimozione delle informazioni.");
}

$(document).ready(function () {

    $( ".timeline-item" ).each(function(index,elem){
        //console.log(elem);

        var footerEl = $(elem).append("<div class='timeline-footer'></div>")
            .children(".timeline-footer")
            .append
        (
            "<div class='btn-group'>"+
                "<button type='button' class='btn btn-info edit_news'>" +
                    "<i class='fa fa-edit'></i>"+
                "</button>"+
                "<button type='button' onclick='deleteNews($(this).closest(\".timeline-item\").children(\".id_news\").val())' class='btn btn-danger delete_news'>" +
                    "<i class='fa fa-remove'></i>"+
                "</button>"+
            "</div>"
        );
    });

    $( ".edit_news" ).bind( "click", function() {
        moveToEdit($(this).closest(".timeline-item"));
    });
});


function moveToEdit(elem){
    var id_news     = elem.find(".id_news").val();
    var title       = elem.find(".timeline-header").html();
    var description = elem.find(".timeline-body").html();

    $("#id_edit_news").val(id_news);
    $("#inp_editor_title").val(title);
    CKEDITOR.instances.editor1.setData(description);

    createUndoEditBtn();
}

function undoEdit(){
    toggleUndoEditBtn();
    $("#id_edit_news").val("");
}

function createUndoEditBtn(){
    if($( "#btn_editor_undo_edit" ).length){
        var btn_undo = $( "#btn_editor_undo_edit" );
        if(btn_undo.hasClass("HIDDEN")) btn_undo.removeClass("HIDDEN");
    }else{
        $(".box-footer").append('<button type="button" class="btn btn-primary" id="btn_editor_undo_edit" onclick="undoEdit()">Annulla Modifica</button>');
    }
}

function toggleUndoEditBtn(){
    if($( "#btn_editor_undo_edit" ).length){
        var btn_undo = $( "#btn_editor_undo_edit" );
        if(btn_undo.hasClass("HIDDEN")){
            btn_undo.removeClass("HIDDEN");
        }else{
            $("#inp_editor_title").val("");
            CKEDITOR.instances.editor1.setData("");
            btn_undo.addClass("HIDDEN");
        }
    }else{
        $(".box-footer").append('<button type="button" class="btn btn-primary" id="btn_editor_undo_edit" onclick="undoEdit()">Annulla Modifica</button>');
    }
}




