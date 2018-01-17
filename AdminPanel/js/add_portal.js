$(document).ready(function () {

    $('#inp_portal_hasContract').on('switchChange.bootstrapSwitch', function (event, state) {

        if(state)
            $(".CONTRACT_DATA").show();
        else{
            $(".CONTRACT_DATA").hide();
            // TODO reset di tutti gli input relativi
        }
    });



    $('#inp_portal_hasFtp').on('switchChange.bootstrapSwitch', function (event, state) {

        if(state)
            $(".FTP_INFO").show();
        else{
            $(".FTP_INFO").hide();
            // TODO reset di tutti gli input relativi
        }
    });

});