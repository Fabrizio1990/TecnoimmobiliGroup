

$(document).ready(function () {

    //if no conversion setted i will load one
    /*if($(".row_conversion").length == 0)
    AddConversionRow();*/


    //BIND ADD CONVERSION BUTTON
    $('.btn_add_conversion').on('click', function () {
        AddConversionRow();
    });

    //BIND SAVE CONVERSIONS BUTTON
    $('.btn_save_conversions').on('click', function () {
        saveConversions();
    });



    //BIND SINGLE DELETE CONVERSION BUTTON
    $('.CONVERSION_BOX').on('click',".delete_conversion", function () {
        var btnPressed   = $(this);
        var parentRow    = btnPressed.closest(".row");
        removeConversion(parentRow);
    });


    //BIND SINGLE SAVE CONVERSION BUTTON
    $('.CONVERSION_BOX').on('click',".save_conversion", function () {
        var btnPressed   = $(this);
        var parentRow    = btnPressed.closest(".row");
        var id_portal    = $("#id_portal").val();
        var table        = parentRow.find(".sel_category").val();
        var defVal       = parentRow.find(".sel_default_value").val();
        var convertedVal = parentRow.find(".inp_converted_value").val();
        var conversionIdField = parentRow.find(".id_conversion");
        saveConversion(id_portal,table,defVal,convertedVal,conversionIdField);
    });



    // ONCHANGE (table select) i will get the field select options
    $(".CONVERSION_BOX").on("change",".sel_category",function(ev){
        console.log("CHANGE");
        getTableValues($(this));
    });

});


function getTableValues(categorySel){
    var page = SITE_URL+"/AdminPanel/ajax/opts/get_conversion_opts.ajax.php";
    var params = "category="+categorySel.val();
    var nextSel = categorySel.closest(".row").find(".sel_default_value");

    ajaxCall(page,params,nextSel,pupulateSelect,null,"POST");
}

// POPULATE SELECT WITH NEW VALUES (AJAX CALLBACK)
function pupulateSelect(resp,sel){
    sel.empty();
    sel.val('');
    sel.append(resp);
}

// ADD NEW CONVERSION ROW ON PAGE
function AddConversionRow(){
    load_page(SITE_URL+"/AdminPanel/include/contents/subcontents/add_portal_conversion_row.inc.php",null,function(page){
        $("#form_conversions").append(page);
        //var inserted =$("#feed_container .FEED_BOX").last();
    });
}

// ------------- SAVE CONVERSION (MULTIPLE AD SINGLE)------------
function saveConversions() {
    var page = SITE_URL+"/AdminPanel/ajax/portal_save_conversions.ajax.php";
    var params = $("#form_conversions").serialize();

    ajaxCall(page,params,null,conversionsSaved,null,"POST");
}
function saveConversion(id_portal,table,defVal,convertedVal,conversionIdField) {
    var page = SITE_URL+"/AdminPanel/ajax/portal_save_conversions.ajax.php";
    var params = "id_portal="+id_portal+"&sel_category[]="+table+"&sel_default_value[]="+defVal+"&inp_converted_value[]="+convertedVal;

    ajaxCall(page,params,conversionIdField,conversionSaved,null,"POST");
}

function conversionsSaved(resp){
    console.log("conversionsSaved");
    console.log(resp);
    openInfoModal(2,"Successo","Le conversioni sono state Salvate con successo","Chiudi",function(){window.location.reload();});
}
function conversionSaved(resp,conversionIdField){
    console.log("conversionSaved");
    if(resp != "0" && resp > 0){
        $(conversionIdField).val(resp);
    }
    console.log(resp);
}

// ------------- SAVE CONVERSION END------------

// ------------- REMOVE CONVERSION (MULTIPLE AD SINGLE)------------
function removeConversion(row){
    //TODO CHIAMA ALTRA FUNZIONE CHE MOSTRA ALERT (SI VUOLE RIMUOVERE ?) e SE SI CHIAMA QUESTA FUNZIONE
    console.log(row);
    var id_conversion = $(row).find(".id_conversion").val();
    console.log("rimuovo conversione con id "+id_conversion);
    var page = SITE_URL+"/AdminPanel/ajax/portal_delete_conversions.ajax.php";
    var params = "id_conversion="+id_conversion;
    ajaxCall(page,params,row,conversionDeleted,null,"POST");
}

function removeConversions(){
    console.log("rimuovo conversioni");
}


function conversionDeleted(resp,row){
    console.log("RESP = "+ resp);
    //if(resp != "" && resp > 0 )
        row.remove();
}


