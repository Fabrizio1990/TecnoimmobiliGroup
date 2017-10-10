

<?php
require_once(BASE_PATH."/app/classes/OptionsManager.php");
$optMng = new OptionsManager();

$optCategoryVal     = 1;
$optTipologyVal     = "";
$optContractsVal    = "";
$optLocalsVal       = "";
$optBathroomsVal    = "";
$optGardensVal      = "";
$optElevatorVal     = "";
$optPropertyStatus  = "";
$optBox             = "";

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
<link href="<?php echo(SITE_URL) ?>/css/research_panel_1.css" rel="stylesheet">

<section id="one-parallax" class="parallax" style="background-image: url('<?php echo SITE_URL."/images/ParallaxBg/02_parallax.jpg" ?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="row research_container">

        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 clearfix"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 clearfix z-index-10" >
            <div id="tabbed_widget" class="tabbable clearfix" data-effect="slide-bottom">
                <ul class="nav nav-tabs">
                    <li class="active">
                            <a href="#tab" data-toggle="tab">
                                <span>RICERCA IMMOBILE</span>
                                <img src="<?php echo SITE_URL."/images/Logos/logo_research_33x33.png" ?>" />
                            </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <span>RICERCA ASTE</span>
                            <img src="<?php echo SITE_URL."/images/Logos/logo_research_aste_33x33.png" ?>" />
                        </a>
                    </li>
                </ul>

                <div class="tab-content tabbed_widget clearfix">
                    <div class="tab-pane active" id="tab">


                            <div class="searchmodule clearfix" data-effect="slide-right">

                                <div class="subtitle_bar col-lg-12 col-md-12 col-sm-12 col-xs-12">CERCA CASE O APPARTAMENTI<hr/></div>

                                <form id="advanced_search" action="#" class="clearfix" name="advanced_search" method="post">

                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <label for="">&nbsp;</label>
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-lateral-padding">
                                                <select id="sel_category" class="show-menu-arrow selectpicker" data-size="7">
                                                    <?php echo($optCategory) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-lateral-padding">
                                                <select  id="sel_contract" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona contratto</option>
                                                    <?php echo($optContracts) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 no-lateral-padding">
                                            <input type="text" class="form-control typeahead" name="input_town" id="input_town" placeholder="Digita un comune">
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <label for="type">Tipologia</label>

                                            <select id="type" class="show-menu-arrow selectpicker" data-size="7">
                                                <option value="">Seleziona</option>
                                                <?php echo($optTipology) ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <label for="bedrooms">Prezzo</label>
                                            <input type="text" name="priceFrom" id="priceFrom" class="form-control" placeholder="Da">
                                        </div>
                                        <div class="col-lg-2 col-md-1 col-sm-6 col-xs-6">
                                            <label for="priceTo">&nbsp;</label>
                                            <input type="text" name="priceTo" id="priceTo" class="form-control" placeholder="a">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <label for="mqFrom">Metri quadri</label>
                                            <input type="text" name="mqFrom" id="mqFrom" class="form-control" placeholder="Da">

                                        </div>
                                        <div class="col-lg-2 col-md-1 col-sm-6 col-xs-6">
                                            <label for="mqTo">&nbsp;</label>
                                            <input type="text" name="mqTo" id="name" class="form-control" placeholder="a">
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                            <label for="mqTo">&nbsp;</label>
                                            <a href="#" class="btn btn-tecnoimm-red" id="btn_search"><i class="fa fa-search"></i> SEARCH PROPERTY</a>
                                        </div>
                                    </div>



                                    <div  id="search_details">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="1">Locali</label>
                                                <select id="sel_locals" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optLocals) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="2">Bagni</label>
                                                <select id="sel_bathrooms" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optBathrooms) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="3">Stato immobile</label>
                                                <select id="sel_property_status" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optPropertyStatus) ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="4">Giardino</label>
                                                <select  id="sel_garden" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optGardens) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="2">Ascensore</label>
                                                <select id="sel_elevator" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optElevator) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="4">Posto auto</label>
                                                <select id="sel_box" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Seleziona</option>
                                                    <?php echo($optBox) ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </form>
                                <div style="margin-bottom: 0px;margin-left:0px;" id="toggleSearchDetails">
                                    Ricerca Avanzata
                                    <i class="glyphicon glyphicon-chevron-down"></i>
                                    <i class="glyphicon glyphicon-chevron-up" style="display:none;"></i>
                                </div>
                            </div><!-- end search module -->

                    </div><!-- tab pane-->
                    <div class="tab-pane" id="tab2"> </div><!-- tab pane-->
                </div><!-- tab-content -->
            </div><!-- tabbed_widget -->
        </div><!-- end col-lg-3 -->
        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 clearfix"></div>
    </div><!-- end row -->
</section><!-- end searchPanel -->

<script>



</script>