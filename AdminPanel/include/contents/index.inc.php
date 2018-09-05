<?php
	include(BASE_PATH."/AdminPanel/include/widgets/statistic_widget.inc.php");
?>
<!--  ---------------Data table annunci -------------- -->
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info ">
			<div class="box-header ui-sortable-handle">
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
				<?php include(BASE_PATH . "/AdminPanel/include/widgets/property_list_widget.inc.php"); ?>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>
<!-- /.row -->

<!-- ###### TIMELINE ###### -->
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Tecnoimmobili News</h3>
				<!-- pulsanti riduci e chiudi -->
				<div class="pull-right box-tools">
					<button type="button" class="btn btn-secondary btn-sm pull-right" data-widget="remove"><i class="fa fa-times"></i>
					</button>
					<button type="button" class="btn btn-secondary btn-sm " data-widget="collapse" data-toggle="tooltip" title="Riduci / Ingrandisci" style="margin-right: 5px;">
					<i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">
					<?php include(BASE_PATH."/AdminPanel/include/widgets/timeline_widget.inc.php") ?>
				</div><!-- /.col-md-12 -->

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col-xs-12 -->
</div><!-- /.row -->
<!-- ###### END TIMELINE ###### -->