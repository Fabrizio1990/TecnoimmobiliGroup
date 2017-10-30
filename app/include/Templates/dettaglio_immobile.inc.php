<?php
if(!isset($propertyM)){
    require_once(BASE_PATH."/app/classes/PropertyManager.php");
    $propertyM = new PropertyManager();
    $details = $propertyM->readAllAds("reference_code = ?","limit 1",array($reference_code),null,false);
    $details = $details[0];
}

$id_property = $details["id"];

$images = $propertyM->getImages("id_property =?",null,array($id_property) ,"img_name");


$imgPathNormal = $propertyM->getImagesPath("title = ?","limit 1", array("normal"),"path",false);
$imgPathNormal = SITE_URL."/".$imgPathNormal[0]["path"];
$imgPathMin = $propertyM->getImagesPath("title = ?","limit 1", array("min"),"path",false);
$imgPathMin = SITE_URL."/".$imgPathMin[0]["path"];

// GENERO GLI ELEMENTI CON LE IMMAGINI QUI IN UN SOLO CICLO SIA PER LE MINUATURE CHE PER QUELLE GRANDI
$listImgNormal = "";
$listImgMin = "";
for($i = 0 ; $i < Count($images) ; $i++){
    $listImgNormal.= "<li><img class='img-thumbnail' src='".$imgPathNormal.$images[$i]["img_name"]."' alt=''></li>";
    $listImgMin.= "<li><img class='img-thumbnail' src='".$imgPathMin.$images[$i]["img_name"]."' alt=''></li>";
}



?>

<div id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
    <div class="property_wrapper boxes clearfix">


        <div class="title clearfix">
            <h3><?php echo $title ?>
                <small class="small_title"><?php echo($details["street"]." ,".$details["street_num"]) ?> <mark>&euro;<?php echo(Utils::formatPrice($details["price"])) ?></mark></small>
            </h3>
        </div><!-- end title -->

        <!--<hr>-->

        <div class="boxed_mini_details1 col-4 clearfix">
            <div class="row">
                <span class="type first" title="<?php echo ($details["contract"] ." ".$details["tipology"])  ?>"><strong>Tipologia</strong> <?php echo $details["tipology"]?></span>
                <span class="type" title="<?php echo $details["locals"] ?>"><strong>Locali</strong> <?php echo $details["locals_short"]?></span>
                <span class="bedrooms" title="<?php echo $details["rooms"] ?>"><strong>Camere</strong><i class="icon-bed"></i> <?php echo $details["rooms_short"]?></span>
                <span class="sqft last" title="<?php echo $details["mq"] ?>"><strong>Superficie</strong><i class="icon-sqft"></i> <?php echo $details["mq"]?> m<sup>2</sup></span>

            </div>
        </div><!-- end boxed_mini_details1 -->

        <!--<hr>-->

        <div class="boxes_img">
            <div id="slider" class="flexslider clearfix">
                <ul class="slides">
                    <?php echo($listImgNormal); // SLIDESHOW IMMAGINI?>

                </ul>
            </div>
            <div id="carousel" class="flexslider clearfix">
                <ul class="slides">
                    <?php  echo( $listImgMin); // SLIDER MINIATURE ?>
                </ul>
            </div>
        </div><!-- boxes_img -->

        <hr>

        <div class="property_desc clearfix">
            <h4>Descrizione</h4>

            <?php echo $details["desc_it"]?>
        </div>

        <hr>

        <div class="table-details">
            <div class="row">
                <div class="col-lg-xs-12"><h4>Dettagli</h4></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Riferimento</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["reference_code"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Contratto</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["contract"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Tipologia</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["tipology"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Superficie</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["mq"]?> m<sup>2</sup></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Locali</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["locals"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Piano</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["floorN"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Classe energetica</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["energy_class"]?></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">IPE</div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php echo $details["ipe"]." ".$details["ipe_um"]?></div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 IMG_CLE">
                <img class="img-responsive" src="<?php echo(SITE_URL."/images/".$details["energy_class_image"])?>" />
            </div>
        </div>

        <hr>

        <div class="property_video clearfix">
            <h3 class="big_title">Property Video<small>See the details of the house on the video</small></h3>
            <iframe src="http://player.vimeo.com/video/73221098?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>

        <hr>

        <div class="property_map clearfix">
            <h3 class="big_title">Property Map<small>See the address of the house on the map</small></h3>
            <div class="map">
                <div id="map"></div>
                <?php //include BASE_PATH."/include/Widgets/maps.inc.php"; ?>
                <!--<div id="map"></div>-->
            </div>
        </div>
    </div><!-- end property_wrapper -->

    <div class="agent_boxes boxes clearfix">
        <div class="agent_details clearfix">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="agents_widget">
                    <h3 class="big_title">Mark ANTHONY<small>Total (36) pieces of property</small></h3>
                    <div class="agencies_widget row">
                        <div class="col-lg-5 clearfix">
                            <img class="img-thumbnail img-responsive" src="demos/03_team.png" alt="">
                        </div><!-- end col-lg-5 -->
                        <div class="col-lg-7 clearfix">
                            <div class="agencies_meta clearfix">
                                <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                <span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>
                                <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                <span><i class="fa fa-print"></i> +1 232 444 55 66</span>
                                <span><i class="fa fa-facebook-square"></i> <a href="#">facebook.com/tagline</a></span>
                                <span><i class="fa fa-twitter-square"></i> <a href="#">twitter.com/tagline</a></span>
                                <span><i class="fa fa-linkedin-square"></i> <a href="#">linkedin.com/tagline</a></span>
                            </div><!-- end agencies_meta -->

                        </div><!-- end col-lg-7 -->

                        <div class="clearfix"></div>

                        <hr>

                        <div class="col-lg-12">
                            <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.. Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free.</p>
                        </div>
                    </div><!-- end agencies_widget -->
                </div><!-- agents_widget -->
            </div><!-- end col-lg-7 -->

            <div class="col-lg-5 col-md-5 col-sm-12">
                <h3 class="big_title">Contact Agent<small>Have a Question? Ask this Agent</small></h3>
                <form action="#" id="agent_form">
                    <input type="text" class="form-control" placeholder="Name">
                    <input type="text" class="form-control" placeholder="Email">
                    <input type="text" class="form-control" placeholder="Phone">
                    <input type="text" class="form-control" placeholder="Subject">
                    <textarea class="form-control" rows="5" placeholder="Message goes here..."></textarea>
                    <button class="btn btn-primary">Send Message</button>
                </form><!-- end search form -->

            </div><!-- end col-lg-6 -->
        </div><!-- end agent_details -->
    </div><!-- end agent_boxes -->
        <?php include(BASE_PATH."/app/include/Templates/dettaglio_immobile_similar_properties.inc.php") ?>
</div><!-- end content -->
