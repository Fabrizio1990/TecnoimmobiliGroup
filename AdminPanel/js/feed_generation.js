/**
 * Created by fabri on 21/03/2018.
 */

var feeds;
var feedsLen = 0;


var currendFeedList;
var isGenerating = false;

$(document).ready(function(){
    getAllFeeds();


    $("#btn_feed_generation").bind("click",setupAllFeedGeneration);

    //PRE CARICO LA MODALE DI GENERAZIONE PORTALI
    openInfoModal(1,"Generazione Feed","","Chiudi",null,true);
});


function getAllFeeds(){

    var ajaxUrl = SITE_URL+"/AdminPanel/ajax/portal_feeds_info.ajax.php";
    var params = "ACTION=get_all_feeds";
    ajaxCall(ajaxUrl,params,null,function (resp) {
        feeds = JSON.parse(resp);
        console.log(feeds);
        feedsLen = feeds.length;

    },null,"POST");
}

function setupAllFeedGeneration(){
    currendFeedList = feeds;
    generateAllFeeds();
}

//GENERAZIONE DI TUTTI I FEEDS
function generateAllFeeds(){
    console.log("CALL GENERATE ALL FEEDS");
    //SE I FEED NON SONO STATI ANCORA CARICATI RITORNO UN ERRORE ED ESCO DALLA FUNZIONE
    if(currendFeedList == ""){
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
    //SE L' INDICE SUPERA LA DIMENSIONE DELL' ARRAY DEI FEED HO FINITO
    if(index >= currendFeedList.length){
        OnAllFeedsGenerated();
    }else if(currendFeedList[index].enabled == 0){//SE il portale non è abilitato passo al prossimo feed
        console.log("SONO QUI "+currendFeedList[index].enabled);
        var nextIdx = index +1;
        generateFeedRecursive(nextIdx);
        return;
    }else{//ALTRIMENTI GENERO IL PROSSIMO FEED
        var page = SITE_URL+"/_OTHER/FEED_XML/feed_controller.php";
        var params ="portal="+currendFeedList[index].portal_name +"&feed="+currendFeedList[index].feed_name;
        //APPEND DELLA RIGA RELATIVA AL FEED NELLA MODALE
        appendPortalGenerationInfo(index);
        ajaxCall(page,params,index,OnFeedRecursiveGenerated,OnGenerationFailed,"POST")
    }
}


function OnFeedRecursiveGenerated(resp,feedIndex){
    setGenerationInfoDone(feedIndex);
    var nextIdx = feedIndex+1;
    generateFeedRecursive(nextIdx);
}

function  OnGenerationFailed(resp) {

    alert("FAIIIIL");
}


//GENERAZIONE DEI FEED DI UN SINGOLO PORTALE
function generatePortalFeeds(portalId){
    //SETTO LA LISTA DEI FEED APPARTENENTI AL PORTALE NELL ARRAY GLOBALE
    currendFeedList = getPortalFeedsList(portalId);
    generateAllFeeds();
}


// RITORNA LA LISTA DEI FEED LEGATI A UN PORTALE
function getPortalFeedsList(portalId){
    var ret = new Array();
    for(var i = 0 ; i < feedsLen; i++){
        if(feeds[i].id_portal == portalId){
            ret.push(feeds[i]);
        }
    }
    return ret;
}

function appendPortalGenerationInfo(feedIdx){
    var generationID = getGenerationID(feedIdx);
    $("#myModalInfo .modal-body").append("<div class='row'><div class='col-md-3'>"+currendFeedList[feedIdx].portal_name+"</div><div class='col-md-3'>"+currendFeedList[feedIdx].feed_name+currendFeedList[feedIdx].feed_extension+"</div><div class='col-md-6' id='"+generationID+"'>Generazione...</div></div>");
}

function setGenerationInfoDone(feedIdx){
    var generationID = getGenerationID(feedIdx);
    var generationElem = $("#"+generationID);
    generationElem.empty();
    generationElem.append("Completata");
}

function getGenerationID(feedIdx){
    return "generation_status_"+currendFeedList[feedIdx].id_portal+"_"+currendFeedList[feedIdx].id;
}