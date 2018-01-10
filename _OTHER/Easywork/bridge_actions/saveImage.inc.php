<?php


if(isset($_REQUEST['slots'])){

    if(!isset($_REQUEST['id_easywork'])){
        printMessage("ERR_ID_EASYWORK_NOT_DEFINED");
        exit();
    }
    require_once (BASE_PATH."/app/classes/ImageHelper/ImageManager.php");
    require_once (BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $imgH = new ImagesInfo();
    $slot = $_REQUEST["slots"];
    $id_easywork = $_REQUEST['id_easywork'];
    $is_cover = isset($_REQUEST["photo_type"])?$_REQUEST["photo_type"]:2;

    /*if($is_cover!=1 && $is_cover!=2)
        $is_cover = 2;*/

    $isAsta = false;

    $pMng = $pMng == null? new PropertyManager():$pMng;
    $id_property = 0;
    // se l' immobile è già salvato cancello le immagini e le salvo dinuovo
    $propFounds = $pMng->read("id_easywork = ?",null,array($id_easywork),null,false);
    if(count($propFounds) > 0){
        $id_property = $propFounds[0]["id"];
        if($is_cover == 1)
            $ret = $pMng->deletePropertyImages($id_property);

        if($propFounds[0]["id_contract"] == 7)
            $isAsta = true;
    }

    // SALVATAGGIO IMMAGINE
    $image        = $_FILES['upload']['tmp_name'];
    $imageName    = $_FILES['upload']['name'];
    $new_img_name = "";
    //if name is already sent i use its name , if not i create a name
    $date = Date("Y-m-d_h-i-s");
    $new_img_name = "img_".$date."_".rand(0,50);

    //if aste i will apply different watermark
    $watermark = $isAsta?"watermark_aste":"watermark";


    $imgMng = new ImageManager($image,$imageName,true);
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
    $imgMng->setImage($image,$imageName,true);
    $info = $imgH->info["properties"]["big"];
    $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
    if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_big.png",190,500)){
        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);
    }else{
        echo("è avvenuto un errore applicando il watemark dell immagine 'BIG' controlla che il watemark sia in formato png");
    }


    // RESIZE IMAGE NORMAL
    $imgMng->setImage($image,$imageName,true);
    $info = $imgH->info["properties"]["normal"];
    $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
    if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_normal.png",120,320)){
        $save_path = $info["path"];
        $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);
    }else{
        echo("è avvenuto un errore applicando il watemark dell immagine 'NORMAL' controlla che il watemark sia in formato png");
    }

    // RESIZE IMAGE MEDIUM
    $imgMng->setImage($image,$imageName,true);
    $info = $imgH->info["properties"]["medium"];
    $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = $info["path"];
    $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);

    // RESIZE IMAGE MIN
    $imgMng->setImage($image,$imageName,true);
    $info = $imgH->info["properties"]["min"];
    $resizedImg = $imgMng->resizeImage($info["width"],$info["height"]);
    $save_path = $info["path"];
    $imgMng->saveImage(BASE_PATH."/".$save_path, $new_img_name, $info["quality"]);



    // SALVATAGGIO SU DB

    $ret = $pMng->saveImage($id_property,$is_cover,$imgMng->getSavedImgName());

    echo("immagine salvata");


}else{
    printMessage("ERR_SLOT_NOT_DEFINED");
}