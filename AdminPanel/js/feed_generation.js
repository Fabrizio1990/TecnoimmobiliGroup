/**
 * Created by fabri on 21/03/2018.
 */

var feeds;


$(document).ready(function(){
    getAllFeeds();
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
        feeds = resp;
        console.log(feeds);
    },null,"POST");
}


function generateAllFeeds(){
    openInfoModal(5,"Errore Feed","E' avvenuto un errore nella generazione dei feed, attendi '1 minuto' che i dati vengano recuperati e riprova.<br>Se il problema persiste contatta il webmaster")
}

function OnFeedsGenerated(){

}

function GenerateFeed(portalName){
    if(feeds == ""){

    }
}

function OnFeedGenerated(){

}