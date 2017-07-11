var page = "../AdminPanel/ajax/get_charts_data.ajax.php";

$(document).ready(function(){
    //SELECT 2 INIT
    $(".select2").select2();

    //DATERANGEPICKER INIT
    $('#sel_dateRange').daterangepicker(
        {
            locale: {
                format: 'DD-MM-YYYY'
            },
            startDate: moment().subtract(1, 'months').format("DD-MM-YYYY"),
        }
    ).on("change", function() {
        getVisitatorChart();
    });

    // GET AND WRITE GRAPH DATA
    getVisitatorChart();
    writeBrowserChart();


});

// recupera le date e chiama la funzione per scrivere il grafico
function getVisitatorChart(){
    var rangeLimit = 31;
    var dtRange_from 	= moment($('#sel_dateRange').data('daterangepicker').startDate._d);
    var dtRange_to		= moment($('#sel_dateRange').data('daterangepicker').endDate._d);

    var rangeDays = Math.abs(dtRange_from.diff(dtRange_to, 'days')+1);
    if(rangeDays > rangeLimit){
        openInfoModal(3,"Attenzione","Non puoi selezionare un range di date maggiore di " +rangeLimit +" giorni, altrimenti le intestazioni verrebbero sovrapposte");
    }else{
        writeVisitatorsChart(dtRange_from.format('YYYY-MM-DD'),dtRange_to.format('YYYY-MM-DD'));
    }
}

function writeVisitatorsChart(fromDate,toDate) {
    var params = "chartType=visitators&fromDate="+fromDate+"&toDate="+toDate;

    ajaxCall(page,params,null,visitsChart,null,"POST");
}

function writeBrowserChart(){
    var params = "chartType=browsers";

    ajaxCall(page,params,null,browserChart,null,"POST");
}

var visitsChart = function(dataset){
    dataset = JSON.parse(dataset);
    var labelsData = [];
    var datasetData = [];

    for(var i = 0 ,cnt = dataset.length;i<cnt;i++){
        labelsData.push(dataset[i].db_date);
        datasetData.push(parseInt(dataset[i].cnt));
    }

    var ctx = document.getElementById("Chart_visits").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels : labelsData,
            datasets: [{
                label: 'Visitatori',
                data: datasetData,
                backgroundColor: ["rgba(210,5,16,0.4)"]
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value) {if (value % 1 === 0) {return value;}}
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoSkip: false,
                        maxRotation: 90,
                        minRotation: 90
                    }
                }]
            }
        }

    });
};


var browserChart = function(dataset){
    dataset = JSON.parse(dataset);
    var labelsData = [];
    var datasetData = [];

    for(var i = 0 ,cnt = dataset.length;i<cnt;i++){
        labelsData.push(dataset[i].browser);
        datasetData.push(parseInt(dataset[i].cnt));
    }

    var ctx = document.getElementById("Chart_browser").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels : labelsData,
            datasets: [{
                data: datasetData,
                backgroundColor: [
                    'rgba(51, 122, 183, 0.4)',
                    'rgba(210,5,16,0.4)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }

    });
};



