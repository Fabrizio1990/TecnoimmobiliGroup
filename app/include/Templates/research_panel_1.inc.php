<?php
require_once(BASE_PATH."/app/classes/OptionsManager.php");
require_once(BASE_PATH."/app/classes/SessionManager.php");
$optMng = new OptionsManager();




$optCategoryVal         = 1;
$optTipologyVal         = "";
$optContractsVal        = 2;
$optLocalsVal           = "";
$optBathroomsVal        = "";
$optGardensVal          = "";
$optElevatorVal         = "";
$optConditionsVal   = "";
$optBoxVal              = "";

$inpLocalsFromVal       = "";
$inpLocalsToVal         = "";
$inpTownVal             = "";
$inpDistrictVal         = "";
$inpLocationVal         = "";
$inpPriceFromVal        = "";
$inpPriceToVal          = "";
$inpMqFromVal           = "";
$inpMqToVal             = "";


$session_opts = SessionManager::getVal("research_opts",true);

if($session_opts!= null){
    $optCategoryVal     = $session_opts["category"];
    $optTipologyVal     = $session_opts["tipology"];
    $optContractsVal    = $session_opts["contract"];
    $optLocalsVal       = $session_opts["locals"];

    $optBathroomsVal    = $session_opts["bathrooms"];
    $optGardensVal      = $session_opts["garden"];
    $optElevatorVal     = $session_opts["elevator"];
    $optConditionsVal   = $session_opts["conditions"];
    $optBoxVal          = $session_opts["box"];

    $inpTownVal         = $session_opts["town"];
    $inpDistrictVal     = $session_opts["district"];
    $inpLocationVal     = $inpDistrictVal!=""?$inpTownVal.", ".$inpDistrictVal:$inpTownVal;
    $inpPriceFromVal    = $session_opts["priceFrom"];
    $inpPriceToVal      = $session_opts["priceTo"];
    $inpMqFromVal       = $session_opts["mqFrom"];
    $inpMqToVal         = $session_opts["mqTo"];

}


$optCategory 		= $optMng->makeOptions("ads_category",$optCategoryVal,null);
$optTipology		= $optMng->makeOptions("ads_tipologies",$optTipologyVal,$optCategoryVal);
$optContracts 		= $optMng->makeOptions("ads_contracts",$optContractsVal);
$optLocals  		= $optMng->makeOptions("ads_locals2",$optLocalsVal,null,"0+");

$optBathrooms		= $optMng->makeOptions("ads_bathrooms2",$optBathroomsVal,null,"0+");

$optGardens         = $optMng->makeOptions("ads_gardens",$optGardensVal,null,"Non specificato");

$optElevator         = $optMng->makeOptions("ads_elevators",$optElevatorVal,null,"Non specificato");
$optConditions   = $optMng->makeOptions("ads_conditions",$optConditionsVal,null,"Non specificato");
$optBox              = $optMng->makeOptions("ads_box",$optBoxVal,null,"Non specificato");


?>
<!-- Style CSS -->
<link href="<?php echo(SITE_URL) ?>/css/research_panel_1.css" rel="stylesheet">

<section id="one-parallax" class="parallax" style="background-image: url('<?php echo SITE_URL."/images/ParallaxBg/02_parallax.jpg" ?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="row research_container">

        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 clearfix"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 clearfix z-index-10" >
            <div id="tabbed_widget" class="tabbable clearfix OPACITY-0" data-effect="slide-bottom">
                <ul class="nav nav-tabs">
                    <li id="research_switch_icon_1" class="active">
                            <a href="#tab" data-toggle="tab">
                                <span>RICERCA IMMOBILE</span>
                                <img  id="ico_research_on" src="<?php echo SITE_URL."/images/icons/icona_immobile_on.png" ?>" />
                                <img id="ico_research_off" class="hidden" src="<?php echo SITE_URL."/images/icons/icona_immobile_off.png" ?>" />
                            </a>
                    </li>
                    <li id="research_switch_icon_2">
                        <a href="#tab1" data-toggle="tab">
                            <span>RICERCA ASTE</span>
                            <img  id="ico_research_auction_on" class="hidden" src="<?php echo SITE_URL."/images/icons/icona_aste_on.png" ?>" />
                            <img  id="ico_research_auction_off"  src="<?php echo SITE_URL."/images/icons/icona_aste_off.png" ?>" />
                        </a>
                    </li>
                </ul>
                <div class="tab-content tabbed_widget clearfix">
                    <div class="tab-pane active" id="tab">


                            <div class="searchmodule clearfix OPACITY-0" data-effect="fade">

                                <div class="subtitle_bar col-lg-12 col-md-12 col-sm-12 col-xs-12">CERCA CASE O APPARTAMENTI<hr/></div>

                                <form id="advanced_search"  class="clearfix" name="advanced_search" method="post">

                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 no-lateral-padding">
                                                <div class="form-group">

                                                <label for="sel_category">Categoria</label>
                                                <select id="sel_category" onchange="getTipologies(this,'','seleziona')" class="show-menu-arrow selectpicker" data-size="7">
                                                    <?php echo($optCategory) ?>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 no-lateral-padding">
                                                <div class="form-group">
                                                    <label for="sel_contract">Contratto</label>
                                                    <select  id="sel_contract" class="show-menu-arrow selectpicker" data-size="7">
                                                        <?php echo($optContracts) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 no-lateral-padding">
                                                <div class="form-group">
                                                    <label for="input_town">&nbsp;</label>
                                                    <input type="text" class="form-control typeahead" name="input_town" id="input_town" placeholder="Es : Torino , Mirafiori nord" value="<?php echo $inpLocationVal ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="sel_tipology">Tipologia</label>
                                                <select id="sel_tipology" name="sel_tipology" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
                                                    <?php echo($optTipology) ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="bedrooms">Prezzo Da:</label>
                                                <input type="text" name="priceFrom" id="priceFrom" class="form-control" placeholder="Da" value="<?php echo $inpPriceFromVal ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="priceTo"> A:</label>
                                                <input type="text" name="priceTo" id="priceTo" class="form-control" placeholder="a" value="<?php echo $inpPriceToVal ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label for="mqFrom">Superficie Da:</label>
                                                <input type="text" name="mqFrom" id="mqFrom" class="form-control" placeholder="Da" value="<?php echo $inpMqFromVal ?>">
                                            </div>

                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                            <label for="mqTo"> A:</label>
                                            <input type="text" name="mqTo" id="mqTo" class="form-control" placeholder="a" value="<?php echo $inpMqToVal ?>">
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                            <div class="form-group">
                                                <label for="btn_search">&nbsp;</label>
                                                <button type="submit" class="btn btn-tecnoimm-red" id="btn_search"><i class="fa fa-search"></i> Avvia Ricerca</button>
                                            </div>
                                        </div>
                                    </div>



                                    <div  id="search_details">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_locals">Locali</label>
                                                <select id="sel_locals" name="sel_locals" class="show-menu-arrow selectpicker" data-size="7" data-dropup-auto="false">
                                                    <option value="" >Qualsiasi</option>
                                                    <?php echo($optLocals) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_bathrooms">Bagni</label>
                                                <select id="sel_bathrooms" name="sel_bathrooms" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
                                                    <?php echo($optBathrooms) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_conditions">Stato immobile</label>
                                                <select id="sel_conditions" name="sel_conditions" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
                                                    <?php echo($optConditions) ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_garden">Giardino</label>
                                                <select  id="sel_garden" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
                                                    <?php echo($optGardens) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_elevator">Ascensore</label>
                                                <select id="sel_elevator" name="sel_elevators" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
                                                    <?php echo($optElevator) ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <label for="sel_box">Posto auto</label>
                                                <select id="sel_box" class="show-menu-arrow selectpicker" data-size="7">
                                                    <option value="">Qualsiasi</option>
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

                    </div><!-- tab pane-->
                    <div class="tab-pane" id="tab2"> </div><!-- tab pane-->
                </div><!-- tab-content -->
            </div><!-- tabbed_widget -->
        </div><!-- end col-lg-3 -->
        <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 clearfix"></div>
    </div><!-- end row -->
</section><!-- end searchPanel -->

