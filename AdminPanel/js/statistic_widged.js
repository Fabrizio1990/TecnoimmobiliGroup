/* CHIAMTA CHE RECUPERA LE VISITE E LE STAMPA NEL WIDGET CHE MOSTRO IN OGNI PAGINA DEL PANNELLO DI AMMINISTRAZIONE */
var autoRefresh = true;
var statInterval;

var day_range = getDatePeriod("today");
var week_range = getDatePeriod("week");
var month_range = getDatePeriod("month");
var ever_range = getDatePeriod("ever");

$(document).ready(function(){
	//console.log("ready");
	init();
	setRefresh(statInterval);
});


function init(){
	getVisitWidget(day_range[0],day_range[1],"WSTAT_D");
	getVisitWidget(week_range[0],week_range[1],"WSTAT_W");
	getVisitWidget(month_range[0],month_range[1],"WSTAT_M");
	getVisitWidget(ever_range[0],ever_range[1],"WSTAT_E");
}

function setRefresh(stat){
	if (autoRefresh){
		statInterval = setInterval(function(){
			init();
		},10000);
	}else{
		clearInterval(statInterval)
	}
}

function getVisitWidget(date_from,date_to,elem){
	page = SITE_URL+"/AdminPanel/ajax/getNavigationCount.ajax.php?rand=" + Math.random();
	params = "DATE_FROM="+date_from+"&DATE_TO="+date_to;
	
	ajaxCall(page,params,elem,showVisitWidget,null,"POST")	
}

function showVisitWidget(val,elem){
	document.getElementById(elem).innerHTML = val;
}