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
	/*include("IDbManager.php");
	include("IObjectEntity.php");
	include("ObjectBaseEntity.php");
	include("DbManager.php");
	include("PropertyEntity.php");
	include("PropertyManager.php");
	
	$SITE_URL = "http://localhost/Tecnoimmobili/SITE/";
    $CN_serverName  = "localhost";
    $CN_dbName = "Sql334297_3";
    $CN_user = "root";
    $CN_password	= "";   
    

  
    
	 
	$propertyE = new PropertyEntity();
	$propertyE->id = 1200;
	
	$propertyManager = new PropertyManager();
	
	$list = $propertyManager->read($propertyE);
	
	foreach($list as $property){
		echo("<br>".$property->id."<br>");
		echo("<br>".$property->description."<br>");
		echo("<br>".$property->id_agenzia."<br>");
	}*/

    //echo("connected".$conn->host_info);
 ?>