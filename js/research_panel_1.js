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
    });

    $("#research_switch_icon_2").click(function(){

        $("#ico_research_on").addClass("hidden");
        $("#ico_research_off").removeClass("hidden");
        $("#ico_research_auction_on").removeClass("hidden");
        $("#ico_research_auction_off").addClass("hidden");

    });


    var animating = false;
    var searchDetails = $("#search_details");

    $("#toggleSearchDetails").click(function(){
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
            url: 'ajax/townsJson.php',
            query: $('#input_town').val() ,
            loadingClass: "loading-circle",
            triggerLength: 1
        },
        onSelect: function(obj) {
            console.log(obj)
        }
    });

});