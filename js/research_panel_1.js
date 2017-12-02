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



    $("#advanced_search .selectpicker").selectpicker().change(function() {
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

            var location = splitTownDistrict($("#input_town").val());

            var page = BASE_PATH+"/ajax/research_set_session.ajax.php";
            var params = "";
            params+="sel_contract="+$("#sel_contract").val();
            params+="&sel_category="+$("#sel_category").val();
            params+="&sel_tipology="+$("#sel_tipology").val();
            params+="&input_town="+encodeURIComponent(location[0].trim());
            params+="&input_district="+ (location.length>1?encodeURIComponent(location[1].trim()):"");
            params+="&priceFrom="+$("#priceFrom").val();
            params+="&priceTo="+$("#priceTo").val();
            params+="&mqFrom="+$("#mqFrom").val();
            params+="&mqTo="+$("#mqTo").val();
            params+="&sel_locals="+$("#sel_locals").val();
            params+="&sel_bathrooms="+$("#sel_bathrooms").val();
            params+="&sel_conditions="+$("#sel_conditions").val();
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
        document.location.href = link;
    }

    function researchNotSet(){
        openInfoModal(5,"Errore!","è avvenuto un errore durante la ricerca, riprova a breve.","Chiudi");
    }


    function researchGetLink(){

        var category,contract,tipology,town,district,locals,priceFrom,priceTo,mqFrom,mqTo,bathrooms,conditions,garden,elevator,box,order;

        var location = splitTownDistrict($("#input_town").val());

        category    = $('#sel_category option:selected').text();
        contract    = $('#sel_contract option:selected').text();
        tipology    = $('#sel_tipology option:selected').text();
        town        = encodeURIComponent(location[0].trim());
        district    = location.length>1?encodeURIComponent(location[1].trim()):"";
        priceFrom   = $('#priceFrom').val();
        priceTo     = $('#priceTo').val()
        mqFrom      = $('#mqFrom').val();
        mqTo        = $('#mqTo').val();



        locals              = $('#sel_locals option:selected').text();
        bathrooms           = $('#sel_bathrooms option:selected').text();
        conditions          = $('#sel_conditions option:selected').text();
        garden              = $('#sel_garden option:selected').text();
        elevator            = $('#sel_elevator option:selected').text();
        box                 = $('#sel_box option:selected').text();
        order               = encodeURIComponent($("#inp_h_order").length ?$("#inp_h_order").val():"date_up|asc");

        var refLink =BASE_PATH+"/"+category+"/"+contract+"/"+tipology+"/"+town+"/filtri/campoOrdinamento="+order;

        if(district!="")  refLink+="&zona="+district;
        if(priceFrom!="")  refLink+="&prezzoMinimo="+priceFrom;
        if(priceTo!="")  refLink+="&prezzoMassimo="+priceTo;
        if(mqFrom!="")  refLink+="&superficieMinima="+mqFrom;
        if(mqTo!="")  refLink+="&superficieMassima="+mqTo;

        if($('#sel_locals').val()!="")  refLink+="&locali="+locals;
        if($('#sel_bathrooms').val()!="")  refLink+="&bagni="+bathrooms.replace(" Bagni","");
        if($('#sel_conditions').val()!="")  refLink+="&condizioni="+conditions;
        if($('#sel_garden').val()!="")  refLink+="&giardino="+garden;
        if($('#sel_elevator').val()!="")  refLink+="&ascensore="+elevator;
        if($('#sel_box').val()!="")  refLink+="&postoAuto="+box;


        return refLink;
    }


    function splitTownDistrict(txt,splitChar =","){
        return txt.split(splitChar);
    }

});