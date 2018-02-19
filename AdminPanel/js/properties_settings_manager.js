var rnd = Math.random(1,100);
var img_ads_stats =
	["",BASE_PATH+"/AdminPanel/images/icons/ico_ads_on.png" + "?" + rnd,
		BASE_PATH+"/AdminPanel/images/icons/ico_ads_off.png" + "?" + rnd,
		BASE_PATH+"/AdminPanel/images/icons/ico_ads_del.png" + "?" + rnd,
		BASE_PATH+"/AdminPanel/images/icons/ico_ads_draft.png" + "?" + rnd
	];

var img_news_stats = [
	BASE_PATH+"/AdminPanel/images/icons/ico_newspaper_off.png" + "?" + rnd,
	BASE_PATH+"/AdminPanel/images/icons/ico_newspaper_on.png" + "?" + rnd

];

var img_portal_stats = [
	BASE_PATH+"/AdminPanel/images/icons/ico_portal_off.png" + "?" + rnd,
	BASE_PATH+"/AdminPanel/images/icons/ico_portal_on.png" + "?" + rnd
];


// ADS STATUS
function openAdsStatusSwitch(idAds,currentStatus,elem){

	sel = $("<select id='sel_status'></select>");
	var body = sel;
	openModal(0,"Imposta il nuovo stato",body,
		function(){ // save click function
			saveAdsStatus(idAds,elem);
		},"Chiudi","Salva",false,
		function(){getOpts("sel_status","ads_status",null,null,"Seleziona un valore",currentStatus)
	});

}

function saveAdsStatus(idAds,elem){
	var newStatus = GEBI("sel_status").value;
	if(newStatus != "%")
		ajaxCall("../AdminPanel/ajax/switch_properties_settings.ajax.php?field=ads_status&id=" + idAds + "&status="+ newStatus + "&rand=" + Math.random(),null,new Array(idAds,newStatus,elem),UpdateAdsStatusIcon,ajax_fail);
	else
		alert("Seleziona uno status");
}


function UpdateAdsStatusIcon(strRes,params){
	if(parseInt(strRes)>0){

		if(params[1] == 3) // se eliminato ricarico la pagina
            table.ajax.reload();
		else // altrimenti metto l' immagine relativa al nuovo stato
            GEBI(params[2]).src = img_ads_stats[params[1]]+"?"+Math.random(1,100);
		hideModal("myModal");
	}
	else{
		console.log("Lo stato dell annuncio non è stato modificato, controlla che non sia già in quello stato ");
	}
}

// NEWS STATUS
//passo l' elemento immagine(elem) perchè in modalità responsive non renderizza la nuova immagine se modifico l' src facendo il document.getelementbyid
function SwitchNewsStatus(id,elem) {
	var newStatus = GEBI("magazine_status_" + id).value == 0?1:0;
	console.log("newStatus = "  + newStatus);
	ajaxCall("../AdminPanel/ajax/switch_ads_properties.ajax.php?field=magazine_status&id=" + id + "&status=" + newStatus + "&rand=" + Math.random(), null, new Array( id, newStatus, elem), SwitchNewsStatusAction, ajax_fail);
}

function SwitchNewsStatusAction(strRes,params){
	if(parseInt(strRes)>0) {
		GEBI("magazine_status_" + params[0]).value = params[1];
		GEBI(params[2]).src = img_news_stats[params[1]]+"?"+Math.random(1,100);
	}else
		console.log("Lo stato della rivista per quest annuncio non è stato modificato, controlla che non sia già in quello stato ");
}

// PORTALS STATUS
function SwitchPortalStatus(id,elem){
	var newStatus = GEBI("ads_portal_status_" + id).value == 0?1:0;
	console.log("newStatus = "  + newStatus);
	ajaxCall("../AdminPanel/ajax/switch_properties_settings.ajax.php?field=ads_portal_status&id=" + id + "&status=" + newStatus + "&rand=" + Math.random(), null, new Array( id, newStatus, elem), SwitchPortalStatusAction, ajax_fail);

}


function SwitchPortalStatusAction(strRes,params){
	if(parseInt(strRes)>0) {
		GEBI("ads_portal_status_" + params[0]).value = params[1];
		GEBI(params[2]).src = img_portal_stats[params[1]]+"?"+Math.random(1,100);
	}else
		console.log("Lo stato della rivista per quest annuncio non è stato modificato, controlla che non sia già in quello stato ");

}




