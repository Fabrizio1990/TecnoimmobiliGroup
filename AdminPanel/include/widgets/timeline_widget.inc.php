<?php 


require_once(BASE_PATH."/app/classes/NewsManager.php");

$newsM= new NewsManager();
$objNews = $newsM->read(null,"order by date_ins desc");


?>

<style>
.timeline-widget{
	max-height: 500px;
    overflow: auto;
	background : #f9f9f9;
}

</style>


<ul class="timeline timeline-widget">

	<?php
	$lastDate ="";
	for($i = 0,$len =count($objNews);$i<$len;$i++) {

		$date = date("Y-m-d",strtotime($objNews[$i]["date_ins"]));
		$time = date("H:i",strtotime($objNews[$i]["date_ins"]));
		if($date!= $lastDate){
	?>
			<li class="time-label"><!-- timeline time label -->
				<span class="bg-red">
				<?php echo $date; ?>
				</span>
			</li><!-- /.timeline-label -->
		<?php
		}
		$lastDate = $date;
		?>
		<li>
			<i class="fa fa-envelope bg-blue"></i>

				<div class="timeline-item"><!-- timeline item -->
					<?php
					echo "<input type='hidden' class='id_news' value ='".$objNews[$i]["id"]."'/>";
					?>
					<span class="time"><i class="fa fa-clock-o"></i> <?php echo $time; ?> </span>

					<h3 class="timeline-header" style="color:#3c8dbc;font-weight:bold;"><?php echo $objNews[$i]["title"]; ?></h3>
					<div class="timeline-body">
						<?php echo $objNews[$i]["description"]; ?>
					</div>

				</div>
		</li>

	<?php
	}
	?>

</ul>

