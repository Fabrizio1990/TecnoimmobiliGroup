var id_portal;


var img_portal_stats = [
    SITE_URL+"/AdminPanel/images/icons/ico_portal_off.png" + "?" + rnd,
    SITE_URL+"/AdminPanel/images/icons/ico_portal_on.png" + "?" + rnd
];

$( document ).ready(function() {
    id_portal = $("#id_portal").val();
});

function submitFilter(){
	var sel_agency = $("#sel_agency"),sel_category = $("#sel_category"),selTipology = $("#sel_tipology"),sel_country = $("#sel_country"),sel_region = $("#sel_region"),sel_city = $("#sel_city"),sel_town = $("#sel_town"),sel_district = $("#sel_district"),sel_ads_status = $("#sel_ads_status");

	var dtRange_from 	= moment($('#sel_dateRange').data('daterangepicker').startDate._d).format('YYYY-MM-DD HH:mm:ss');
	var dtRange_to		= moment($('#sel_dateRange').data('daterangepicker').endDate._d).format('YYYY-MM-DD HH:mm:ss');
	var agency_val			= sel_agency.select2("val")!=null ? "" + sel_agency.select2("val"):"";
	var category_val		= sel_category.select2("val")!=null ?"" + sel_category.select2("val"):"";
	var tipology_val		= selTipology.select2("val")!=null ?"" + selTipology.select2("val"):"";
	var country_val			= sel_country.select2("val")!=null ?"" + sel_country.select2("val"):"";
	var region_val			= sel_region.select2("val")!=null ?"" + sel_region.select2("val"):"";
	var city_val			= sel_city.select2("val")!=null ?"" + sel_city.select2("val"):"";
	var town_val			= sel_town.select2("val")!=null ?"" + sel_town.select2("val"):"";
    var district_val 		= sel_district.select2("val")!=null ?"" + sel_district.select2("val"):"";
	var ads_status_val		= sel_ads_status.select2("val")!=null ?"" + sel_ads_status.select2("val"):"";


	var params = "id_portal="+id_portal+"&dt_from=" + encodeURIComponent(dtRange_from) + "&dt_to=" + encodeURIComponent(dtRange_to) + "&agency=" +	encodeURIComponent(agency_val) + "&category=" + encodeURIComponent(category_val) + "&tipology=" +	encodeURIComponent(tipology_val) +"&country="+encodeURIComponent(country_val)+"&region="+encodeURIComponent(region_val)+ "&city=" +	encodeURIComponent(city_val) + "&town=" + encodeURIComponent(town_val) + "&district=" +	encodeURIComponent(district_val) + "&ads_status=" +	encodeURIComponent(ads_status_val) + "&rnd=" +Math.random();

	table.ajax.url( SITE_URL+'/AdminPanel/ajax/get_properties_on_portal_datatable.ajax.php?'+ params ).load();

}

function switchPropertyOnPortalStatus(elem,id_portal,id_property){
    var page = SITE_URL+"/AdminPanel/ajax/switch_property_on_portal.ajax.php";
    var params ="id_property="+ id_property +"&id_portal="+id_portal+"&rnd=" +Math.random();
    ajaxCall(page,params,elem,switchPropertyOnPortalStatusAction,ajax_fail,"POST")
}

function switchPropertyOnPortalStatusAction(strRes,elem){
	console.log("RES = "+strRes);
    if(parseInt(strRes)>= 0) {
        GEBI(elem).src = img_portal_stats[strRes]+"?"+Math.random(1,100);
    }else
        console.log("E' avvenuto un errore sconosciuto");

}