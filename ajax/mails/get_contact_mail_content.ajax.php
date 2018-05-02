<?php
include("../../config.php");

if(isset($_REQUEST["reference_code"],$_REQUEST["sender_name"],$_REQUEST["sender_mail"],$_REQUEST["sender_phone"],$_REQUEST["sender_message"])){

    $ref_code       = urlencode($_REQUEST["reference_code"]);
    $sender_name    = urlencode($_REQUEST["sender_name"]);
    $sender_mail    = urlencode($_REQUEST["sender_mail"]);
    $sender_phone   = urlencode($_REQUEST["sender_phone"]);
    $sender_message = urlencode($_REQUEST["sender_message"]);




    include(BASE_PATH . "/app/classes/PropertyManager.php");
    include(BASE_PATH . "/app/classes/PropertyLinksAndTitles.php");
    require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $pMng = new PropertyManager();
    $imgInfo = new ImagesInfo();
    $img_path = $imgInfo->info["properties"]["min"]["path"];

    $res = $pMng->readAllAds("reference_code = ?","limit 1",array($ref_code),null,false);
    $link = SITE_URL ."/". PropertyLinksAndTitles::getDetailLinkFromId($res[0]["id"]);
    $img = $res[0]["img_name"];
    $tipology = $res[0]["tipology"];
    $contract = $res[0]["contract"];
    $town = $res[0]["town"];
    $price = $res[0]["price"];

    ?>

    <style>
        #mail_content{margin:auto;width: :100%;text-align: center}
        #logo_container{text-align: center;border-bottom:6px solid #1a5479;}
        #logo_img{margin: auto; width: 30%;  padding: 10px;}

        #content{margin:auto;border:5px solid #efefef;width: 60%;padding:10px;text-align: left;}
        #content #img_container,
        #content #details_container ,
        #content #btn_details_container{
            width: 30%;
            vertical-align: top;
            display: inline-table;
        }
        #content #img_container{width: auto;}
        #content #btn_details_container{vertical-align: bottom;}
        #content #details_container ,
        #content #btn_details_container{ padding: 0px 10px 0px 10px; }



        .btn-tecnoimm-red {
            width:100px;
            background: #eb212e !important;
            border-color: #eb212e !important;
            color: #ffffff !important;
        }

        .btn-tecnoimm-red:hover{
            background-color:#af0813 !important;
        }

        .btn-tecnoimm-red:active,
        .btn-tecnoimm-red.active {
            background-color: #af0813 \9 !important;
        }
    </style>

    <div id="mail_content">
        <div id="logo_container">
            <img  id="logo_img"  src="<?php echo SITE_URL.'/public/images/images_logos/tecnoimmobilili_logo_ext.png' ?>" />
        </div>
        <div id="content">
            <h2>Gentile collega</h2>
            <p>In relazione all' annuncio relativo all' immobile:</p>

            <div id="property_container">
                <div id="img_container">
                    <a href="<?php echo $link ?>"><img src="<?php echo SITE_URL.'/'.$img_path.$img?>" /></a>
                </div>
                <div id="details_container">
                    <p> <b>Tipologia : </b><?php echo $tipology ?></p>
                    <p> <b>Contratto : </b><?php echo $contract ?></p>
                    <p> <b>Comune : </b><?php echo $town ?></p>
                    <p> <b>Prezzo : </b><?php echo $price ?></p>
                    <p> <b>Codie riferimento : </b><?php echo $ref_code ?></p>
                </div>
                <div id="btn_details_container">
                    <a href="<?php echo $link ?>" class="btn-tecnoimm-red">Dettagli</a>
                </div>
            </div>

            <div id="contact_container">
                <h2>Dati contatto</h2>
                <p><b>Nome</b>: <?php echo $sender_name ?></p>
                <p><b>Email</b>: <?php echo $sender_mail ?></p>
                <p><b>Telefono</b>: <?php echo $sender_phone ?></p>
                <p><b>Messaggio</b>:<br><?php echo $sender_message ?></p>
            </div>

        </div>
    </div>

    <?php


}else{

    echo("<h1> Accesso non consentito </h1>");
    //header("location:".SITE_URL."/404.html");
}
