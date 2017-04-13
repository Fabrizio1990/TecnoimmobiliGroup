


function getTipologies(elem,defVal=null,defTxt =null){
    elem = $(elem);
    var val 			= elem.select2?elem.select2("val"):elem.val();

    var sel_tipology 	= GEBI("sel_tipology");
    //i will mantain selected items
    var sel_jq = $("#sel_tipology");
    var selectedOpts = sel_jq.select2?sel_jq.select2("val"):sel_jq.val();


    // truncate the select
    sel_tipology.options.length = 0;
    // and populate it only if i have select a category
    if(val!=null)
        getOpts(sel_tipology,'ads_tipologies',val,defVal,defTxt,selectedOpts);
}

function getRegions(elem,defVal=null,defTxt =null,callback_fn = null){

    if(elem == null || elem == undefined){
        elem = $("#sel_country");
    }else{
        if(!(elem instanceof jQuery))
            elem = $(elem);
    }

    var val 			= elem.select2?elem.select2("val"):elem.val();

    var sel_region 		= GEBI("sel_region");
    var sel_city 		= GEBI("sel_city");
    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");

    //i will mantain selected items
    var sel_jq = $("#sel_region");
    var isMultiple = sel_jq.prop("multiple");
    var selectedOpts = sel_jq.select2?sel_jq.select2("val"):sel_jq.val();

    //----

    var selectedOptsCity = $("#sel_city").select2?$("#sel_city").select2("val"):$("#sel_city").val();


    callback_fn = function(){
        if(selectedOptsCity != null && selectedOptsCity != "" && isMultiple){
            getCities(elem,null,null);
        }
    };


    // truncate the select
    sel_region.options.length = 0;
    // and populate it only if i have select a country
    if(val!=null)
        getOpts(sel_region,'geo_region',val,defVal,defTxt,selectedOpts,callback_fn);
    //truncate all other selects that depends from country
    if(!isMultiple || selectedOptsCity == null || selectedOptsCity == ""){
        if(sel_city)sel_city.options.length = 0;
        if(sel_town)sel_town.options.length = 0;
        if(sel_district)sel_district.options.length = 0;
    }
}

function getCities(elem = null,defVal=null,defTxt =null,callback_fn = null){
    if(elem == null || elem == undefined){
        elem = $("#sel_region");
    }else{
        if(!(elem instanceof jQuery))
            elem = $(elem);
    }



    var val 			= elem.select2?elem.select2("val"):elem.val();

    var sel_city 		= GEBI("sel_city");
    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");

    //i will mantain selected items
    var sel_jq = $("#sel_city");
    var isMultiple = sel_jq.prop("multiple");
    var selectedOpts = sel_jq.select2?sel_jq.select2("val"):sel_jq.val();

    var selectedOptsTown = $("#sel_town").select2?$("#sel_town").select2("val"):$("#sel_town").val();
    callback_fn = function(){
        if(selectedOptsTown != null && selectedOptsTown!="" && isMultiple){
            getTowns();
        }
    };


    // truncate the select
    sel_city.options.length = 0;
    // and populate it only if i have select a Region
    if(val!=null)
        getOpts(sel_city,'geo_city',val,defVal,defTxt,selectedOpts,callback_fn);
    //truncate all other selects that depends from Region
    if( !isMultiple || selectedOptsTown == null || selectedOptsTown == "") {
        if (sel_town)sel_town.options.length = 0;
        if (sel_district)sel_district.options.length = 0;
    }
}

function getTowns(elem = null,defVal=null,defTxt =null,callback_fn = null){
    if(elem == null || elem == undefined){
        elem = $("#sel_city");
    }else{
    if(!(elem instanceof jQuery))
        elem = $(elem);
    }
    var val 			= elem.select2?elem.select2("val"):elem.val();

    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");

    //i will mantain selected items
    var sel_jq = $("#sel_town");
    var isMultiple = sel_jq.prop("multiple");
    var selectedOpts = sel_jq.select2?sel_jq.select2("val"):sel_jq.val();

    var selectedOptsDistrict = $("#sel_district").select2?$("#sel_district").select2("val"):$("#sel_district").val();

    callback_fn = function(){
        if(selectedOptsDistrict != null && selectedOptsDistrict != "" && isMultiple){
            getDistricts();
        }
    };
    // truncate the select
    sel_town.options.length = 0;
    // and populate it only if i have select a city
    if(val!=null)
        getOpts(sel_town,'geo_town',val,defVal,defTxt,selectedOpts,callback_fn);
    //truncate all other selects that depends from city
    if(!isMultiple ||selectedOptsDistrict == null || selectedOptsDistrict == "")
        if(sel_district)sel_district.options.length = 0;
}

function getDistricts(elem,defVal=null,defTxt =null,callback_fn = null){
    console.log("chiamo getDistricts");
    if(elem == null || elem == undefined){
        elem = $("#sel_town");
    }else{
        if(!(elem instanceof jQuery))
            elem = $(elem);
    }

    var val 			= elem.select2?elem.select2("val"):elem.val();

    var sel_district 	= GEBI("sel_district");

    //i will mantain selected items
    var sel_jq = $("#sel_district");
    var selectedOpts = sel_jq.select2?sel_jq.select2("val"):sel_jq.val();


    // truncate the select
    sel_district.options.length = 0;
    // and populate it only if i have select a town
    if(val!=null)
        getOpts(sel_district,'geo_district',val,defVal,defTxt,selectedOpts);
}





