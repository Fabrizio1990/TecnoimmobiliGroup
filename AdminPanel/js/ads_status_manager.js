

var img_portal_stats = [BASE_PATH+"AdminPanel/icons/ico_portal_on.png",BASE_PATH+"AdminPanel/icons/ico_portal_off.png"];
var img_ads_stats = [BASE_PATH+"AdminPanel/icons/ico_ads_on.png",BASE_PATH+"AdminPanel/icons/ico_ads_off.png"];
var img_news_stats = [BASE_PATH+"AdminPanel/icons/ico_newspaper_on.png",BASE_PATH+"AdminPanel/icons/ico_newspaper_off.png"];


function SwitchAdsStatus(id){
	id_annuncio = id;
	ajaxCall("../AdminPanel/ajax/switch_ads_status.ajax.php?id=" + id + "&rand=" + Math.random(),null,id,SwitchAdsStatusAction);
}


function SwitchAdsStatusAction(strRes,id_ads){
	if(strRes % 1 === 0) document.getElementById("ads_status_img_"+id_ads).src=img_ads_stats[strRes];
	else alert("error :"+strRes);
	
}


function SwitchNewsStatus(id){
	id_annuncio = id;
	ajaxCall("../AdminPanel/ajax/switch_news_status.ajax.php?id=" + id + "&rand=" + Math.random(),null,id,SwitchNewsStatusAction);
}


function SwitchNewsStatusAction(strRes,id_ads){
	if(strRes % 1 === 0) document.getElementById("news_status_img_"+id_ads).src=img_news_stats[strRes];
	else alert("error :"+strRes);
	
}

function SwitchPortalStatus(id){
	id_annuncio = id;
	ajaxCall("../AdminPanel/ajax/switch_portal_status.ajax.php?id=" + id + "&rand=" + Math.random(),null,id,SwitchPortalStatusAction);
	document.getElementById("portal_status_img_"+id).src="../images/loading_48x48.gif";
}


function SwitchPortalStatusAction(strRes,id_ads){
	if(strRes % 1 === 0) document.getElementById("portal_status_img_"+id_ads).src=img_portal_stats[strRes];
	else alert("error :"+strRes);
	
}

