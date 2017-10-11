<?php
require_once(BASE_PATH."/app/classes/PropertyManager.php");
$propertyMng = new PropertyManager();
?>

<!-- Style CSS -->
<link href="<?php echo(SITE_URL) ?>/css/last_research.css" rel="stylesheet">

<section class="generalwrapper dm-shadow clearfix" id="">
    <div class="container">
        <div class="row last_reseach_container">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
                <div id="tabbed_widget" class="tabbable clearfix" data-effect="slide-bottom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_auction" data-toggle="tab">ASTE IMMOBILIARI</a></li>
                        <li><a href="#tab_frequently_searched" data-toggle="tab">RICERCHE FREQUENTI</a></li>
                        <li><a href="#tab_last_insert" data-toggle="tab">ULTIMI ANNUNCI INSERITI</a></li>
                    </ul>





                    <div class="tab-content tabbed_widget clearfix">
                        <div class="tab-pane active" id="tab_auction">

                            <?php
                            $properties = $propertyMng->readAllAds(array("id_ads_status = 1","id_contract = 7"),"order by date_up desc Limit 6 ",null,null,false);

                            for($i = 0 ; $i < Count($properties) ; $i++){
                                $boxTxt = $properties[$i]["box_short"];
                                $title  = $properties[$i]["tipology"]." ".$properties[$i]["contract"];
                                $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                                $address = $properties[$i]["street"];
                                if($boxTxt != "NO" && $boxTxt!= "NN"){
                                    $boxTxt = "SI";
                                }

                            ?>
                                <div class="col-lg-7 col-md-4 col-sm-4">
                                    <div class="boxes">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="<?php echo SITE_URL."/public/images/images_properties/normal/".$properties[$i]["img_name"] ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
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
                                        <h2 class="title"><a href="single-property.html"> <?php echo $title2?></a></h2>
                                        <div class="boxed_mini_details clearfix">
                                            <span class="first" title="<?php echo $properties[$i]["box"] ?>"><strong></strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                            <span class="" title="<?php echo $properties[$i]["rooms"] ?>"><strong></strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                                            <span class="last" title="<?php echo $properties[$i]["bathrooms"] ?>" ><strong></strong><i class="icon-bath"></i><?php echo $properties[$i]["bathrooms_short"] ?>  </span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                            <?php
                            }
                            ?>

                        </div><!-- tab pane-->

                        <div class="tab-pane" id="tab_frequently_searched">
                            <?php
                            $properties = $propertyMng->readAllAds("id_ads_status = 1","order by views desc,date_up desc Limit 6 ",null,null,false);

                            for($i = 0 ; $i < Count($properties) ; $i++){
                                $boxTxt = $properties[$i]["box_short"];
                                $title  = $properties[$i]["tipology"]." in ".$properties[$i]["contract"];
                                $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                                $address = $properties[$i]["street"];
                                if($boxTxt != "NO" && $boxTxt!= "NN"){
                                    $boxTxt = "SI";
                                }

                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="boxes">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="<?php echo SITE_URL."/public/images/images_properties/normal/".$properties[$i]["img_name"] ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
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
                                        <h2 class="title"><a href="single-property.html"> <?php echo $title2?></a></h2>
                                        <div class="boxed_mini_details clearfix">
                                            <span class="first" title="<?php echo $properties[$i]["box"] ?>"><strong></strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                            <span class="" title="<?php echo $properties[$i]["rooms"] ?>"><strong></strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                                            <span class="last" title="<?php echo $properties[$i]["bathrooms"] ?>" ><strong></strong><i class="icon-bath"></i><?php echo $properties[$i]["bathrooms_short"] ?>  </span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                                <?php
                            }
                            ?>
                        </div><!-- tab pane -->


                        <div class="tab-pane" id="tab_last_insert">
                            <?php
                            $properties = $propertyMng->readAllAds("id_ads_status = 1","order by date_ins desc Limit 6 ",null,null,false);

                            for($i = 0 ; $i < Count($properties) ; $i++){
                                $boxTxt = $properties[$i]["box_short"];
                                $title  = $properties[$i]["tipology"]." in ".$properties[$i]["contract"];
                                $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                                $address = $properties[$i]["street"];
                                if($boxTxt != "NO" && $boxTxt!= "NN"){
                                    $boxTxt = "SI";
                                }

                                ?>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="boxes">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="<?php echo SITE_URL."/public/images/images_properties/normal/".$properties[$i]["img_name"] ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
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
                                        <h2 class="title"><a href="single-property.html"> <?php echo $title2?></a></h2>
                                        <div class="boxed_mini_details clearfix">
                                            <span class="first" title="<?php echo $properties[$i]["box"] ?>"><strong></strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                            <span class="" title="<?php echo $properties[$i]["rooms"] ?>"><strong></strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                                            <span class="last" title="<?php echo $properties[$i]["bathrooms"] ?>" ><strong></strong><i class="icon-bath"></i><?php echo $properties[$i]["bathrooms_short"] ?>  </span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                                <?php
                            }
                            ?>
                        </div><!-- tab pane -->

                    </div><!-- tab-content -->
                </div> <!-- widget -->
            </div><!-- end col-lg-7 -->

            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12 last clearfix">
                <div class="widget clearfix">
                    <div class="agents_widget">
                        <div class="title"><h3><i class="fa fa-users"></i> Agenzie in evidenza</h3></div>
                        <div class="agent boxes clearfix" data-effect="slide-right">
                            <div class="image">
                                <img class="img-circle img-responsive img-thumbnail" src="<?php echo SITE_URL.'/public/images/images_properties/min/img_eof/Immagine_eof.jpg'?>" alt="Logo Agenzia">
                            </div><!-- image -->
                            <div class="agent_desc">
                                <h3 class="title">Mustapha COLLIENS</h3>
                                <p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                            </div><!-- agento desc -->
                        </div>
                        <div class="agent boxes clearfix" data-effect="slide-right">
                            <div class="image">
                                <img class="img-circle img-responsive img-thumbnail" src="<?php echo SITE_URL.'/public/images/images_properties/min/img_eof/Immagine_eof.jpg'?>" alt="Logo Agenzia">
                            </div><!-- image -->
                            <div class="agent_desc">
                                <h3 class="title">Stephania JOHNSON</h3>
                                <p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                            </div><!-- agento desc -->
                        </div>
                        <div class="agent boxes clearfix" data-effect="slide-right">
                            <div class="image">
                                <img class="img-circle img-responsive img-thumbnail" src="<?php echo SITE_URL.'/public/images/images_properties/min/img_eof/Immagine_eof.jpg'?>" alt="Logo Agenzia">
                            </div><!-- image -->
                            <div class="agent_desc">
                                <h3 class="title">Mark ANTHONY</h3>
                                <p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                            </div><!-- agento desc -->
                        </div>
                        <div class="agent boxes clearfix" data-effect="slide-right">
                            <div class="image">
                                <img class="img-circle img-responsive img-thumbnail" src="<?php echo SITE_URL.'/public/images/images_properties/min/img_eof/Immagine_eof.jpg'?>" alt="Logo Agenzia">
                            </div><!-- image -->
                            <div class="agent_desc">
                                <h3 class="title">Jenny ANTHONY</h3>
                                <p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                            </div><!-- agento desc -->
                        </div>
                    </div><!-- end of agents_widget -->
                </div><!-- end of widget -->

            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end dm_container -->
</section><!-- end generalwrapper -->