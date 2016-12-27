// elem         = select to populate
// category     = request category identifier (see ajax/form/get_opts.ajax.php for all categories)
// action       = request action id , defined on inherent category class
// id_parent    = if i need to filter option by parent id
// header_opt   = if i need first paramenter to be a coustom string es: "select a option"
function getOpts(elem,category,action,id_parent = null,header_opt = null){

    elem = GEBI(elem);
    if(id_parent!="%"){
        page = BASE_PATH + "/ajax/form/get_opts.ajax.php";
        params = "id_action="+action+"&id_category="+category;
        if(id_parent!=null) params+="&id_parent="+id_parent
        callback_params = new Array(elem,"%",header_opt);


        ajaxCall(page,
            params,
            callback_params,
            populateSelectByJson,// defined in UTILS.js
            null,
            "POST"
        );
    }

}


// header_opt   = if i need first paramenter to be a coustom string es: "select a option"
function getVal(elem,category,action,id_parent){

    elem = GEBI(elem);
    if(id_parent!="%" && id_parent!="") {
        page = BASE_PATH + "/ajax/form/get_val.ajax.php";
        params = "id_action=" + action + "&id_category=" + category;
        if (id_parent != null) params += "&id=" + id_parent
        callback_params = new Array(elem);


        ajaxCall(page,
            params,
            callback_params,
            function (response, params) {
                console.log("response =" + response + "   - elemento =" + params[0]);
                console.log(GEBI(params[0]));
                GEBI(params[0]).value = response
            },// defined in UTILS.js
            null,
            "POST"
        );
    }
}

function saveNewOptVal(elem,category,action,id_parent=null){
    elem = GEBI(elem);
    if(elem.value!=""){
        page = BASE_PATH + "/ajax/form/save_opt_val.ajax.php";
        params = "id_action="+action+"&id_category="+category+"&val="+encodeURIComponent(val);
        if(id_parent!=null) params+="&id_parent="+id_parent
        callback_params = new Array(elem,"%",header_opt);

        ajaxCall(page,
            params,
            callback_params,
            populateSelectByJson,// defined in UTILS.js
            null,
            "POST"
        );
    }
}
