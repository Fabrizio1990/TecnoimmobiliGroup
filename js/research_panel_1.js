$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });


    $("#research_switch_icon_1").click(function(){

        $("#ico_research_on").removeClass("hidden");
        $("#ico_research_off").addClass("hidden");
        $("#ico_research_auction_on").addClass("hidden");
        $("#ico_research_auction_off").removeClass("hidden");
        $("#sel_contract").val(2);
        $('#sel_contract').selectpicker('refresh');
        $(".research_container .tabbed_widget").css("background-color","rgba(255, 255, 255, .95)");
    });

    $("#research_switch_icon_2").click(function(){

        $("#ico_research_on").addClass("hidden");
        $("#ico_research_off").removeClass("hidden");
        $("#ico_research_auction_on").removeClass("hidden");
        $("#ico_research_auction_off").addClass("hidden");


        $("#sel_contract").val(7);
        $('#sel_contract').selectpicker('refresh');
        $(".research_container .tabbed_widget").css("background-color","rgba(255, 255, 255, 1)");


    });


    var animating = false;
    var searchDetails = $("#search_details");

    $(".toggleSearchDetails").click(function(){
        var upArrow   = $(this).children(".glyphicon-chevron-up");
        var downArrow = $(this).children(".glyphicon-chevron-down");
        if(!animating) {
            animating = true;

            if(searchDetails.css("display") == "none"){
                upArrow.show();
                downArrow.hide();
            }else{
                upArrow.hide();
                downArrow.show();
            }

            searchDetails.animate({
                height: "toggle"
            }, 1000, function () {
                animating = false;
            });
        }
    });



    $('#input_town').typeahead({
        ajax: {
            url: BASE_PATH+'/ajax/townsJson.php',
            query: $('#input_town').val() ,
            loadingClass: "loading-circle",
            triggerLength: 1
        },
        onSelect: function(obj) {
            console.log(obj)
        }
    });



    $(".selectpicker").selectpicker().change(function() {
        $(this).valid();
    });
    //FORM VALIDATION
    form = $("#advanced_search").validate({
        ignore: [],
        //ignore: 'input[type=hidden]',/*,:not(select:hidden, input:visible, textarea:visible)*/
        rules:
            {
                /*--- SELECT ---*/
                // LOCATION
                sel_category            : { required: true },
                sel_contract            : { required: true },
                sel_tipology            : { required: true },


                /*--- INPUT ---*/
                input_town  : { required: true, minlength: 3, maxlength: 240 },
                priceFrom   : { number: true },
                priceTo     : { number: true },
                mqFrom      : { number: true },
                mqTo        : { number: true },

            },

        submitHandler: function(form) {
            var refLink = researchGetLink();

            var page = BASE_PATH+"/ajax/research_set_session.ajax.php";
            var params = $(form).serialize();

            params+="&sel_category="+$("#sel_category").val();
            params+="&sel_locals="+$("#sel_locals").val();
            params+="&sel_bathrooms="+$("#sel_bathrooms").val();
            params+="&sel_property_status="+$("#sel_property_status").val();
            params+="&sel_garden="+$("#sel_garden").val();
            params+="&sel_elevator="+$("#sel_elevator").val();
            params+="&sel_box="+$("#sel_box").val();



            ajaxCall(page,params,refLink,researchSet,researchNotSet,"POST");
        },
        invalidHandler: function(event, validator) {
            console.log("NOT VALID");
        },errorPlacement: function(error, element) {
            // NON VOGLIO VISUALIZZARE ERRORI SCRITTI
        }

    });

    function researchSet(res,link){
        //console.log(link);
        document.location.href = link;

    }
    function researchNotSet(){
        openInfoModal(5,"Errore!","è avvenuto un errore durante la ricerca, riprova a breve.","Chiudi");
    }


    function researchGetLink(){

        var category,contract,tipology,town,locals,bathrooms,property_status,garden,elevator,box;

        category    = $('#sel_category option:selected').text();
        contract    = $('#sel_contract option:selected').text();
        tipology    = $('#sel_tipology option:selected').text();
        town        = $('#input_town').val();


        locals              = $('#sel_locals option:selected').text();
        bathrooms           = $('#sel_bathrooms option:selected').text();
        property_status     = $('#sel_property_status option:selected').text();
        garden              = $('#sel_garden option:selected').text();
        elevator            = $('#sel_elevator option:selected').text();
        box                 = $('#sel_box option:selected').text();

        var refLink =BASE_PATH+"/"+contract+"/"+category+"/"+tipology+"/"+town+"/filtri/criterio=abilitati";

        if($('#sel_locals').val()!="")  refLink+="&locali="+locals;
        if($('#sel_bathrooms').val()!="")  refLink+="&bagni="+bathrooms;
        if($('#sel_property_status').val()!="")  refLink+="&statoImmobile="+property_status;
        if($('#sel_garden').val()!="")  refLink+="&giardino="+garden;
        if($('#sel_elevator').val()!="")  refLink+="&ascensore="+elevator;
        if($('#sel_box').val()!="")  refLink+="&postoAuto="+box;


        return refLink;
    }

});