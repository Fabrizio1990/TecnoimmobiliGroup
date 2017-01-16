


function getTipologies(elem,defVal=null,defTxt =null){
    var val 			= $(elem).select2("val");
    var sel_tipology 	= GEBI("sel_tipology");
    // truncate the select
    sel_tipology.options.length = 0;
    // and populate it only if i have select a category
    if(val!=null)
        getOpts(sel_tipology,'ads_tipologies',val,defVal,defTxt);
}

function getRegions(elem,defVal=null,defTxt =null){
    var val 			= $(elem).select2("val");

    var sel_region 		= GEBI("sel_region");
    var sel_city 		= GEBI("sel_city");
    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");
    // truncate the select
    sel_region.options.length = 0;
    // and populate it only if i have select a country
    if(val!=null)
        getOpts(sel_region,'geo_region',val,defVal,defTxt);
    //truncate all other selects that depends from country
    if(sel_city)sel_city.options.length = 0;
    if(sel_town)sel_town.options.length = 0;
    if(sel_district)sel_district.options.length = 0;
}

function getCities(elem,defVal=null,defTxt =null){
    var val 			= $(elem).select2("val");

    var sel_city 		= GEBI("sel_city");
    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");
    // truncate the select
    sel_city.options.length = 0;
    // and populate it only if i have select a Region
    if(val!=null)
        getOpts(sel_city,'geo_city',val,defVal,defTxt);
    //truncate all other selects that depends from Region
    if(sel_town)sel_town.options.length = 0;
    if(sel_district)sel_district.options.length = 0;
}

function getTowns(elem,defVal=null,defTxt =null){
    var val 			= $(elem).select2("val");

    var sel_town 		= GEBI("sel_town");
    var sel_district 	= GEBI("sel_district");
    // truncate the select
    sel_town.options.length = 0;
    // and populate it only if i have select a city
    if(val!=null)
        getOpts(sel_town,'geo_town',val,defVal,defTxt);
    //truncate all other selects that depends from city
    if(sel_district)sel_district.options.length = 0;
}

function getDistricts(elem,defVal=null,defTxt =null){
    var val 			= $(elem).select2("val");

    var sel_district 	= GEBI("sel_district");
    // truncate the select
    sel_district.options.length = 0;
    // and populate it only if i have select a town
    if(val!=null)
        getOpts(sel_district,'geo_district',val,defVal,defTxt);
}





