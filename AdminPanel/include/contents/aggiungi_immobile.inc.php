<?php 
	require_once(BASE_PATH."/class/TecnoimmobiliSiteHelper/DbTableManager.php");
	
	$optCategoria 		=  DbTableManager::getDbOpts($conn,"categoria_immobile","categoria","","","","categoria");
	$optLocali 			=  DbTableManager::getDbOpts($conn,"locali","valore","locali","eliminato =0","");
	$optCamere 			=  DbTableManager::getDbOpts($conn,"camere","valore","camere","eliminato =0","");
	$optPiano 			=  DbTableManager::getDbOpts($conn,"piano","valore","piano","eliminato =0","");
	$optAscensore		=  DbTableManager::getDbOpts($conn,"ascensore","valore","ascensore","eliminato =0","");
	$optCondizioni		=  DbTableManager::getDbOpts($conn,"condizioni","valore","condizioni","eliminato =0","");
	$optStatoImmobile	=  DbTableManager::getDbOpts($conn,"stato","valore","stato","eliminato =0","");
	$optRiscaldamento	=  DbTableManager::getDbOpts($conn,"riscaldamento","valore","riscaldamento","eliminato =0","");
	$optBagni			=  DbTableManager::getDbOpts($conn,"bagni","valore","bagni","eliminato =0","");
	$optBox				=  DbTableManager::getDbOpts($conn,"box","valore","box","eliminato =0","");
	$optGiardino		=  DbTableManager::getDbOpts($conn,"giardino","valore","giardino","eliminato =0","");
	$optContratto		=  DbTableManager::getDbOpts($conn,"tipo_contratto","valore","tipo_contratto","eliminato =0","");
	$optStato =  DbTableManager::getDbOpts($conn,"statoannuncio","valore","statoannuncio");
	$optClasseEn		=  DbTableManager::getDbOpts($conn,"classi_energetiche","classe","classe","","");
	$optIpeUm		=  DbTableManager::getDbOpts($conn,"um_ipe","um","um","","");

	
	
	$optProvincia =  DbTableManager::getDbOpts($conn,"geografica","provincia","","stato='italia'","","provincia");
	
	//$optComune =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	//$optZona =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	
	
?>
<div class="row">
<!-- FILTRO PARAMETRI -->
        <!-- /.col (left) -->
	<div class="col-md-12">
	
		<!-- NAV TABS START -->
		<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
				<li class="active"><a href="#tab_descrizione" data-toggle="tab" aria-expanded="false">Descrizione</a></li>
				<li class=""><a href="#tab_ubicazione" data-toggle="tab" aria-expanded="false">Ubicazione</a></li>
				<li class=""><a href="#tab_stato" data-toggle="tab" aria-expanded="true">Stato</a></li>
				<li class=""><a href="#tab_immagini" data-toggle="tab" aria-expanded="true">Immagini</a></li>
            </ul>
			<div class="tab-content">
			
				<!-- #################### INIZIO TAB DESCRIZIONE ######################## -->
				<div class="tab-pane active" id="tab_descrizione">
					<?php
						require("subcontents/aggiungi_immobile_descrizione.inc.php")
					?>
				</div><!-- ####################### FINE TAB DESCRIZIONE  #######################-->
		
		
				<!-- #######################INIZIO TAB UBICAZIONE ############################## -->
				<div class="tab-pane" id="tab_ubicazione">

					<?php
						require("subcontents/aggiungi_immobile_ubicazione.inc.php")
					?>
							
				</div><!-- ############# FINE TAB UBICAZIONE ################# -->
				
				
				
				<!-- #######################INIZIO TAB STATO/I ############################## -->
				<div class="tab-pane" id="tab_stato">


					<?php
						require("subcontents/aggiungi_immobile_stato.inc.php")
					?>
							
				</div><!-- #######################FINE TAB STATO/I ############################## -->


				<!-- #######################INIZIO TAB IMMAGINI ############################## -->
				<div class="tab-pane" id="tab_immagini">
					<?php
						require("subcontents/aggiungi_immobile_immagini.inc.php");
					?>
				</div><!-- ####################### FINE TAB IMMAGINI ############################## -->


				<!-- #######################INIZIO TAB INCARICO ############################## -->
				<div class="tab-pane" id="tab_immagini">
					<?php
					require("subcontents/aggiungi_immobile_incarico.inc.php");
					?>
				</div><!-- ####################### FINE TAB IMMAGINI ############################## -->
				
				
		
			</div><!-- FINE TAB CONTENT -->
			
		</div> <!-- FINE NAV TABS -->
		
		
	</div><!-- /.col-md-12 -->
		 
		   
</div><!-- /.row-->
<!-- FINE PAGINA -->




