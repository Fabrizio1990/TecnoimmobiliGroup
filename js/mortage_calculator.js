/**
 * Created by fabri on 29/04/2018.
 */

var MortageCalculator = function (_txtPriceAmount,_txtPeriodAmount,_selYears) {

    //var = privata , this = pubblica

    var isReady = false;

    this.txtPriceAmonut = _txtPriceAmount;
    this.txtPeriodAmount  = _txtPeriodAmount;
    this.selYears         = _selYears;

    var fixedRate = 0;
    var variableRate = 0;

    var balance = 0;
    var rate = 0;
    var term = 0;
    var period = 0;

    this.getTaxes = function (){
        var page = SITE_URL+"/ajax/get_taxes_finservice.ajax.php";
        ajaxCall(page,null,null,OnTaxesReturn,ajax_fail,"POST");
    }

    var OnTaxesReturn = function(res){
        var ret = JSON.parse(res);
        console.log(ret);
        fixedRate = ret[0];
        variableRate = ret[1];
        console.log("fixed = "+fixedRate);
        console.log("variableRate = "+variableRate);
        isReady = true;
    }

    //TaxType => 1 = fisso, 2 = variabile
    this.calculate = function(taxType = 1 ){
        /*console.log("---- INIZIO CALCOLO ------");*/
        //TASSO
        var taxChosen = taxType == 1?fixedRate:variableRate;
        //Importo
        balance = this.txtPriceAmonut.value;
        //NUMERO ANNI
        term =  this.selYears.value;
        //RATE ANNUE
        period = this.txtPeriodAmount.value;

        /*console.log("term = "+taxChosen);
        console.log("balance = "+balance);
        console.log("rate = "+rate);
        console.log("period = "+period);*/


        var N = term * period;
        var I = (taxChosen / 100) / period;
        var v = Math.pow((1 + I), N);
        var t = (I * v) / (v - 1);
        var result = balance * t;


        /*console.log(result);
        console.log("---- FINE CALCOLO ------");*/
        return result;
    }


    //E' come se fosse il costruttore, solo che va chiamata alla fine perchè non viene definita finchè il compilatore non la legge
    this.getTaxes();
};



//console.log(mortageCalc.calculate());
