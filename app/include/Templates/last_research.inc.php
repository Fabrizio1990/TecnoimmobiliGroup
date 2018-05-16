<?php
require_once(BASE_PATH."/app/classes/PropertyManager.php");
require_once(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");

$propertyMng = new PropertyManager();
$elemXRow = 3;

$imgPathNormal = $IMG_INFO["properties"]["medium"]['path'];
$imgPathBig = $IMG_INFO['properties']['big']['path'];
$imgEof  = "img_eof/Immagine_eof.jpg";
?>

<!-- Style CSS -->
<link href="<?php echo(SITE_URL) ?>/css/last_research.css" rel="stylesheet">

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

                        $link = PropertyLinksAndTitles::getDetailLink($properties[$i]["contract"],$properties[$i]["tipology"],$properties[$i]["street"],$properties[$i]["town"],$properties[$i]["reference_code"]);

                        $agentTel = $properties[$i]["agent_phone"];
                        $agentMobile = $properties[$i]["agent_mobile_phone"];
                        $agentMail = $properties[$i]["agent_email"];


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

                        $title  = $properties[$i]["tipology"]." ".$properties[$i]["contract"];
                        $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                        $address = $properties[$i]["street"];

                        /*  IMAGES */
                        $imgNormal =  SITE_URL."/".$imgPathNormal."/".$imgEof;
                        $imgBig =  $imgPath = SITE_URL."/".$imgPathBig."/".$imgEof;
                        if($properties[$i]["img_name"]!=""){
                            $imgNormal = SITE_URL."/".$imgPathNormal.$properties[$i]["img_name"];
                            $imgBig = SITE_URL."/".$imgPathBig.$properties[$i]["img_name"];
                        }
                        if($i % $elemXRow == 0){
                            if($i!=0) {echo("</div>");}
                            echo("<div class='row row-eq-height'>");
                        }
                    ?>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="boxes">
                                <div class="ImageWrapper boxes_img">
                                    <img class="img-responsive" src="<?php echo $imgNormal ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
                                    <div class="ImageOverlayH"></div>
                                    <div class="Buttons StyleSc">
                                        <span class='WhiteSquare' title='Vai al dettaglio'><a  href='<?php echo $link ?>'><i class='fa fa-search'></i></a></span>
                                        <span class='WhiteSquare' title='Ingrandisci Foto'><a class='fancybox' href='<?php echo $imgBig ?>'><i class='fa fa-picture-o'></i></a></span>
                                        <span class='WhiteSquare' title='Contattaci'><a class='contact-modal-toggle' href='#'><i class='fa fa-envelope-o'></i></a></span>
                                        <div class='hiddenInfo'>
                                            <input type='hidden' class='email_info' value='<?php echo $agentMail?>' />
                                            <input type='hidden' class='telephone_info' value='<?php echo $agentTel?>' />
                                            <input type='hidden' class='mobile_info' value='<?php echo $agentMobile?>' />
                                        </div>
                                    </div>
                                    <div class="box_type"><?php echo $price ?></div>
                                    <div class="status_type"><?php echo $properties[$i]["contract_status"] ?></div>
                                </div>
                                <h2 class="title"><a href="single-property.html"> <?php echo $title2?></a></h2>
                                <div class="boxed_mini_details  clearfix">
                                    <span class="first" title="<?php echo $properties[$i]["box"] ?>"><strong></strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                    <span class="" title="<?php echo $properties[$i]["rooms"] ?>"><strong></strong><i class="icon-bed"></i> <?php echo $properties[$i]["rooms_short"] ?></span>
                                    <span class="last" title="<?php echo $properties[$i]["bathrooms"] ?>" ><strong></strong><i class="icon-bath"></i><?php echo $properties[$i]["bathrooms_short"] ?>  </span>
                                </div>
                            </div><!-- end boxes -->
                        </div>
                    <?php
                        if($i == Count($properties) -1)
                            echo("</div>");
                    }
                    ?>

                </div><!-- tab pane-->

                <div class="tab-pane" id="tab_frequently_searched">
                    <?php
                    $properties = $propertyMng->readAllAds("id_ads_status = 1","order by views desc,date_up desc Limit 6 ",null,null,false);

                    for($i = 0 ; $i < Count($properties) ; $i++){
                        $link = PropertyLinksAndTitles::getDetailLink($properties[$i]["contract"],$properties[$i]["tipology"],$properties[$i]["street"],$properties[$i]["town"],$properties[$i]["reference_code"]);

                        $agentTel = $properties[$i]["agent_phone"];
                        $agentMobile = $properties[$i]["agent_mobile_phone"];
                        $agentMail = $properties[$i]["agent_email"];

                        $boxTxt = $properties[$i]["box_short"];
                        $title  = $properties[$i]["tipology"]." in ".$properties[$i]["contract"];
                        $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                        $address = $properties[$i]["street"];
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

                        /*  IMAGES */
                        $imgNormal =  $imgPath = SITE_URL."/".$imgPathNormal."/".$imgEof;
                        $imgBig =  $imgPath = SITE_URL."/".$imgPathBig."/".$imgEof;
                        if($properties[$i]["img_name"]!=""){
                            $imgNormal = SITE_URL."/".$imgPathNormal.$properties[$i]["img_name"];
                            $imgBig =  SITE_URL."/".$imgPathBig.$properties[$i]["img_name"];
                        }
                        if($i % $elemXRow == 0){
                            if($i!=0) {echo("</div>");}
                            echo("<div class='row row-eq-height'>");
                        }
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="boxes">
                                <div class="ImageWrapper boxes_img">
                                    <img class="img-responsive" src="<?php echo $imgNormal ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
                                    <div class="ImageOverlayH"></div>
                                    <div class="Buttons StyleSc">
                                        <span class='WhiteSquare' title='Vai al dettaglio'><a  href='<?php echo $link ?>'><i class='fa fa-search'></i></a></span>
                                        <span class='WhiteSquare' title='Ingrandisci Foto'><a  class='fancybox' href='<?php echo $imgBig ?>'><i class='fa fa-picture-o'></i></a></span>
                                        <span class='WhiteSquare' title='Contattaci'><a class='contact-modal-toggle' href='#'><i class='fa fa-envelope-o'></i></a></span>
                                        <div class='hiddenInfo'>
                                            <input type='hidden' class='email_info' value='<?php echo $agentMail?>' />
                                            <input type='hidden' class='telephone_info' value='<?php echo $agentTel?>' />
                                            <input type='hidden' class='mobile_info' value='<?php echo $agentMobile?>' />
                                        </div>
                                    </div>
                                    <div class="box_type"><?php echo $price ?></div>
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
                        if($i == Count($properties) -1)
                            echo("</div>");
                    }
                    ?>
                </div><!-- tab pane -->


                <div class="tab-pane" id="tab_last_insert">
                    <?php
                    $properties = $propertyMng->readAllAds("id_ads_status = 1","order by date_ins desc Limit 6 ",null,null,false);

                    for($i = 0 ; $i < Count($properties) ; $i++){
                        $link = PropertyLinksAndTitles::getDetailLink($properties[$i]["contract"],$properties[$i]["tipology"],$properties[$i]["street"],$properties[$i]["town"],$properties[$i]["reference_code"]);

                        $agentTel = $properties[$i]["agent_phone"];
                        $agentMobile = $properties[$i]["agent_mobile_phone"];
                        $agentMail = $properties[$i]["agent_email"];

                        $boxTxt = $properties[$i]["box_short"];
                        $title  = $properties[$i]["tipology"]." in ".$properties[$i]["contract"];
                        $title2 = $properties[$i]["tipology"]." ".$properties[$i]["town"];
                        $address = $properties[$i]["street"];
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

                        /*  IMAGES */
                        $imgNormal =  $imgPath = SITE_URL."/".$imgPathNormal."/".$imgEof;
                        $imgBig =  $imgPath = SITE_URL."/".$imgPathBig."/".$imgEof;
                        if($properties[$i]["img_name"]!="") {
                            $imgNormal = SITE_URL . "/" . $imgPathNormal . $properties[$i]["img_name"];
                            $imgBig = SITE_URL . "/" . $imgPathBig . $properties[$i]["img_name"];
                        }
                        if($i % $elemXRow == 0){
                            if($i!=0) {echo("</div>");}
                            echo("<div class='row row-eq-height'>");
                        }
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="boxes">
                                <div class="ImageWrapper boxes_img">
                                    <img class="img-responsive" src="<?php echo $imgNormal ?>" title="<?php echo $title . " " .$address ?>" alt="<?php echo $title . " " .$address ?>">
                                    <div class="ImageOverlayH"></div>
                                    <div class="Buttons StyleSc">
                                        <span class='WhiteSquare' title='Vai al dettaglio'><a  href='<?php echo $link ?>'><i class='fa fa-search'></i></a></span>
                                        <span class='WhiteSquare' title='Ingrandisci Foto'><a  class='fancybox' href='<?php echo $imgBig ?>'><i class='fa fa-picture-o'></i></a></span>
                                        <span class='WhiteSquare' title='Contattaci'><a class='contact-modal-toggle' href="#"><i class='fa fa-envelope-o'></i></a></span>
                                        <div class='hiddenInfo'>
                                            <input type='hidden' class='email_info' value='<?php echo $agentMail?>' />
                                            <input type='hidden' class='telephone_info' value='<?php echo $agentTel?>' />
                                            <input type='hidden' class='mobile_info' value='<?php echo $agentMobile?>' />
                                        </div>
                                    </div>
                                    <div class="box_type"><?php echo $price ?></div>
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
                        if($i == Count($properties) -1)
                            echo("</div>");
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
                <?php

                require_once(BASE_PATH."/app/classes/AgencyManager.php");
                $agMng = new AgencyManager();
                $resAg = $agMng->GetRandomAgenciesData(3);

                for($i = 0; $i < count($resAg) ; $i++){
                ?>

                    <div class="agent boxes clearfix" data-effect="slide-right">
                    <div class="image">
                        <img class="img-circle img-responsive img-thumbnail" src="<?php echo SITE_URL.'/public/images/images_agencies_icons/min/deflogo_round.png' ?>" alt="Logo Agenzia" title="tecnoimmobiligroup Agenzia">
                    </div><!-- image -->
                    <div class="agent_desc">
                        <h3 class="title"><?php echo $resAg[$i]["name"] ?></h3>
                        <p><span><i class="fa fa-envelope"></i> <?php echo $resAg[$i]["email"] ?></span></p>
                        <p><span><i class="fa fa-phone-square"></i> <?php echo $resAg[$i]["phone"] ?></span></p>
                    </div><!-- agento desc -->
                </div>
                <?php
                }
                ?>


            </div><!-- end of agents_widget -->
        </div><!-- end of widget -->

    </div><!-- end col-lg-4 -->
</div><!-- end row -->
