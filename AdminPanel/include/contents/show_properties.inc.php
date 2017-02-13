<?php
require_once(BASE_PATH."/app/classes/OptionsManager.php");
$mng = new OptionsManager();

$optAgencies 		=  $mng->makeOptions("agencies_list");
$optCategories 		=  $mng->makeOptions("ads_category");

$optCountries		=  $mng->makeOptions("geo_country",1);
$optRegions			=  $mng->makeOptions("geo_region",null,"1");

$optAdsStatus 		=  $mng->makeOptions("ads_status",null,true);

?>
<div class="row">
	<!-- FILTRO PARAMETRI -->
	<!-- /.col (left) -->
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Imposta criteri di ricerca</h3>

				<div class="pull-right box-tools">
					<button type="button" class="btn btn-secondary btn-sm pull-right" data-widget="remove"><i class="fa fa-times"></i>
					</button>
					<button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
						<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<!-- DATE RANGE -->
						<div class="form-group">
							<label>Filtro data</label>

							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right" id="sel_dateRange">
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
						<!-- END DATE RANGE -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Filiale</label>
							<select id="sel_agency" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una filiale" style="width: 100%;">
								<?php echo($optAgencies)?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->

				<div class="row">
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Categoria</label>
							<select id="sel_category" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una categoria" style="width: 100%;" onchange="getTipologies(this)">
								<?php echo $optCategories?>
							</select>
						</div><!-- /.form-group -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Tipologia</label>
							<select id="sel_tipology" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una tipologia" style="width: 100%;">

							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->


				<div class="row">

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Paese</label>
							<select id="sel_country" class="form-control select2" multiple="multiple" data-placeholder="Seleziona un paese" style="width: 100%;" onchange="getRegions(this)" >
								<?php echo $optCountries?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Regione</label>
							<select id="sel_region" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una Regione" style="width: 100%;" onchange="getCities(this)">
								<?php echo $optRegions?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->

				</div><!-- /.row -->




				<div class="row">

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Provincia</label>
							<select id="sel_city" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una provincia" style="width: 100%" onchange="getTowns(this)">

							</select>
						</div>
					</div><!-- /.col-md-6 -->

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Comune</label>
							<select id="sel_town" class="form-control select2" multiple="multiple" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getDistricts(this)"></select>
						</div>
					</div><!-- /.col-md-6 -->



				</div><!-- /.row -->

				<div class="row">

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Zona</label>
							<select id="sel_district" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una zona" style="width: 100%;"></select>
						</div>
					</div><!-- /.col-md-6 -->

					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Stato</label>
							<select id="sel_ads_status" class="form-control select2" multiple="multiple" data-placeholder="Seleziona uno stato" style="width: 100%;">
								<?php echo $optAdsStatus?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->

			</div>

			<!-- /.box-body -->
			<!-- BOX FOOTER -->
			<div class="box-footer">
				<button type="button" onclick="submitFilter()" class="btn btn-primary">Avvia Ricerca</button>
			</div>
			<!-- END BOX FOOTER -->

		</div>
		<!-- /.box -->

	</div>
	<!-- /.col-md-6 -->
	<!-- FINE FILTRO PARAMETRI -->

	<!-- CALENDARIO -->



	<!-- FINE CALENDARIO -->

</div>
<!-- /.row -->


<!--  ---------------Data table annunci -------------- -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Lista immobili</h3>
				<!-- pulsanti riduci e chiudi -->
				<div class="pull-right box-tools">
					<button type="button" class="btn btn-secondary btn-sm pull-right" data-widget="remove"><i class="fa fa-times"></i>
					</button>
					<button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
						<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<?php include(BASE_PATH."/AdminPanel/include/widgets/propery_list_widget.inc.php"); ?>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>
<!-- /.row -->
