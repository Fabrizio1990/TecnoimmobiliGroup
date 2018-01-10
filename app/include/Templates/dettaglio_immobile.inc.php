<?php
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

$imgInfo = new ImagesInfo();

if(!isset($propertyM)){
    require_once(BASE_PATH."/app/classes/PropertyManager.php");

    $propertyM = new PropertyManager();
    $details = $propertyM->readAllAds("reference_code = ?","limit 1",array($reference_code),null,false);
    $details = $details[0];

}


$id_property = $details["id"];

$images = $propertyM->getImages("id_property =?",null,array($id_property) ,"img_name");


$imgPathMin = SITE_URL."/".$IMG_INFO["properties"]["min"]['path'];
$imgPathNormal = SITE_URL."/".$IMG_INFO["properties"]["normal"]['path'];
$imgPathBig = SITE_URL."/".$IMG_INFO["properties"]["big"]['path'];



// GENERO GLI ELEMENTI CON LE IMMAGINI QUI IN UN SOLO CICLO SIA PER LE MINUATURE CHE PER QUELLE GRANDI
$listImgNormal = "";
$listImgMin = "";
for($i = 0 ; $i < Count($images) ; $i++){
    $listImgNormal.= "<li><img class='img-thumbnail' src='".$imgPathBig.$images[$i]["img_name"]."' alt=''></li>";
    $listImgMin.= "<li><img class='img-thumbnail' src='".$imgPathMin.$images[$i]["img_name"]."' alt=''></li>";
}


// DATI AGENTE
$agentData = $propertyM->getAgentData($id_property);
$agentTel = $agentData[0]["phone"];
$agentMobile = $agentData[0]["mobile_phone"];
$agentMail = $agentData[0]["email"];



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
    <?php include (BASE_PATH."/app/include/Templates/dettaglio_immobile_contact_form.inc.php") ?>

        <?php include(BASE_PATH."/app/include/Templates/dettaglio_immobile_similar_properties.inc.php") ?>
</div><!-- end content -->
