<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 16/01/2017
 * Time: 12:57
 */

	$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
	if ($fn) {
        include("../../config.php");
        include(BASE_PATH."/app/classes/ImageHelper/ImageManager.php");

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

        // RESIZE IMAGE 655,394
        $resizedImg = $imgMng->resizeImage(655,394);
        if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_big.png",150,300)){
            $save_path = "/public/images/images_properties/big";
            $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);

            //imposto  l' url dell' immagine da stampare
            $imgName = $imgMng->getSavedImgName();
            $res = SITE_URL.$save_path."/".$imgName;

        }else{
            echo("è avvenuto un errore applicando il watemark dell immagine 655,394 controlla che il watemark sia in formato png");
        }

        // RESIZE IMAGE 360,265
        $imgMng->setImage($image,$imageName);
        $resizedImg = $imgMng->resizeImage(360,265);
        if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_normal.png",70,220)){
            $save_path = "/public/images/images_properties/normal";
            $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);
        }else{
            echo("è avvenuto un errore applicando il watemark dell immagine 360,265 controlla che il watemark sia in formato png");
        }

        // RESIZE IMAGE 68,49
        $imgMng->setImage($image,$imageName);
        $resizedImg = $imgMng->resizeImage(68,49);
        $save_path = "/public/images/images_properties/min";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);

        echo $res;
    }


?>