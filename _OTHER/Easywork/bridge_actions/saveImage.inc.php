<?php


if(isset($_REQUEST['slots'])){

    if(!isset($_REQUEST['id_easywork'])){
        printMessage("ERR_ID_EASYWORK_NOT_DEFINED");
        exit();
    }
    require_once (BASE_PATH."/app/classes/ImageHelper/ImageManager.php");

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


    // RESIZE IMAGE 655,394
    $resizedImg = $imgMng->resizeImage(948,632);
    if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_big.png",260,540)){
        $save_path = "/public/images/images_properties/big";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);

        //imposto  l' url dell' immagine da stampare
        $imgName = $imgMng->getSavedImgName();
        $res = SITE_URL.$save_path."/".$imgName;

    }else{
        echo("è avvenuto un errore applicando il watemark dell immagine 948,632 controlla che il watemark sia in formato png");
    }

    // RESIZE IMAGE 360,265
    $imgMng->setImage($image,$imageName,true);
    $resizedImg = $imgMng->resizeImage(610,407);
    if($imgMng->applyWatemark(BASE_PATH."/AdminPanel/images/watermarks/".$watermark."_normal.png",190,350)){
        $save_path = "/public/images/images_properties/normal";
        $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);
    }else{
        echo("è avvenuto un errore applicando il watemark dell immagine 610,407 controlla che il watemark sia in formato png");
    }

    // RESIZE IMAGE 68,49
    $imgMng->setImage($image,$imageName,true);
    $resizedImg = $imgMng->resizeImage(240,160);
    $save_path = "/public/images/images_properties/min";
    $imgMng->saveImage(BASE_PATH.$save_path, $new_img_name, 80);


    // SALVATAGGIO SU DB

    $ret = $pMng->saveImage($id_property,$is_cover,$imgMng->getSavedImgName());

    echo("immagine salvata");


}else{
    printMessage("ERR_SLOT_NOT_DEFINED");
}