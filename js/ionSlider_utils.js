/**
 * Created by Developer on 24/04/2017.
 */
function initSlider(id,minval,maxVal,minSelected,maxSelected,type = "double",step = 100 ,prefix = '€'){
    elem = JQGEBI(id);
    elem.ionRangeSlider({
        gird:true,
        min: minval,
        max: maxVal,
        from: minSelected,
        to: maxSelected,
        type: type,
        step: step,
        prefix: prefix,
        prettify: true,
        grid_snap: true,
        force_edges: true
    });
}


function getPriceMinVal(contract,category){

}
function getPriceMaxVal(contract,category){

}

function getMqMinVal(contract,category){

}
function getMqMaxVal(contract,category){

}