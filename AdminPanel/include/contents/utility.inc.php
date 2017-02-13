<?php 




?>


	<div class="row">
	<!-- FILTRO PARAMETRI -->
			<!-- /.col (left) -->
		<div class="col-md-12">

			<!-- NAV TABS START -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_ageincies_access" data-toggle="tab" aria-expanded="false">
							Accesso Filiali
						</a>
					</li>
					<li id="tab_location_li">
						<a href="#tab_documents" data-toggle="tab" aria-expanded="true">
							Documenti
						</a>
					</li>
					<li id="tab_location_li">
						<a href="#tab_e_commerce" data-toggle="tab" aria-expanded="true">
							E-Commerce
						</a>
					</li>
					<li id="tab_location_li">
						<a href="#tab_statistics" data-toggle="tab" aria-expanded="true">
							Statistiche
						</a>
					</li>

				</ul>

				<div class="tab-content">

					<!-- #################### INIZIO TAB ACCESSO FILIALI ######################## -->
					<div class="tab-pane active" id="tab_ageincies_access">
						<?php
						require("subcontents/utility_agencies_access.inc.php")
						?>
					</div>
					<!-- ###################### FINE TAB ACCESSO FILIALI   ####################-->


					<!-- ######################INIZIO TAB DOCUMENTI ########################### -->
					<div class="tab-pane" id="tab_documents">

						<?php
						//require("subcontents/add_ads_location.inc.php")
						?>

					</div><!-- ############# FINE TAB DOCUMENTI ################# -->


					<!-- #####################INIZIO TAB E-COMMERCE ############################ -->
					<div class="tab-pane" id="tab_e_commerce">

						<?php
						//require("subcontents/add_ads_location.inc.php")
						?>

					</div><!-- ############# FINE TAB E-COMMERCE ################# -->

					<!-- ################### INIZIO TAB STATISTICHE ######################### -->
					<div class="tab-pane" id="tab_statistics">

						<?php
						//require("subcontents/add_ads_location.inc.php")
						?>

					</div><!-- ############# FINE TAB STATISTICHE ################# -->




				</div><!-- FINE TAB CONTENT -->

			</div> <!-- FINE NAV TABS -->

		</div><!-- /.col-md-12 -->


	</div><!-- /.row-->

<!-- FINE PAGINA -->




