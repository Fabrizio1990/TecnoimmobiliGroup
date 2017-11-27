/**
 * Created by fabri on 27/11/2017.
 */
$("#sel_order_filter").change(function(e){

    if($("#inp_h_order").length){
        $("#inp_h_order").val($(e.target).val());
        $("#btn_search").click();
    }


});