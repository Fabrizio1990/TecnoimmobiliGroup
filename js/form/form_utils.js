// elem         = select to populate
// action       = request action id , defined on inherent category class
// id_parent    = if i need to filter option by parent id
// header_opt   = if i need first parameter to be a coustom string es: "select a option"
function getOpts(elem,action,id_parent = null,header_opt_val = null,header_opt_txt = null,selected = null,callback= null,callback_par = null){
    if(callback != null) {
        /*console.log("c è un callback ed è :");
        console.log(callback);*/

    }
        page = SITE_URL + "/ajax/form/get_opts.ajax.php";
        params = "id_action="+action;
        //console.log("----"+id_parent);
        if(id_parent!=null){
            if(id_parent.constructor === Array)  id_parent = id_parent.join();
            params+="&id_parent="+id_parent;
        }else{
            params+="&1=2";
        }
        callback_params = new Array(elem,header_opt_val,header_opt_txt,selected);


            callback_func = function(resp,params,callback_par){
                populateSelectByJson(resp,params); // THIS WILL BE TRIGGERED ANYWAY
                if(callback != null) {
                    /*console.log("c è un callback i parametri sono :");
                    console.log(callback_par);*/
                    callback(callback_par); // THIS IS OPTIONAL (SENT FROM PARAMETERS)
                }
            }

        ajaxCall(page,
            params,
            callback_params,
            callback_func,// defined in UTILS.js
            null,
            "POST"
        );


}


// header_opt   = if i need first paramenter to be a coustom string es: "select a option"
function getVal(elem,category,action,id_parent){

    elem = GEBI(elem);
    if(id_parent!="%" && id_parent!="") {
        page = SITE_URL + "/ajax/form/get_val.ajax.php";
        params = "id_action=" + action + "&id_category=" + category;
        if (id_parent != null) params += "&id=" + id_parent
        callback_params = new Array(elem);


        ajaxCall(page,
            params,
            callback_params,
            function (response, params) {
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
        page = SITE_URL + "/ajax/form/save_opt_val.ajax.php";
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
