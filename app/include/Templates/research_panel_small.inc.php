

<?php
require_once(BASE_PATH."/app/classes/OptionsManager.php");
$optMng = new OptionsManager();

$optCategoryVal     = isset($_POST["sel_category"])?$sel_category:1;
$optTipologyVal     = isset($_POST["sel_tipology"])?$sel_category:"";
$optContractsVal    = isset($_POST["sel_contracts"])?$sel_category:2;
$optLocalsVal       = isset($_POST["sel_locals"])?$sel_category:"";
$optBathroomsVal    = isset($_POST["sel_bathrooms"])?$sel_category:"";
$optGardensVal      = isset($_POST["sel_garden"])?$sel_category:"";
$optElevatorVal     = isset($_POST["sel_elevator"])?$sel_category:"";
$optPropertyStatus  = isset($_POST["sel_property_status"])?$sel_category:"";
$optBox             = isset($_POST["sel_box"])?$sel_category:"";

$optCategory 		= $optMng->makeOptions("ads_category",$optCategoryVal,null);
$optTipology		= $optMng->makeOptions("ads_tipologies",$optTipologyVal,$optCategoryVal);
$optContracts 		= $optMng->makeOptions("ads_contracts",$optContractsVal);
$optLocals  		= $optMng->makeOptions("ads_locals",$optLocalsVal);
$optBathrooms		= $optMng->makeOptions("ads_bathrooms",$optBathroomsVal);
$optGardens         = $optMng->makeOptions("ads_gardens",$optGardensVal);

$optElevator         = $optMng->makeOptions("ads_elevators",$optElevatorVal);
$optPropertyStatus   = $optMng->makeOptions("ads_property_status",$optPropertyStatus);
$optBox              = $optMng->makeOptions("ads_box",$optBox);


?>
<!-- Style CSS -->
<link href="<?php echo(SITE_URL) ?>/css/research_panel_small.css" rel="stylesheet">

<section class="research_container container"  data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="row small_esearch_container">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix z-index-10 " >
            <div id="tabbed_widget" class="tabbable clearfix" data-effect="slide-bottom">


                <div class="searchmodule clearfix" data-effect="slide-right">

                <form id="advanced_search_small" action="#" class="clearfix" name="advanced_search" method="post">

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
                            <input type="text" class="form-control typeahead" name="input_town" id="input_town" placeholder="Digita un comune">
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
                            <input type="text" name="priceFrom" id="priceFrom" class="form-control" placeholder="Da">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="priceTo" id="priceTo" class="form-control" placeholder="a">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="mqFrom" id="mqFrom" class="form-control" placeholder="Da">

                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                            <input type="text" name="mqTo" id="name" class="form-control" placeholder="a">
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                            <a href="#" class="btn btn-tecnoimm-red" id="btn_search"><i class="fa fa-search"></i> Avvia Ricerca</a>
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