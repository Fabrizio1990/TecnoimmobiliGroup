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


function load_page(page,container = null,callback = null,callback_params = null,method = 'get'){
    container = GEBI(container);
    http=new XMLHttpRequest();
    http.open(method,page);
    http.send();
    http.onreadystatechange=function(){
        if (http.readyState == 4 && http.status == 200) {
            if(container!= null)
                container.innerHTML = this.responseText;
            if (callback)
                callback(http.responseText.trim(), callback_params);
        }
    }
};


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
    console.log(arr_params[3]);
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
            if(arr_params[3].constructor === Array){
                if(arr_params[3].indexOf(json_val[i].value) > -1)
                    opt.selected =true;
            }else
            if(arr_params[3] == json_val[i].value)opt.selected =true;
        }
        // then append it to the select element
        sel.appendChild(opt);
    }
}


function fileNameFromUrl(url){
    return url.substring(url.lastIndexOf('/')+1);
}

function removeUrlParameters(url){
    return url.replace(/\?.*$/,"").replace(/.*\//,"");
}

var currencyFormatter = new Intl.NumberFormat('it-IT', {
    style: 'currency',
    currency: 'Eur',
    minimumFractionDigits: 0,
});

//alert(currencyFormatter.format(3490000)); /* $349.00 */


function formatCurrencyInput(inputID){
    var elem = GEBI(inputID);
    var format_val = currencyFormatter.format(elem.value);
    elem.value = format_val;
}



/* DOCUMENT READY IN JAVASCRIPT */

//These are various forms of usage:
//
//// pass a function reference
//    docReady(fn);
//
//// use an anonymous function
//docReady(function() {
//    // code here
//});
//
//// pass a function reference and a context
//// the context will be passed to the function as the first argument
//docReady(fn, context);
//
//// use an anonymous function with a context
//docReady(function(ctx) {
//    // code here that can use the context argument that was passed to docReady
//}, context);
//
//docReady(fn) can be called as many times as desired and each callback function will be
//called in order when the DOM is done being parsed and is ready for manipulation.
//
//                                                                       If you call docReady(fn) after the DOM is already ready, the callback with be executed
//as soon as the current thread of execution finishes by using setTimeout(fn, 1).
(function(funcName, baseObj) {
    "use strict";
    // The public function name defaults to window.docReady
    // but you can modify the last line of this function to pass in a different object or method name
    // if you want to put them in a different namespace and those will be used instead of
    // window.docReady(...)
    funcName = funcName || "docReady";
    baseObj = baseObj || window;
    var readyList = [];
    var readyFired = false;
    var readyEventHandlersInstalled = false;

    // call this when the document is ready
    // this function protects itself against being called more than once
    function ready() {
        if (!readyFired) {
            // this must be set to true before we start calling callbacks
            readyFired = true;
            for (var i = 0; i < readyList.length; i++) {
                // if a callback here happens to add new ready handlers,
                // the docReady() function will see that it already fired
                // and will schedule the callback to run right after
                // this event loop finishes so all handlers will still execute
                // in order and no new ones will be added to the readyList
                // while we are processing the list
                readyList[i].fn.call(window, readyList[i].ctx);
            }
            // allow any closures held by these functions to free
            readyList = [];
        }
    }

    function readyStateChange() {
        if ( document.readyState === "complete" ) {
            ready();
        }
    }

    // This is the one public interface
    // docReady(fn, context);
    // the context argument is optional - if present, it will be passed
    // as an argument to the callback
    baseObj[funcName] = function(callback, context) {
        // if ready has already fired, then just schedule the callback
        // to fire asynchronously, but right away
        if (readyFired) {
            setTimeout(function() {callback(context);}, 1);
            return;
        } else {
            // add the function and context to the list
            readyList.push({fn: callback, ctx: context});
        }
        // if document already ready to go, schedule the ready function to run
        // IE only safe when readyState is "complete", others safe when readyState is "interactive"
        if (document.readyState === "complete" || (!document.attachEvent && document.readyState === "interactive")) {
            setTimeout(ready, 1);
        } else if (!readyEventHandlersInstalled) {
            // otherwise if we don't have event handlers installed, install them
            if (document.addEventListener) {
                // first choice is DOMContentLoaded event
                document.addEventListener("DOMContentLoaded", ready, false);
                // backup is window load event
                window.addEventListener("load", ready, false);
            } else {
                // must be IE
                document.attachEvent("onreadystatechange", readyStateChange);
                window.attachEvent("onload", ready);
            }
            readyEventHandlersInstalled = true;
        }
    }
})("docReady", window);
// modify this previous line to pass in your own method name
// and object for the method to be attached to