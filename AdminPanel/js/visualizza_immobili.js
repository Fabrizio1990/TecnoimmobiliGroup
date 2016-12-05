


function submitFilter(){
	console.log("submit");
	var dtRange_from 	= moment($('#sel_dateRange').data('daterangepicker').startDate._d).format('YYYY-MM-DD HH:mm:ss');
	var dtRange_to		= moment($('#sel_dateRange').data('daterangepicker').endDate._d).format('YYYY-MM-DD HH:mm:ss');
	var filiale			= $("#sel_filiale").select2("val")!=null ? "" + $("#sel_filiale").select2("val"):""; // concateno "" per trasformare in stringa
	var categoria		= $("#sel_categoria").select2("val")!=null ?"" + $("#sel_categoria").select2("val"):"";
	var tipologia		= $("#sel_tipologia").select2("val")!=null ?"" + $("#sel_tipologia").select2("val"):"";
	var provincia		= $("#sel_provincia").select2("val")!=null ?"" + $("#sel_provincia").select2("val"):"";
	var comune			= $("#sel_comune").select2("val")!=null ?"" + $("#sel_comune").select2("val"):"";
	var zona 			= $("#sel_zona").select2("val")!=null ?"" + $("#sel_zona").select2("val"):"";
	var stato_immobile	= $("#sel_stato").select2("val")!=null ?"" + $("#sel_stato").select2("val"):"";
	
	var params = "dt_from=" + encodeURIComponent(dtRange_from) + "&dt_to=" + encodeURIComponent(dtRange_to) + "&filiale=" +	encodeURIComponent(filiale) + "&categoria=" + encodeURIComponent(categoria) + "&tipologia=" +	encodeURIComponent(tipologia) + "&provincia=" +	encodeURIComponent(provincia) + "&comune=" + encodeURIComponent(comune) + "&zona=" +	encodeURIComponent(zona) + "&stato=" +	encodeURIComponent(stato_immobile) + "&rnd=" +Math.random();
	
	table.ajax.url( '../ajax/AdminPanel/get_ads_datatable.ajax.php?'+ params ).load();
	
	console.log("from = "+ dtRange_from);
	console.log("dtRange_to = "+ dtRange_to);
	console.log("filiale = "+ filiale);
	console.log("categoria = "+ categoria);
	console.log("tipologia = "+ tipologia);
	console.log("provincia = "+ provincia);
	console.log("comune = "+ comune);
	console.log("zona = "+ zona);
	console.log("stato_immobile = "+ stato_immobile);
	
}


