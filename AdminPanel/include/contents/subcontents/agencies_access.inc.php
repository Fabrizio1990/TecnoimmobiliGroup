<link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/css/agencies_access.css">
<?php
require_once (BASE_PATH."/app/classes/AgencyManager.php");
require_once (BASE_PATH."/app/classes/UserManager.php");
$agMng  = new AgencyManager();
$usrMng = new UserManager();
$colorClasses = array("bg-red","bg-yellow","bg-aqua","bg-blue","bg-light-blue","bg-green","bg-navy","bg-teal","bg-olive","bg-orange","bg-purple","bg-maroon");
$colorClassesLen = Count($colorClasses)-1;




$resAg = $agMng->getAgenciesData("id_status = 1");
$count = 1;
foreach($resAg as $agency){
    if($count % 2 == 1)echo("<div class='row'>");
    $agencyName     = $agency["name"];
    $description    = "";
    $operators_arr  = explode(",",$agency["operators"]);
    $operators_ids  = explode(",",$agency["operators_ids"]);
    $logoPath       = SITE_URL."/".$agency["logo_path"];

    ?>

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header <?php echo $colorClasses[rand(0,$colorClassesLen)] ?>">
                <div class="widget-user-image">
                    <img class="img-circle" src="<?php echo $logoPath ?>" alt="Agency Logo">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $agencyName ?></h3>
                <h5 class="widget-user-desc"><?php echo $description ?></h5>
            </div>
    <?php

    for($i = 0,$len = count($operators_arr);$i<$len;$i++){

        $properties_count = $usrMng->countProperties($operators_ids[$i]);

        $operators ="<form class='form_agent_access' method='POST'  action='".SITE_URL."/AdminPanel/login_as.php'>";
        $operators.="<input type='hidden'  name='id_operator' value='".$operators_ids[$i]."'/>";
        $operators.="<span class='operator_name' onclick='this.parentNode.submit()'>".$operators_arr[$i]."</span>";
        $operators.="</form>";
        $ads_count ="";
        ?>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li><a href="javascript:"> <?php echo $operators ?> <span class="pull-right badge bg-blue" title="Immobili attivi"><?php echo $properties_count[0]["cnt_property"] ?></span></a></li>

            </ul>
        </div>

        <?php



    }

    ?>
    </div><!-- /.widget-user -->
        </div><!-- /.col-md-4 -->
    <?php
    if($count%2 != 1 )echo("</div>");
    $count++;

}


?>



