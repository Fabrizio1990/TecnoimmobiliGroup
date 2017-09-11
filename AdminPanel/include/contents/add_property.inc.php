<?php 
	require_once(BASE_PATH."/app/classes/OptionsManager.php");
	require_once(BASE_PATH."/app/classes/PropertyManager.php");
	//SETTING UP DEFAULT VALUES
	$action = "save";
	$id_property ="";
    $id_easyWork    = null;

	$optCountriesVal 		= "1";
	$inpIpeVal		 		= "175";
	$inpSurfaceVal	 		= "";
	$InpPriceVal			= "";
	$inpAddressVal			= "";
	$inpStreetNumVal		= "";
	$inpLatitudeVal			= "";
	$inpLongitudeVal		= "";
	$txtDescriptionVal	 	= "";

	$imagesVal = array("img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg","img_eof/Immagine_eof.jpg");

	 $optRegionsVal = $optCityVal = $optTownVal = $optDistrictVal = $optCategoryVal = $optTipologyVal = $optLocalsVal = $optRoomsVal = $optFloorsVal = $optElevatorsVal = $optConditionsVal = $optPropertyStatusVal = $optContractStatusVal = $optAdsyStatusVal = $optHeatingsVal = $optBathroomsVal = $optBoxVal = $optGardensVal = $optContractsVal = $optStatusVal = $optEnergyClassVal = $optIpeUmVal = $optCityVal = $optPriceLoweredVal = $optPrestigeVal = $optNegotiationVal = $optAdsStatusVal =  $optShowAddressVal = "";


	$pMng = new PropertyManager();

	if(isset($_POST["id_ads"])){
		$action = "update";
        $id_property = $_POST["id_ads"];

		// GET THE ADS DATA
		$adsData 		= $pMng->read("id=?","limit 1" ,array($id_property));
		$resDesc 		= $pMng->getDescription($id_property);
		$resImages		= $pMng->getImages("id_property =?",null,array($id_property) ,"img_name");
//		$resImagePath	= $pMng->getImagesPath("id=?","",array("3") ,"path");

        $id_easyWork                = $adsData[0]["id_easywork"];
		$inpIpeVal		 			= $adsData[0]["ipe"];
		$inpSurfaceVal	 			= $adsData[0]["mq"];
		$InpPriceVal				= $adsData[0]["price"];
		$inpAddressVal				= $adsData[0]["street"];
		$inpStreetNumVal			= $adsData[0]["street_num"];
		$inpLatitudeVal				= $adsData[0]["latitude"];
		$inpLongitudeVal			= $adsData[0]["longitude"];
		$txtDescriptionVal	 		= $resDesc[0]["desc_it"];

		$optCountriesVal 			= $adsData[0]["id_country"];
		$optRegionsVal 				= $adsData[0]["id_region"];
		$optCityVal 				= $adsData[0]["id_city"];
		$optTownVal					= $adsData[0]["id_town"];
		$optDistrictVal				= $adsData[0]["id_district"];
		$optCategoryVal 			= $adsData[0]["id_category"];
		$optTipologyVal 			= $adsData[0]["id_tipology"];
		$optLocalsVal 				= $adsData[0]["id_locals"];
		$optRoomsVal 				= $adsData[0]["id_rooms"];
		$optFloorsVal 				= $adsData[0]["id_floor"];
		$optElevatorsVal 			= $adsData[0]["id_elevator"];
		$optConditionsVal 			= $adsData[0]["id_property_conditions"];
		$optPropertyStatusVal		= $adsData[0]["id_property_status"];
		$optContractStatusVal 		= $adsData[0]["id_contract_status"];
		$optAdsStatusVal 			= $adsData[0]["id_ads_status"];
		$optHeatingsVal 			= $adsData[0]["id_heating"];
		$optBathroomsVal 			= $adsData[0]["id_bathrooms"];
		$optBoxVal 					= $adsData[0]["id_box"];
		$optGardensVal 				= $adsData[0]["id_garden"];
		$optContractsVal 			= $adsData[0]["id_contract"];
		//$optStatusVal 				= $adsData[0]["id_"];
		$optEnergyClassVal 			= $adsData[0]["id_energy_class"];
		$optIpeUmVal 				= $adsData[0]["id_ipe_um"];
		$optPriceLoweredVal 		= $adsData[0]["is_price_lowered"];
		$optPrestigeVal 			= $adsData[0]["is_prestige"];
		$optNegotiationVal 			= $adsData[0]["negotiation_reserved"];
		$optShowAddressVal 			= $adsData[0]["show_address"];

		for($i = 0,$len = Count($resImages);$i<$len;$i++){
			$imagesVal[$i] = $resImages[$i]["img_name"];
		}

		// APPOINTMENT DATA

	}

	$optMng = new OptionsManager();

	$userLogged = SessionManager::getVal("user",true);


	// CREO OPTIONS COUNTRY
	$optCountries		= $optMng->makeOptions("geo_country",$optCountriesVal,null);
	// CREO OPTIONS COUNTRY
	$optRegions			= $optMng->makeOptions("geo_region",$optRegionsVal,$optCountriesVal);
	// CREO OPTIONS CITY
	$optCities			= $optMng->makeOptions("geo_city",$optCityVal,$optRegionsVal);
	// CREO OPTIONS TOWN
	$optTowns			= $optMng->makeOptions("geo_town",$optTownVal,$optCityVal);
	// CREO OPTIONS DISTRICT
	$optDistricts		= $optMng->makeOptions("geo_district",$optDistrictVal,$optTownVal);
	// CREO OPTIONS CATEGORIA
	$optCategory 		= $optMng->makeOptions("ads_category",$optCategoryVal,null);
	// CREO OPTIONS TIPOLOGIA
	$optTipology		= $optMng->makeOptions("ads_tipologies",$optTipologyVal,$optCategoryVal);
	// CREO OPTIONS LOCALI
	$optLocals  		= $optMng->makeOptions("ads_locals",$optLocalsVal);
	// CREO OPTIONS ROOMS
	$optRooms 			= $optMng->makeOptions("ads_rooms",$optRoomsVal);
	// CREO OPTIONS FLOOR
	$optFloors 			= $optMng->makeOptions("ads_floors",$optFloorsVal);
	// CREO OPTIONS ELEVATOR
	$optElevators 		= $optMng->makeOptions("ads_elevators",$optElevatorsVal);
	// CREO OPTIONS Conditions
	$optConditions		= $optMng->makeOptions("ads_conditions",$optConditionsVal);
	// CREO OPTIONS property status
	$optPropertyStatus	= $optMng->makeOptions("ads_property_status",$optPropertyStatusVal);
	// CREO OPTIONS property status
	$optContractStatus	= $optMng->makeOptions("ads_contract_status",$optContractStatusVal);
	// CREO OPTIONS ads status
	$optAdsStatus		= $optMng->makeOptions("ads_status",$optAdsStatusVal);
	// CREO OPTIONS heatings
	$optHeatings		= $optMng->makeOptions("ads_heatings",$optHeatingsVal);
	// CREO OPTIONS Bathrooms
	$optBathrooms 		= $optMng->makeOptions("ads_bathrooms",$optBathroomsVal);
	// CREO OPTIONS Box
	$optBox 			= $optMng->makeOptions("ads_box",$optBoxVal);
	// CREO OPTIONS Gardens
	$optGardens			= $optMng->makeOptions("ads_gardens",$optGardensVal);
	// CREO OPTIONS Contracts
	$optContracts 		= $optMng->makeOptions("ads_contracts",$optContractsVal);
	// CREO OPTIONS ads Status
	//$optStatus			= $optMng->makeOptions("ads_status",$optStatusVal);
	// CREO OPTIONS Energy class
	$optEnergyClass		= $optMng->makeOptions("ads_energy_class",$optEnergyClassVal);
	// CREO OPTIONS Ipe um
	$optIpeUm			= $optMng->makeOptions("ads_ipe_um",$optIpeUmVal);
	// CREO OPTIONS City
	$optCity			= $optMng->makeOptions("geo_region",$optCityVal,1);



?>
<form name="FORM_PROPERTY" id="FORM_PROPERTY" novalidate accept-charset="UTF-8">
	<input type ="hidden" name="action" id="action" value="<?php echo $action ?>" />
	<input type ="hidden" name="id_ads" id="id_ads" value="<?php echo $id_property ?>" />

	<div class="row">
	<!-- FILTRO PARAMETRI -->
			<!-- /.col (left) -->
		<div class="col-md-12">

			<!-- NAV TABS START -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="false">
							Descrizione
						</a>
					</li>
					<li id="tab_location_li">
						<a href="#tab_location" data-toggle="tab" aria-expanded="true">
							Ubicazione
						</a>
					</li>
					<li >
						<a href="#tab_status" data-toggle="tab" aria-expanded="true">
							Stato Annuncio
						</a>
					</li>
					<li >
						<a href="#tab_images" data-toggle="tab" aria-expanded="true">
							Immagini
						</a>
					</li>
					<?php if($userLogged->id_user_type==1 && $id_easyWork!=null){?>
					<li>
						<a href="#tab_appointment" data-toggle="tab" aria-expanded="true">
							Scheda confidenziale
						</a>
					</li>
					<?php } ?>
					<li  style="float:right;">
						<button type="submit" class="btn btn-primary btn_submit" >Salva</button>
					</li>
				</ul>
				<div class="tab-content">

					<!-- #################### INIZIO TAB DESCRIZIONE ######################## -->
					<div class="tab-pane active" id="tab_details">
						<?php
						require("subcontents/add_property_description.inc.php")
						?>
					</div><!-- ####################### FINE TAB DESCRIZIONE  #######################-->


					<!-- #######################INIZIO TAB UBICAZIONE ############################## -->
					<div class="tab-pane" id="tab_location">

						<?php
						require("subcontents/add_property_location.inc.php")
						?>

					</div><!-- ############# FINE TAB UBICAZIONE ################# -->



					<!-- #######################INIZIO TAB STATO/I ############################## -->
					<div class="tab-pane" id="tab_status">


						<?php
						require("subcontents/add_property_status.inc.php")
						?>

					</div><!-- #######################FINE TAB STATO/I ############################## -->


					<!-- #######################INIZIO TAB IMMAGINI ############################## -->
					<div class="tab-pane" id="tab_images">
						<?php
							require("subcontents/add_property_images.inc.php");
						?>
					</div><!-- ####################### FINE TAB IMMAGINI ############################## -->

                    <!-- visualizzo i dati proprietario solo se sono admin e se id_easywork è diverso da 0 -->
					<?php //if($userLogged->id_user_type==1 && $id_easyWork!=null){?>
					<!-- #######################INIZIO TAB INCARICO ############################## -->
					<div class="tab-pane" id="tab_appointment">
						<?php
						require("subcontents/add_property_appointment.inc.php");
						?>
					</div><!-- ####################### FINE TAB INCARICO ############################## -->
					<?php //} ?>



				</div><!-- FINE TAB CONTENT -->

			</div> <!-- FINE NAV TABS -->

		</div><!-- /.col-md-12 -->


	</div><!-- /.row-->
</form>
<!-- FINE PAGINA -->




