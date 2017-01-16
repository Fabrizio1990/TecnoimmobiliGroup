<?php 
	require_once(BASE_PATH."/app/classes/OptionsManager.php");
	$optMng = new OptionsManager();

	$userLogged = SessionManager::getVal("user",true);


	// CREO OPTIONS COUNTRY
	$optCountries		= $optMng->makeOptions("geo_country",1);
	// CREO OPTIONS COUNTRY
	$optRegions			= $optMng->makeOptions("geo_region",null,1);
	// CREO OPTIONS CATEGORIA
	$optCategory 		= $optMng->makeOptions("ads_category");
	// CREO OPTIONS LOCALI
	$optLocals  		= $optMng->makeOptions("ads_locals");
	// CREO OPTIONS ROOMS
	$optRooms 			= $optMng->makeOptions("ads_rooms");
	// CREO OPTIONS FLOOR
	$optFloors 			= $optMng->makeOptions("ads_floors");
	// CREO OPTIONS ELEVATOR
	$optElevators 		= $optMng->makeOptions("ads_elevators");
	// CREO OPTIONS Conditions
	$optConditions		= $optMng->makeOptions("ads_elevators");
	// CREO OPTIONS property status
	$optPropertyStatus	= $optMng->makeOptions("ads_property_status");
	// CREO OPTIONS property status
	$optContractStatus	= $optMng->makeOptions("ads_contract_status");
	// CREO OPTIONS ads status
	$optAdsyStatus		= $optMng->makeOptions("ads_status");
	// CREO OPTIONS heatings
	$optHeatings		= $optMng->makeOptions("ads_heatings");
	// CREO OPTIONS Bathrooms
	$optBathrooms 		= $optMng->makeOptions("ads_bathrooms");
	// CREO OPTIONS Box
	$optBox 			= $optMng->makeOptions("ads_box");
	// CREO OPTIONS Gardens
	$optGardens			= $optMng->makeOptions("ads_gardens");
	// CREO OPTIONS Contracts
	$optContracts 		= $optMng->makeOptions("ads_contracts");
	// CREO OPTIONS ads Status
	$optStatus			= $optMng->makeOptions("ads_status");
	// CREO OPTIONS Energy class
	$optEnergyClass		= $optMng->makeOptions("ads_energy_class");
	// CREO OPTIONS Ipe um
	$optIpeUm			= $optMng->makeOptions("ads_ipe_um");
	// CREO OPTIONS City
	$optCity			= "";
?>
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
				<li>
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
				<?php if($userLogged->id_user_type==1){?>
				<li >
					<a href="#tab_appointment" data-toggle="tab" aria-expanded="true">
						Scheda confidenziale
					</a>
				</li>
				<?php } ?>
            </ul>
			<div class="tab-content">
			
				<!-- #################### INIZIO TAB DESCRIZIONE ######################## -->
				<div class="tab-pane active" id="tab_details">
					<?php
					require("subcontents/add_ads_description.inc.php")
					?>
				</div><!-- ####################### FINE TAB DESCRIZIONE  #######################-->
		
		
				<!-- #######################INIZIO TAB UBICAZIONE ############################## -->
				<div class="tab-pane" id="tab_location">

					<?php
					require("subcontents/add_ads_location.inc.php")
					?>
							
				</div><!-- ############# FINE TAB UBICAZIONE ################# -->
				
				
				
				<!-- #######################INIZIO TAB STATO/I ############################## -->
				<div class="tab-pane" id="tab_status">


					<?php
					require("subcontents/add_ads_status.inc.php")
					?>
							
				</div><!-- #######################FINE TAB STATO/I ############################## -->


				<!-- #######################INIZIO TAB IMMAGINI ############################## -->
				<div class="tab-pane" id="tab_images">
					<?php
						require("subcontents/add_ads_images.inc.php");
					?>
				</div><!-- ####################### FINE TAB IMMAGINI ############################## -->

				<?php if($userLogged->id_user_type==1){?>
				<!-- #######################INIZIO TAB INCARICO ############################## -->
				<div class="tab-pane" id="tab_appointment">
					<?php
					require("subcontents/add_ads_appointment.inc.php");
					?>
				</div><!-- ####################### FINE TAB INCARICO ############################## -->
				<?php } ?>
				
				
		
			</div><!-- FINE TAB CONTENT -->
			
		</div> <!-- FINE NAV TABS -->
		
		
	</div><!-- /.col-md-12 -->
		 
		   
</div><!-- /.row-->
<!-- FINE PAGINA -->




