var BASE_PATH = "http://localhost/Tecnoimmobili/Tecnoimmobiligroup_nuovo";

var debug = true;
// OVERRIDE CONSOLE.LOG;
(function(){
    if(window.console && console.log){
        var old = console.log;
        console.log = function(){
            if(debug){
                Array.prototype.unshift.call(arguments, 'Report: ');
                old.apply(this, arguments)
            }
        }
    }
})();
// FINE OVERRIDE CONSOLE.LoG

function GEBI(HTML_OBJ) {
    if(typeof HTML_OBJ == "string") HTML_OBJ = document.getElementById(HTML_OBJ);
    return HTML_OBJ;
}

function hasClass(element, cls) {
    return (' ' + GEBI(element).className + ' ').indexOf(' ' + cls + ' ') > -1;
}

function removeClass(element,cls){
    element = GEBI(element);
    element.className =element.className.replace(new RegExp('(?:^|\\s)'+ cls + '(?:\\s|$)'), ' ');
}

function showHide(elem){
    elem = GEBI(elem);
    if(hasClass(elem, "DISPL_NONE"))
        removeClass(elem,"DISPL_NONE")
    else
        elem.className+="DISPL_NONE";
}

//parmetri:
//page = pagina da chiamare
//params = parametri da mandare in caso di post
//callback_params = parametri da ritornare alla funzione di callback_params
//success = callback success
//fail = callback fail
function ajaxCall(page,params = null,callback_params = null,success = null,fail = null,method ="GET"){
    var http;
    if (window.XMLHttpRequest)
        http = new XMLHttpRequest();
    else if (window.ActiveXObject)
        http = new ActiveXObject("Microsoft.XMLHTTP");

    if (http) {
        http.onreadystatechange = function(){
            if (http.readyState == 4 && http.status == 200) {
                //console.log(http.responseText.trim());
                if(success)success(http.responseText.trim(),callback_params);
            }
            else if (http.status !== 200 && http.status !==0) {
                if(fail)fail();
                console.log('Request failed.  Returned status of ' + http.status);
            }
        }
        http.open(method, page ,true);
        if(method=="POST"){
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        }
        http.send(params);
    }else{
        console.log("ajax non disponibile");
    }
}

function ajax_fail(par1){
    console.log(par1);
}


var dateToMysqlFormat = function(date){
    var year, month, day;
    year = String(date.getFullYear());
    month = String(date.getMonth() + 1);
    if (month.length == 1) {
        month = "0" + month;
    }
    day = String(date.getDate());
    if (day.length == 1) {
        day = "0" + day;
    }
    return year + "-" + month + "-" + day;
}


function populateSelectByJson(arrVal,arr_params){
    // arr_params 0 = selectID | 1 = def_opt value| 2 = def_opt text | 3 = selected
    sel = GEBI(arr_params[0]);

    json_val = JSON.parse(arrVal);
    sel.options.length = 0;

    // IF SPECIFIED , THIS CODE WILL APPEND A DEFAULT OPTION WITH DEFAULT VALUE
    if((arr_params[1]!=null && arr_params[2]!=null)){
        var def_opt = document.createElement("option");
        def_opt.value= arr_params[1];
        def_opt.innerHTML = arr_params[2];
        sel.appendChild(def_opt);
    }
    // APPEND ALL OPTIONS TO SELECT
    for(var i = 0, cnt = json_val.length; i < cnt ; i++){
        var opt = document.createElement("option");
        opt.value= json_val[i].value;
        opt.innerHTML = json_val[i].text; // whatever property it has
        if(arr_params[3]!=null){
            if(arr_params[3] == json_val[i].value)opt.selected =true;
        }
        // then append it to the select element
        sel.appendChild(opt);
    }
}