<?php
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");
require_once(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");
require_once(BASE_PATH."/app/classes/Utils.php");

$imgInfo = new ImagesInfo();
$logoPath = $imgInfo->info["agencies_logo"]["normal"]["path"];
$propertiesImgPath = SITE_URL."/".$imgInfo->info["properties"]["normal"]["path"];

$numPropertiesToShow = 6;
$agencyId = $agencyDetails[0]["id"];


//GET ALL DETAILS AND STORE IT INTO VARIABLES
$logoUrl = SITE_URL."/".$logoPath.$agencyDetails[0]["logo_round_path"];
$agencyName = $agencyDetails[0]["name"];
$agencyMail = $agencyDetails[0]["agent_email"];
$agencyPhone = $agencyDetails[0]["agent_phone"];
$agencyMobile = $agencyDetails[0]["agent_mobile_phone"];
$agencyFax = $agencyDetails[0]["agent_fax"];
$agencySkype = $agencyDetails[0]["agent_skype"];
$agencySite = SITE_URL."/agenzie/$agencyName";
$agencyDescription = $agencyDetails[0]["description"];

//GET ALL AGENCY PROPERTIES
$agencyProperties = $agMng->getAgencyProperties($agencyId,1);


?>

<div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">

<?php include (BASE_PATH."/app/include/Widgets/contact_form.inc.php");?>

    <!-- ############## SEZIONE IMMOBILI RECENTI #############-->
    <div class="property_wrapper boxes clearfix">
        <h3 class="big_title">Immobili recenti<small>Guarda gli immobili più recenti trattati</small></h3>
        <div class="row">
            <?php
            $cnt = count($agencyProperties);
            $numPropertiesToShow = $cnt > $numPropertiesToShow ? $numPropertiesToShow:$cnt;

                for($i = 0; $i<$numPropertiesToShow; $i++){
                    $id = $agencyProperties[$i]["id"];
                    $propertyLink = SITE_URL."/".PropertyLinksAndTitles::getDetailLinkFromId($id);
                    $img = $propertiesImgPath."/".$agencyProperties[$i]["img_name"];
                    $price = $agencyProperties[$i]["price"];
                    if($price == 0 ){
                        $price = "TR";
                        $priceTit = "Trattativa riservata";
                    }else{
                        $price ="&euro;".Utils::formatPrice($price);
                    }

                    $boxTxt = $agencyProperties[$i]["box_short"];
                    if($boxTxt != "NO" && $boxTxt!= "NN"){
                        $boxTxt = "SI";
                    }

            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 ">
                        <div class="boxes">
                            <div class="boxes_img ImageWrapper">
                                <a href="<?php echo $propertyLink?>">
                                    <img class="img-responsive" src="<?php echo $img?>" alt="">
                                    <div class="PStyleNe"></div>
                                </a>
                                <div class="box_type"><?php echo $price?></div>
                            </div>
                            <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                            <div class="boxed_mini_details clearfix">
                                <span class="garage first" title="<?php echo $agencyProperties[$i]["box"] ?>"><strong>P.Auto</strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                                <span class="bedrooms" title="<?php echo $agencyProperties[$i]["rooms"] ?>"><strong>Camere</strong><i class="icon-bed"></i> <?php echo $agencyProperties[$i]["rooms_short"] ?></span>
                                <span class="status" title="<?php echo $agencyProperties[$i]["bathrooms"] ?>"><strong>Bagni</strong><i class="icon-bath"></i> <?php echo $agencyProperties[$i]["bathrooms_short"] ?></span>
                                <span class="sqft last" title="<?php echo $agencyProperties[$i]['mq']?> mq"><strong>Mq</strong><i class="icon-sqft"></i> <?php echo $agencyProperties[$i]["mq"] ?></span>
                            </div>
                        </div><!-- end boxes -->
                    </div>


            <?php
                }

            ?>


        </div><!-- end row -->
    </div>
</div><!-- end content -->