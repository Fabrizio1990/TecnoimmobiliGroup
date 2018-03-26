/**
 * Created by fabri on 21/03/2018.
 */

var feeds;
var feedsLen = 0;


$(document).ready(function(){
    getAllFeeds();


    $("#btn_feed_generation").bind("click",generateAllFeeds);

    //generateAllFeeds();
})


function getPortals(){

}

function getFeeds(portalName){

}

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
    // SE I FEED SONO STATI RICARICATI CHIAMO LA FUNZIONE RICORSIVA E APRO LA MODALE
    $("#btn_feed_generation").attr("disabled",true);
    var xhr = generateFeedRecursive();
    openInfoModal(1,"Generazione Feed","","Chiudi",
        function(){
        $("#btn_feed_generation").attr("disabled",false);
        //xhr.abort();
    });

}

function OnAllFeedsGenerated(){
    console.log("Generati tutti");
    $("#btn_feed_generation").attr("disabled",false);

}

function generateFeedRecursive(index = 0){
    if(index >= feedsLen){
        OnAllFeedsGenerated();
        return;
    }

    var page = SITE_URL+"/_OTHER/FEED_XML/feed_controller.php";
    var params ="portal="+feeds[index].portal_name +"&feed="+feeds[index].feed_name;
    return ajaxCall(page,params,index,OnFeedRecursiveGenerated,OnGenerationFailed,"POST")

}

function OnFeedRecursiveGenerated(resp,idx){
    console.log("DONE idx = "+idx);
    //Console.log("generato feed "+feeds[idx]["feed_name"]);
    var nextIdx = ++idx;
    generateFeedRecursive(nextIdx);
}

function  OnGenerationFailed(resp) {

    console.log("FAIIIIL");
}



function generateFeed(portalName,feedName){
    if(feeds == ""){
        openInfoModal(5,"Errore Feed","E' avvenuto un errore nella generazione dei feed, attendi '1 minuto' che i dati vengano recuperati e riprova.<br>Se il problema persiste contatta il webmaster");
    }
}

function OnFeedGenerated(){

}