/**
 * Created by fabri on 21/03/2018.
 */

var feeds;
var feedsLen = 0;
var isGenerating = false;

$(document).ready(function(){
    getAllFeeds();


    $("#btn_feed_generation").bind("click",generateAllFeeds);

    //generateAllFeeds();
    //PRE CARICO LA MODALE DI GENERAZIONE PORTALI
    openInfoModal(1,"Generazione Feed","","Chiudi",null,true);
});


function getAllFeeds(){

    var ajaxUrl = SITE_URL+"/AdminPanel/ajax/portal_feeds_info.ajax.php";
    var params = "ACTION=get_all_feeds";
    ajaxCall(ajaxUrl,params,null,function (resp) {
        feeds = JSON.parse(resp);
        feedsLen = feeds.length;

    },null,"POST");
}

//GENERAZIONE DI TUTTI I FEEDS
function generateAllFeeds(){
    //SE I FEED NON SONO STATI ANCORA CARICATI RITORNO UN ERRORE ED ESCO DALLA FUNZIONE
    if(feeds == ""){
        openInfoModal(5,"Errore Feed","E' avvenuto un errore nella generazione dei feed, attendi '1 minuto' che i dati vengano recuperati e riprova.<br>Se il problema persiste contatta il webmaster");
        return;
    }
    //SE STO GIA' GENERANDO I FEED ALLORA APRO SOLO LA MODALE
    if(isGenerating){
        showModal("myModalInfo");
    }else{//ALTRIMENTI LI GENERO
        isGenerating = true;
        //CANCELLO L' EVENTUALE TESTO DI PRECEDENTI GENERAZIONI NELLA MODALE
        $("#myModalInfo .modal-body").empty();
        //$("#btn_feed_generation").attr("disabled",true);
        openInfoModal(1,"Generazione Feed","","Chiudi");
        generateFeedRecursive();
    }

}

function OnAllFeedsGenerated(){
    console.log("Generati tutti");
    $("#myModalInfo .modal-body").append("<h2>Generazione feed completata</h2>");
    isGenerating = false;
    //$("#btn_feed_generation").attr("disabled",false);

}

function generateFeedRecursive(index = 0){


    if(index >= feedsLen){
        OnAllFeedsGenerated();
    }else{

        var page = SITE_URL+"/_OTHER/FEED_XML/feed_controller.php";
        var params ="portal="+feeds[index].portal_name +"&feed="+feeds[index].feed_name;
        //APPEND DELLA RIGA RELATIVA AL FEED NELLA MODALE
        appendPortalGenerationInfo(index);

        console.log("HO FATTO l' APPEND");
        console.log("GENERO FEED " +feeds[index].portal_name);

        return ajaxCall(page,params,index,OnFeedRecursiveGenerated,OnGenerationFailed,"POST")
    }

}

function OnFeedRecursiveGenerated(resp,idx){
    console.log("DONE idx = "+idx);
    setGenerationInfoDone(idx);
    var nextIdx = idx+1;
    generateFeedRecursive(nextIdx);
}

function  OnGenerationFailed(resp) {

    console.log("FAIIIIL");
}

function appendPortalGenerationInfo(feedIdx){
    var generationID = getGenerationID(feedIdx);
    $("#myModalInfo .modal-body").append("<div class='row'><div class='col-md-3'>"+feeds[feedIdx].portal_name+"</div><div class='col-md-3'>"+feeds[feedIdx].feed_name+feeds[feedIdx].feed_extension+"</div><div class='col-md-6' id='"+generationID+"'>Generazione...</div></div>");
}

function setGenerationInfoDone(feedIdx){
    var generationID = getGenerationID(feedIdx);
    var generationElem = $("#"+generationID);
    generationElem.empty();
    generationElem.append("Completata");
}

function getGenerationID(feedIdx){
    console.log(feedIdx);
    return "generation_status_"+feeds[feedIdx].id_portal+"_"+feeds[feedIdx].id;
}




function generateFeed(portalName,feedName){
    if(feeds == ""){
        openInfoModal(5,"Errore Feed","E' avvenuto un errore nella generazione dei feed, attendi '1 minuto' che i dati vengano recuperati e riprova.<br>Se il problema persiste contatta il webmaster");
    }
}

function OnFeedGenerated(){

}