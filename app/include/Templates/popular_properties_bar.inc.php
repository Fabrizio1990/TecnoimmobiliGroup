<?php
    require_once(BASE_PATH."/app/classes/PropertyManager.php");
    require_once(BASE_PATH."/app/classes/Utils.php");
    $propertyMng = new PropertyManager();

    $properties = $propertyMng->readAllAds("id_ads_status = 1","order by date_up desc Limit 8 ",null,null,false);
?>
<section id="three-parallax" class="parallax" style="background-image: url('<?php echo SITE_URL."/images/ParallaxBg/02_parallax.jpg" ?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="threewrapper">
        <div class="overlay1 dm-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center clearfix">
                        <h3 class="big_title">Ultimi annunci inseriti/aggiornati <small>Visualizza i nostri ultimi annunci</small></h3>
                    </div>
                    <?php for($i = 0 ; $i< Count($properties);$i++){
                        $boxTxt = $properties[$i]["box_short"];
                        $title  = $properties[$i]["tipology"]." in ".$properties[$i]["contract"];
                        $address = $properties[$i]["street"]."  ".$properties[$i]["city"];
                        if($boxTxt != "NO" && $boxTxt!= "NN"){
                            $boxTxt = "SI";
                        }

                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="boxes first" data-effect="slide-bottom">
                            <div class="ImageWrapper boxes_img">
                                <img class="img-responsive" src="<?php echo SITE_URL."/public/images/images_properties/min/".$properties[$i]["img_name"] ?>" alt="">
                                <div class="ImageOverlayH"></div>
                                <div class="Buttons StyleSc">
                                                <span class="WhiteSquare"><a class="fancybox" href="<?php echo SITE_URL."/public/images/images_properties/big/".$properties[$i]["img_name"] ?>"><i class="fa fa-search"></i></a>
                                                </span>
                                    <span class="WhiteSquare"><a class="fancybox" data-type="iframe" href="http://player.vimeo.com/video/64550407?autoplay=1"><i class="fa fa-video-camera"></i></a>
                                                </span>
                                    <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                </div>
                                <div class="box_type"><?php echo "&euro;".Utils::formatPrice($properties[$i]["price"]) ?></div>
                                <div class="status_type"><?php echo $properties[$i]["contract_status"] ?></div>
                            </div>
                            <h2 class="title"><a href="single-property.html"> <?php echo $title ?></a> <small class="small_title"><?php echo $address ?></small></h2>

                            <div class="boxed_mini_details1 clearfix" >
                                <span class="garage first" title="<?php echo $properties[$i]["box"] ?>"><strong>Box</strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                <span class="bedrooms" title="<?php echo $properties[$i]["rooms"] ?>"><strong>Camere</strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                                <span class="status" title="<?php echo $properties[$i]["bathrooms"] ?>"><strong>Bagni</strong><i class="icon-bath"></i> <?php echo $properties[$i]["bathrooms_short"] ?></span>
                                <span class="sqft last"><strong>Mq</strong><i class="icon-sqft"></i> <?php echo $properties[$i]["mq"] ?></span>
                            </div>
                        </div><!-- end boxes -->
                    </div>
                    <?php } ?>



                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end overlay1 -->
    </div><!-- end threewrapper -->
</section><!-- end parallax -->