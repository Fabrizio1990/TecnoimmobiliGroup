/**
 * Created by fabri on 19/03/2018.
 */
$(document).ready(function () {
    $("#send_csv").on("click",sendCsv);


});


function sendCsv(){
    var page = SITE_URL+"/AdminPanel/ajax/add_portal_parse_conversion_csv.ajax.php";
    var formData,inputFile;
    var file,fieldDelimiter,useHeader,allowEmpty;

    inputFile = document.getElementById("conversionCSV");
    file = inputFile.files[0];
    fieldDelimiter = document.getElementById("separator").value;
    useHeader = $("#use_header").bootstrapSwitch('state');
    allowEmpty = $("#allow_empty_conversion").bootstrapSwitch('state');

    if(file != undefined) {
        formData = new FormData();
        formData.append("prova", "testoprovaacaso");
        formData.append("conversionCSV", file);
        formData.append("fieldDelimiter",fieldDelimiter);
        formData.append("useHeader",useHeader);
        formData.append("allowEmpty",allowEmpty);
    }

    ajaxCall(page,formData,null,csvSent,null,"POST",false);
    //ad bg loader
    $(".content-wrapper").append(
        "<div class='BG_HOVER_BLACK'><img class='LOADING_GIF_150' src='"+ SITE_URL+"/images/loading_gifs/loading_2_150x150.gif" +"' /></div>"
    );
}

function csvSent(resp){
    console.log(resp);
    if(resp =="Success"){
        openInfoModal(4,"Success","Il file è stato processato correttamente");
    }else{
        openInfoModal(5,"Errore durante il parsing del file",resp);
    }
    $(".BG_HOVER_BLACK").remove();
}
