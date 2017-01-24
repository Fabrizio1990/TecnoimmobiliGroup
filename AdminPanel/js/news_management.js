/**
 * Created by Developer on 11/01/2017.
 */

function saveNews(){
    var title = GEBI("inp_editor_title").value;
    var txt = CKEDITOR.instances.editor1.getData();
    var savePage = BASE_PATH+"/AdminPanel/ajax/news_management_save.ajax.php";
    var params = "title="+encodeURIComponent(title)+"&text="+encodeURIComponent(txt);
    ajaxCall(savePage,params,null,newsSaved,null,"POST");
}

function newsSaved(resp){
    if(resp=="1")
        openInfoModal(2,"Salvato","La news è stata salvata con successo","Chiudi",function(){window.location.reload();});
    else
        openInfoModal(5,"Errore!","è avvenuto un errore durante il salvataggio delle informazioni.");

}
