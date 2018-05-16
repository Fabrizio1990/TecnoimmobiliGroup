<?php
    require_once(BASE_PATH."/app/classes/PropertyManager.php");
    require_once(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");

    $propertyMng = new PropertyManager();

    $elemXRow = 4;
    $properties = $propertyMng->readAllAds("id_ads_status = 1","order by date_up desc Limit 8 ",null,null,false);

    $imgPathNormal = $IMG_INFO["properties"]["medium"]['path'];
    $imgPathBig = $IMG_INFO['properties']['big']['path'];
    $imgEof  = "img_eof/Immagine_eof.jpg";
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center clearfix">
        <h3 class="big_title">Ultimi annunci inseriti/aggiornati <small>Visualizza i nostri ultimi annunci</small></h3>
    </div>
    <?php for($i = 0 ; $i< Count($properties);$i++){

        $title  = PropertyLinksAndTitles::getTitleNoDb($properties[$i]["tipology"],$properties[$i]["contract"]);
        $address = $properties[$i]["street"]."  ".$properties[$i]["town"]." (".$properties[$i]["city_short"].")";
        $boxTxt = $properties[$i]["box_short"];
        if($boxTxt != "NO" && $boxTxt!= "NN"){
            $boxTxt = "SI";
        }

        $price = $properties[$i]["price"];
        if($price == 0 ){
            $price = "TR";
            $priceTit = "Trattativa riservata";
        }else{
            $price ="&euro;".Utils::formatPrice($price);
        }

        $link = PropertyLinksAndTitles::getDetailLink($properties[$i]["contract"],$properties[$i]["tipology"],$properties[$i]["street"],$properties[$i]["town"],$properties[$i]["reference_code"]);

        $agentData = $propertyMng->getAgentData($properties[$i]["id"]);
        $agentTel = $agentData[0]["phone"];
        $agentMobile = $agentData[0]["mobile_phone"];
        $agentMail = $agentData[0]["email"];


        /*  IMAGES */
        $imgMin = SITE_URL."/".$imgPathNormal.$imgEof;
        $imgBig =  SITE_URL."/".$imgPathBig.$imgEof;
        if($properties[$i]["img_name"]!=""){
            $imgMin = SITE_URL."/".$imgPathNormal.$properties[$i]["img_name"];
            $imgBig = SITE_URL."/".$imgPathBig.$properties[$i]["img_name"];
        }


        if($i%$elemXRow == 0){
            if($i!=0) echo("</div>");
            echo("<div class='row row-eq-height'>");
        }
    ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="boxes first" data-effect="slide-bottom">
            <div class="ImageWrapper boxes_img">
                <img class="img-responsive" src="<?php echo $imgMin ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
                <div class="ImageOverlayH"></div>
                <div class="Buttons StyleSc">
                    <span class='WhiteSquare' title='Vai al dettaglio'>
                        <a  href='<?php echo $link ?>'><i class='fa fa-search'></i></a>
                    </span>
                    <span class='WhiteSquare' title='Ingrandisci Foto'>
                        <a class='fancybox' href='<?php echo $imgBig ?>'><i class='fa fa-picture-o'></i></a>
                    </span>
                    <span class='WhiteSquare' title='Contattaci'>
                        <a class='contact-modal-toggle' href='#'><i class='fa fa-envelope-o'></i></a>
                    </span>
                    <div class='hiddenInfo'>
                        <input type='hidden' class='cntct_email_info' value='<?php echo $agentMail?>' />
                        <input type='hidden' class='cntct_telephone_info' value='<?php echo $agentTel?>' />
                        <input type='hidden' class='cntct_mobile_info' value='<?php echo $agentMobile?>' />
                        <input type='hidden' class='cntct_ref_code' value='<?php echo $properties[$i]["reference_code"]?>' />
                    </div>
                </div>
                <div class="box_type"><?php echo $price ?></div>
                <div class="status_type"><?php echo $properties[$i]["contract_status"] ?></div>
            </div>
            <h2 class="title"><a href="single-property.html"> <?php echo $title ?></a> <small class="small_title"><?php echo $address ?></small></h2>

            <div class="boxed_mini_details1 clearfix" >
                <span class="garage first" title="<?php echo $properties[$i]["box"] ?>"><strong>P.Auto</strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                <span class="bedrooms" title="<?php echo $properties[$i]["rooms"] ?>"><strong>Camere</strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                <span class="status" title="<?php echo $properties[$i]["bathrooms"] ?>"><strong>Bagni</strong><i class="icon-bath"></i> <?php echo $properties[$i]["bathrooms_short"] ?></span>
                <span class="sqft last"><strong>Mq</strong><i class="icon-sqft"></i> <?php echo $properties[$i]["mq"] ?></span>
            </div>
        </div><!-- end boxes -->
    </div>
    <?php } ?>
</div><!-- end row -->
