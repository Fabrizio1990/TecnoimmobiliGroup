var property_card_template = "";
const magazine_properties_container = $("#sortable");
const non_magazine_properties_container = $("#not_on_magazine");
$(function() {
    var currentOrder;
    // INIT JQUERY TOUCH PUNCH (JQUERY SHORTABLE FOR MOBILE ALSO)
    $( "#sortable" ).sortable({
        start: function(evt, ui) {
            currentOrder = getElementOrder(ui.item);
            //console.log("START ORDER = " +getElementOrder(ui.item));
        },
        /*drag: function(evt, ui) {
            console.log(ui.item);
        },*/
        stop: function(evt, ui) {
            var elem = ui.item;
            var desiredOrder = getElementOrder(elem);
            if(currentOrder != desiredOrder){
                var id = elem.find("input[type=hidden]").val();
                //console.log("id = "+ id);
                switchPropertyMagazineOrder(elem,id,1,desiredOrder);
            }
            //console.log("END ORDER = " +getElementOrder(ui.item));
        }
    });
    $( "#sortable" ).disableSelection();


    getPropertyCards();

});




// get property card template and start function getMagazineProperties
function getPropertyCards(){

    load_page(SITE_URL+"/AdminPanel/include/widgets/magazine_property_card.inc.php",null,
        function(resp){
            property_card_template = resp;
            getMagazineProperties(1);// get properties on magazine
            getMagazineProperties(0);// get properties not on magazine

        })
}

// get all properties on magazine ( this willi be called when card template is loaded)
function getMagazineProperties(enabled = 1){
    var container =null;
    if(enabled == 1)
        container = magazine_properties_container;
    else
        container = non_magazine_properties_container;
    container.empty();
    var url = SITE_URL+"/AdminPanel/ajax/get_properties_custom_magazine.ajax.php";
    var params = "enabled=" + enabled;

    ajaxCall(url,params,new Array(container,enabled),writeMagazineView,null,"POST");
}

// write magazine view on page (called from getMagazineProperties)
function writeMagazineView(resp,params){

    var jsonRes = JSON.parse(resp);
    var view = "";
    for(var i = 0 , len = jsonRes.length ; i<len ; i++){
        var current_card = property_card_template;


        var img_url = SITE_URL + "/public/images/images_properties/normal/" + jsonRes[i].img_path
        current_card = current_card.replace("{item_id}",jsonRes[i].id_magazine);
        current_card = current_card.replace("{tipology}",jsonRes[i].tipology);
        current_card = current_card.replace("{contract}",jsonRes[i].contract);
        current_card = current_card.replace("{town}",jsonRes[i].town);
        current_card = current_card.replace("{price}",jsonRes[i].price);
        current_card = current_card.replace("{img_path}", img_url);
        var new_card = params[0].append(current_card);

        // VISUALIZZO O IL TASTO RIMUOVI O AGGIUNGI IN BASE A QUALE SET DI ANNUNCI STO
        // MOSTRANDO
        if(params[1] == 1)
            $(new_card).find(".btn_remove").removeClass("HIDDEN");
        else
            new_card.find(".btn_add").removeClass("HIDDEN");

    }

    /*$(".magazine_card").click(function() {
        alert("Index: " + $(this).index());
    });*/


}

// Set also status and order ( if you want only change order set newStatus to 1 "enabled")
function switchPropertyMagazineStatus(magazine_card,id,newStatus,newOrder){
    //console.log(magazine_card);
    var url = SITE_URL+"/AdminPanel/ajax/magazine_custom_switch_status.ajax.php";
    var callback = newStatus==1?addOnMagazine:removeFromMagazine;
    var params = "id="+id+"&status="+newStatus+"&order="+newOrder;

    ajaxCall(url,params,new Array(magazine_card),callback,null,"POST");
}

function switchPropertyMagazineOrder(magazine_card,id,newStatus,newOrder){
    var url = SITE_URL+"/AdminPanel/ajax/magazine_custom_switch_status.ajax.php";
    var params = "id="+id+"&status="+newStatus+"&order="+newOrder;

    ajaxCall(url,params,new Array(magazine_card),null,null,"POST");
}


function removeFromMagazine(resp,params){
    var magazine_card = params[0];
    non_magazine_properties_container.prepend(magazine_card);
    magazine_card.find(".btn_add").removeClass("HIDDEN");
    magazine_card.find(".btn_remove").addClass("HIDDEN");

}

function addOnMagazine(resp,params){

    var magazine_card = params[0];
    magazine_properties_container.prepend(magazine_card);

    magazine_card.find(".btn_remove").removeClass("HIDDEN");
    magazine_card.find(".btn_add").addClass("HIDDEN");

}

function getElementOrder(elem){
    return elem.index()+1;
}

