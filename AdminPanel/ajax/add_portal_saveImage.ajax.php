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


        $image 		= file_get_contents('php://input');
        $imageName 	= $_SERVER['HTTP_X_FILENAME'];

        $imgMng = new ImageManager($image,$imageName);






        // RESIZE IMAGE NORMAL
        $imgMng->setImage($image,$imageName);
        $info = $imgH->info["portals"]["normal"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);

        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);
        $imgName = $imgMng->getSavedImgName();
        $res = SITE_URL."/".$save_path.$imgName;


        // RESIZE IMAGE MIN
        $info = $imgH->info["portals"]["min"];
        $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);


        echo $res;
    }


?>