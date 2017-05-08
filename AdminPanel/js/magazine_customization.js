var property_card_template = "";
const magazine_properties_container = $("#sortable");
//const non_magazine_properties_container = "";
$(function() {

    getPropertyCard();

});


// get property card template and start function getMagazineProperties
function getPropertyCard(){

    load_page(BASE_PATH+"/AdminPanel/include/widgets/magazine_property_card.inc.php",null,
        function(resp){
            property_card_template = resp;
            getMagazineProperties();
        })
}

// get all properties on magazine ( this willi be called when card template is loaded)
function getMagazineProperties(enabled = 1){
    magazine_properties_container.empty();
    var url = BASE_PATH+"/AdminPanel/ajax/get_properties_custom_magazine.inc.php";
    var params = "enabled=" + enabled;

    ajaxCall(url,params,null,writeMagazineView,null,"POST");
}

// write magazine view on page (called from getMagazineProperties)
function writeMagazineView(resp){

    var jsonRes = JSON.parse(resp);
    var view = "";
    for(var i = 0 , len = jsonRes.length ; i<len ; i++){
        var current_card = property_card_template;
        var img_url = BASE_PATH + "/public/images/images_properties/normal/" + jsonRes[i].img_path
        current_card = current_card.replace("{tipology}",jsonRes[i].tipology);
        current_card = current_card.replace("{contract}",jsonRes[i].contract);
        current_card = current_card.replace("{town}",jsonRes[i].town);
        current_card = current_card.replace("{price}",jsonRes[i].price);
        current_card = current_card.replace("{img_path}", img_url);
        view += current_card;
    }
    magazine_properties_container.append(view);

}

function refreshViews(){
    table.reload();
    writeMagazineView();
}