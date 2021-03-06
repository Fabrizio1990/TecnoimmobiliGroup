<?php

	$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
	if ($fn) {
        include("../../config.php");
        include(BASE_PATH."/app/classes/ImageHelper/ImageManager.php");
        include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");
        $imgH = new ImagesInfo();




        $res ="0";
        $new_img_name = "";
        //if name is already sent i use its name , if not i create a name
        if(isset($_GET["img_name"])){
            $new_img_name = $_GET["img_name"];
        }else{
            $date = Date("Y-m-d_h-i-s");
            $new_img_name = "img_".$date."_".rand(0,50);
        }

        //if aste i will apply different watermark
        $watermark = isset($_GET["aste"])?"watermark_aste":"watermark";

        $image 		= file_get_contents('php://input');
        $imageName 	= $_SERVER['HTTP_X_FILENAME'];

        $imgMng = new ImageManager($image,$imageName);

        // RESIZE IMAGE EXTRA
        $info = $imgH->info["properties"]["extra"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_big.png",310,690)){
            $save_path = $info["path"];
            $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);



        }else{
            echo("è avvenuto un errore applicando il watemark dell immagine 'EXTRA' controlla che il watemark sia in formato png");
        }

        // RESIZE IMAGE BIG
        $imgMng->setImage($image,$imageName);
        $info = $imgH->info["properties"]["big"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_big.png",190,500)){
            $save_path = $info["path"];
            $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);

            //imposto  l' url dell' immagine da stampare
            $imgName = $imgMng->getSavedImgName();
            $res = SITE_URL."/".$save_path.$imgName;
        }else{
            echo("è avvenuto un errore applicando il watemark dell immagine 'BIG' controlla che il watemark sia in formato png");
        }

        // RESIZE IMAGE NORMAL
        $imgMng->setImage($image,$imageName);
        $info = $imgH->info["properties"]["normal"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_normal.png",120,320)){
            $save_path = $info["path"];
            $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);
        }else{
            echo("è avvenuto un errore applicando il watemark dell immagine 'NORMAL' controlla che il watemark sia in formato png");
        }

        // RESIZE IMAGE MEDIUM
        $imgMng->setImage($image,$imageName);
        $info = $imgH->info["properties"]["medium"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);


        // RESIZE IMAGE min
        $imgMng->setImage($image,$imageName);
        $info = $imgH->info["properties"]["min"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);

        echo $res;
    }


?>