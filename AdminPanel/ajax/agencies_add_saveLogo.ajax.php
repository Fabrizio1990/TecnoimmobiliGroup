<?php

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
            $new_img_name = "Logo_".$date."_".rand(0,50);
        }



        $image 		= file_get_contents('php://input');
        $imageName 	= $_SERVER['HTTP_X_FILENAME'];

        $imgMng = new ImageManager($image,$imageName);

        // RESIZE IMAGE 655,394
        $resizedImg = $imgMng->resizeImage(300,300);
        $save_path = "/public/images/images_agencies_icons/big";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);
        //imposto  l' url dell' immagine da stampare
        $imgName = $imgMng->getSavedImgName();
        $res = SITE_URL.$save_path."/".$imgName;


        // RESIZE IMAGE 360,265
        $imgMng->setImage($image,$imageName);
        $resizedImg = $imgMng->resizeImage(140,140);
        $save_path = "/public/images/images_agencies_icons/normal";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);


        // RESIZE IMAGE 68,49
        $imgMng->setImage($image,$imageName);
        $resizedImg = $imgMng->resizeImage(70,70);
        $save_path = "/public/images/images_agencies_icons/min";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);

        echo $res;
    }


?>