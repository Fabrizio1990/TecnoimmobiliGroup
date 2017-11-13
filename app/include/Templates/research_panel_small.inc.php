

<?php
require_once(BASE_PATH."/app/classes/OptionsManager.php");
require_once(BASE_PATH."/app/classes/SessionManager.php");
$optMng = new OptionsManager();

$optCategoryVal     = 1;
$optTipologyVal     = "";
$optContractsVal    = 2;
$optLocalsVal       = "";
$optBathroomsVal    = "";
$optGardensVal      = "";
$optElevatorVal     = "";
$optPropertyStatusVal  = "";
$optBoxVal             = "";

$InpTownVal            = "";
$inpPriceFromVal       = "";
$inpPriceToVal         = "";
$inpMqFromVal          = "";
$inpMqToVal            = "";

$session_opts = SessionManager::getVal("research_opts",true);
if($session_opts!= null){
    $optCategoryVal     = $session_opts["category"];
    $optTipologyVal     = $session_opts["tipology"];
    $optContractsVal    = $session_opts["contract"];
    $optLocalsVal       = $session_opts["locals"];
    $optBathroomsVal    = $session_opts["bathrooms"];
    $optGardensVal      = $session_opts["garden"];
    $optElevatorVal     = $session_opts["elevator"];
    $optPropertyStatus  = $session_opts["propertyStatus"];
    $optBox             = $session_opts["box"];

    $InpTownVal         = $session_opts["town"];
    $inpPriceFromVal    = $session_opts["priceFrom"];
    $inpPriceToVal      = $session_opts["priceTo"];
    $inpMqFromVal       = $session_opts["mqFrom"];
    $inpMqToVal         = $session_opts["mqTo"];

}


$optCategory 		= $optMng->makeOptions("ads_category",$optCategoryVal,null);
$optTipology		= $optMng->makeOptions("ads_tipologies",$optTipologyVal,$optCategoryVal);
$optContracts 		= $optMng->makeOptions("ads_contracts",$optContractsVal);
$optLocals  		= $optMng->makeOptions("ads_locals",$optLocalsVal,null,"Non specificato");
$optBathrooms		= $optMng->makeOptions("ads_bathrooms",$optBathroomsVal,null,"Non specificato");
$optGardens         = $optMng->makeOptions("ads_gardens",$optGardensVal,null,"Non specificato");

$optElevator         = $optMng->makeOptions("ads_elevators",$optElevatorVal,null,"Non specificato");
$optPropertyStatus   = $optMng->makeOptions("ads_property_status",$optPropertyStatusVal,null,"Non specificato");
$optBox              = $optMng->makeOptions("ads_box",$optBoxVal,null,"Non specificato");


?>
<!-- Style CSS -->
<link href="<?php echo(SITE_URL) ?>/css/research_panel_small.css" rel="stylesheet">

<section class="research_container container"  data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="row small_esearch_container">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix z-index-10 " >
            <div id="tabbed_widget" class="tabbable clearfix OPACITY-0" data-effect="slide-left">


                <div class="searchmodule clearfix" data-effect="fade">

                <form id="advanced_search" action="#" class="clearfix" name="advanced_search" method="post">

                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">

                            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 no-lateral-padding">
                                <select id="sel_category" class="show-menu-arrow selectpicker dropdown" data-size="7" data-dropup-auto="false" data-dropup-auto="false">
                                    <?php echo($optCategory) ?>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 no-lateral-padding">
                                <select  id="sel_contract" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <?php echo($optContracts) ?>
                                </select>
                            </div>
                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 no-lateral-padding">
                            <input type="text" class="form-control typeahead" name="input_town" id="input_town" placeholder="Digita un comune" value="<?php echo $InpTownVal ?>">
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <select id="type" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                <option value="">Seleziona Tipologia</option>
                                <?php echo($optTipology) ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="priceFrom" id="priceFrom" class="form-control" placeholder="Da" value="<?php echo $inpPriceFromVal ?>">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="priceTo" id="priceTo" class="form-control" placeholder="a" value="<?php echo $inpPriceToVal ?>">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="mqFrom" id="mqFrom" class="form-control" placeholder="Da" value="<?php echo $inpMqFromVal ?>">

                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="mqTo" id="name" class="form-control" placeholder="a" value="<?php echo $inpMqToVal ?>">
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <button type="submit" class="btn btn-tecnoimm-red" id="btn_search"><i class="fa fa-search"></i> Avvia Ricerca</button>
                        </div>
                    </div>



                    <div  id="search_details">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select id="sel_locals" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <option value="">Seleziona Locali</option>
                                    <?php echo($optLocals) ?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select id="sel_bathrooms" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <option value="" >Seleziona Bagni</option>
                                    <?php echo($optBathrooms) ?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select id="sel_property_status" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <option value="">Seleziona Stato</option>
                                    <?php echo($optPropertyStatus) ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select  id="sel_garden" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <option value="">Seleziona Giardino</option>
                                    <?php echo($optGardens) ?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select id="sel_elevator" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                    <option value="">Seleziona Ascensore</option>
                                    <?php echo($optElevator) ?>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <select id="sel_box" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false" >
                                    <option value="">Seleziona Posto auto</option>
                                    <?php echo($optBox) ?>
                                </select>
                            </div>
                        </div>
                    </div>


                </form>
                <div style="margin-bottom: 0px;margin-left:0px;" class="toggleSearchDetails">
                    Ricerca Avanzata
                    <i class="glyphicon glyphicon-chevron-down"></i>
                    <i class="glyphicon glyphicon-chevron-up" style="display:none;"></i>
                </div>
            </div><!-- end search module -->



        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section><!-- end searchPanel -->

<script>



</script>