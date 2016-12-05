<?php 


require_once(BASE_PATH."/app/classes/NewsManager.php");

$newsM= new NewsManager();
$objNews = $newsM->read();


?>

<style>
.timeline-widget{
	max-height: 500px;
    overflow: auto;
}

</style>



		<ul class="timeline timeline-widget">
			<!-- timeline time label -->
			
			<!-- /.timeline-label -->
			<!-- timeline item -->
			<?php 

			for($i = 0,$len =count($objNews);$i<$len;$i++) {
				$date = date("Y-m-d",strtotime($objNews[$i]["date_ins"]));
			?>
			
				<li class="time-label">
					<span class="bg-red">
					<?php echo $date; ?>
					</span>
				</li>
				<li>
					<i class="fa fa-envelope bg-blue"></i>
				
						<div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> <?php echo $date; ?> </span>
							
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

