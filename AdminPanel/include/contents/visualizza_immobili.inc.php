<?php 
	require_once(BASE_PATH."/class/TecnoimmobiliSiteHelper/DbTableManager.php");
	
	$optFiliale =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	$optCategoria =  DbTableManager::getDbOpts($conn,"categoria_immobile","categoria","","","","categoria");
	
	//$optTipologia =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	$optProvincia =  DbTableManager::getDbOpts($conn,"geografica","provincia","","stato='italia'","","provincia");
	
	//$optComune =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	//$optZona =  DbTableManager::getDbOpts($conn,"agenzie","id","nome_agenzia","eliminato =0 and abilitato = 1");
	
	$optStato =  DbTableManager::getDbOpts($conn,"statoannuncio","valore","statoannuncio");
	
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
							<select id="sel_filiale" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una filiale" style="width: 100%;">
								<?php
								for($i=0,$cnt = count($optFiliale);$i<$cnt;$i++){
									echo("<option value='".$optFiliale[$i]["id"]."'>".$optFiliale[$i]["nome_agenzia"]."</option>");
								}
								?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Categoria</label>
							<select id="sel_categoria" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una categoria" style="width: 100%;" onchange="getTipologies(this)">
								<?php
								for($i=0,$cnt = count($optCategoria);$i<$cnt;$i++){
									echo("<option value='".$optCategoria[$i]["categoria"]."'>".$optCategoria[$i]["categoria"]."</option>");
								}
								?>
							</select>
						</div><!-- /.form-group -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Tipologia</label>
							<select id="sel_tipologia" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una tipologia" style="width: 100%;">
								
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Provincia</label>
							<select id="sel_provincia" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una provincia" style="width: 100%;" onchange="getComuni(this)">
								<?php
								for($i=0,$cnt = count($optProvincia);$i<$cnt;$i++){
									echo("<option value='".$optProvincia[$i]["provincia"]."'>".$optProvincia[$i]["provincia"]."</option>");
								}
								?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Comune</label>
							<select id="sel_comune" class="form-control select2" multiple="multiple" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getZone(this)">
								
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Zona</label>
							<select id="sel_zona" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una zona" style="width: 100%;">
								<option>Alabama</option>
								<option>Alaska</option>
								<option>California</option>
								<option>Delaware</option>
								<option>Tennessee</option>
								<option>Texas</option>
								<option>Washington</option>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<!-- SELECT MULTIPLE -->
						<div class="form-group">
							<label>Stato</label>
							<select id="sel_stato" class="form-control select2" multiple="multiple" data-placeholder="Seleziona uno stato" style="width: 100%;">
								<?php
								for($i=0,$cnt = count($optStato);$i<$cnt;$i++){
									echo("<option value='".$optStato[$i]["valore"]."'>".$optStato[$i]["statoannuncio"]."</option>");
								}
								?>
							</select>
						</div>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
				
				<!-- SELECT MINIMAL -->
				<!--<div class="form-group">
					<label>Minimal</label>
					<select class="form-control select2" style="width: 100%;">
					  <option selected="selected">Alabama</option>
					  <option>Alaska</option>
					  <option>California</option>
					  <option>Delaware</option>
					  <option>Tennessee</option>
					  <option>Texas</option>
					  <option>Washington</option>
					</select>
				</div>-->
				<!-- END SELECT MINIMAL -->
				
				
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
				