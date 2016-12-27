$(function() {
    sel_country     = GEBI("SEL_COUNTRY");
    sel_region      = GEBI("SEL_REGION");
    sel_city        = GEBI("SEL_CITY");
    sel_town        = GEBI("SEL_TOWN");
    sel_district    = GEBI("SEL_DISTRICT");
    inp_istat       = GEBI("TXT_ISTAT");
    inp_cap         = GEBI("TXT_CAP");

    // sel_country must be initialized at launch


    //Add event listener for each select and reset the successive selects or input
    if(sel_country){
        getOpts(sel_country,'geo','country',null,"Seleziona");
        if(sel_region)
        sel_country.addEventListener("change",function(){
            getOpts(sel_region,'geo','region',this.value,"Seleziona");
            if(sel_city)sel_city.options.length = 0;
            if(sel_town)sel_town.options.length = 0;
            if(sel_district)sel_district.options.length = 0;
            if(inp_istat)inp_istat.value="";
            if(inp_cap)inp_cap.value="";
        });
    }

    if(sel_region && sel_city){
        sel_region.addEventListener("change",function(){
            getOpts(sel_city,'geo','city',this.value,"Seleziona");
            if(sel_town)sel_town.options.length = 0;
            if(sel_district)sel_district.options.length = 0;
            if(inp_istat)inp_istat.value="";
            if(inp_cap)inp_cap.value="";
        });
    }

    if(sel_city && sel_town){
        sel_city.addEventListener("change",function(){
            getOpts(sel_town,'geo','town',this.value,"Seleziona");
            if(sel_district)sel_district.options.length = 0;
            if(inp_istat)inp_istat.value="";
            if(inp_cap)inp_cap.value="";
        });
    }

    if(sel_town && sel_district){
        sel_town.addEventListener("change",function(){
            getOpts(sel_district,'geo','district',this.value,"Seleziona");
            getVal('TXT_ISTAT','geo','istat',this.value)
            if(inp_cap)inp_cap.value="";
        });
    }

    if(sel_district){
        sel_district.addEventListener("change",function(){
            getVal('TXT_CAP','geo','cap',this.value)
        });
    }

    if(GEBI("btn_save")){
        GEBI("btn_save").addEventListener("click",function(){
            saveGeo();
        });
    }

    tableList = $('#DT_GEO_LIST')./*on('xhr.dt', function ( e, settings, json, xhr ) {
     $('body').addClass("sidebar-collapse");
     }).*/
    DataTable({
        "language": {
            "url": "AdminPanel/plugins/datatables/localizations/italian.json"
        },
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "bDeferRender": true,
        "lengthMenu": [5, 10, 15,20,30],
        "pageLength": 10,
        "columnDefs": [
            { targets: "_all",className: "ALING_CENTER"}
        ]

    });





});


function saveGeo(){
    var action = document.getElementById("action").value;
    var id_category = "geo";
    var _params ="id_action="+action+"&id_category="+id_category;
    switch(action){
        case "country":
            var val = GEBI("txt_country").value;
            _params += "&val="+val;
            break;
        case "region":
            var id_parent = SEL_COUNTRY.value;
            var val = GEBI("txt_region").value;
            _params += "&id_parent=" + id_parent + "&val="+val;

            break;
        case "city":
            var id_parent = SEL_REGION.value;
            var val = GEBI("txt_city").value;
            var shortName = document.getElementById("txt_city_short").value;
            _params += "&id_parent=" + id_parent + "&val="+val +"&name_short=" + shortName;
            break;
        case "town":
            var id_parent = SEL_CITY.value;
            var val = GEBI("txt_town").value;
            var istat = document.getElementById("txt_istat").value;
            _params += "&id_parent=" + id_parent + "&val="+val + "&istat=" + istat;

            break;
        case "district":
            var id_parent = SEL_TOWN.value;
            var val = GEBI("txt_district").value;
            var cap = GEBI("txt_cap").value;
            _params += "&id_parent=" + id_parent + "&val=" + val + "&cap="+cap;
            break;
    }

        ajaxCall(page = BASE_PATH + "/ajax/form/save_opt_val.ajax.php",
            _params,
            null,
            function(){console.log("SALVATO")},// defined in UTILS.js
            null,
            "POST"
        );
}


function saveOption(elem,category,action,parent_id = null){
    elem_html = GEBI(elem);

}
