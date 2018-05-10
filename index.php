<?php
    require("config.php");
    require(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");
    require(BASE_PATH."/app/classes/SessionManager.php");

    // INFO IMMAGINI ("CATEGORY,SIZEDEFINITION,PATH,WIDTH,HEIGHT,QUALITY") GLOBALE
    $imgInfo = new ImagesInfo();
    $IMG_INFO = $imgInfo->info;

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

    //CHECK IF INCLUDE URL EXIST , ELSE I WILL LOAD 404 PAGE
    if(!file_exists($url)){

        $url = BASE_PATH."/pages/404.php";
    }

    include($url);

 ?>
<script src="<?php echo SITE_URL . "/js/UTILS.js" ?>"></script>
