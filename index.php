<?php
    require("config.php");
    require(BASE_PATH."/app/classes/SessionManager.php");
    if(HIDE_PAGES && SessionManager::getVal("authenticated") == null){
        include(BASE_PATH . "/pages/in_costruzione.php");
        exit();
    }
    include(BASE_PATH."/app/include/statistic_start.inc.php");

    $url="pages/";
    if(isset($_GET["page"])) {
		if(isset($_GET["folder"])){
			$url .= $_GET["folder"]."/";
		}
		$url .= $_GET["page"].".php";
    }else{
        $url.="index.php";
    }
    include($url);

 ?>
<script src="<?php echo SITE_URL . "/js/UTILS.js" ?>"></script>
