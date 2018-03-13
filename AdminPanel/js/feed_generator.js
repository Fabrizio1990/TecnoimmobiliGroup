/**
 * Created by fabri on 12/03/2018.
 */
//FEED CREATION AJAX CALL
function createFeedByName(portalName,feedName){

    /*var url = SITE_URL+"/http://localhost/Tecnoimmobili/Tecnoimmobiligroup_nuovo/_OTHER/FEED_XML/feed_controller.php?portal=casa.it&feed=immobili";*/
    ajaxCall(url,null,null,onFeedCreated());
}

function createFeedByLink(creationUrl){

    ajaxCall(creationUrl,null,null,onFeedCreated());
}


//ON FEED CREATED METHOD
function onFeedCreated(resp){

}