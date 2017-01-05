
<table id="DT_ADS" class="table table-bordered table-striped display responsive no-wrap" width="100%">
	<thead>
		<tr>
			<th>Immagine</th>
			<th>Provincia</th>
			<th>Città</th>
			<th>Zona</th>
			<th>Categoria</th>
			<th>Tipo Immobile</th>
			<th>Prezzo</th>
			<th>Data inserimento</th>
			<th>Data update</th>
			<th>Stato</th>
			<th>Rivista</th>
			<?php if($SS_usr->id_user_type==1)
echo("<th>Portali</th>");
?>
		</tr>
	</thead>
	<tbody>
		<!-- il corpo della tabella viene scritto dalla funzione javascript al fondo della pagina -->
	</tbody>
	<tfoot>
		<tr>
			<th>Immagine</th>
			<th>Provincia</th>
			<th>Città</th>
			<th>Zona</th>
			<th>Categoria</th>
			<th>Tipo Immobile</th>
			<th>Prezzo</th>
			<th>Data inserimento</th>
			<th>Data update</th>
			<th>Stato</th>
			<th>Rivista</th>
			<?php if($SS_usr->id_user_type==1)
				echo("<th>Portali</th>");
			?>
		</tr>
	</tfoot>
</table>

<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/ads_properties_manager.js"></script>
