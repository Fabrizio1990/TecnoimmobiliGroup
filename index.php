<?php

    require("config.php");
    include(BASE_PATH."/app/include/statistic_start.inc.php");

    $url="pages/";

    if(isset($_GET["page"])) {

		if(isset($_GET["folder"])){
			$url .= $_GET["folder"]."/";
		}
		//echo($_GET["page"]);
		$url .= $_GET["page"].".php";
		//echo($url);

    }else{
        $url.="index.php";
    }

    include($url);

 ?>

<script src="<?php echo SITE_URL . "/js/UTILS.js" ?>"></script>
