<?php
$sp_category = $details["id_category"];
$sp_contract = $details["id_contract"];
$sp_town     = $details["id_town"];



$params = array("id_contract = ?","id_category = ?","id_town = ?","reference_code != ?","id_ads_status = 1","id_contract_status not in(2,4)");
$values = array($sp_contract,$sp_category,$sp_town,$reference_code);

$resSP = $propertyM->readAllAds($params,array("ORDER BY FIELD(id_contract,".$sp_contract.") desc","limit 3"),$values,null,false);



$imgPathNormal = SITE_URL."/".$IMG_INFO["properties"]["medium"]['path'];
$imgPathBig = SITE_URL."/".$IMG_INFO["properties"]["big"]['path'];

$imgEof  = "img_eof/Immagine_eof.jpg";
?>

<div class="property_wrapper boxes clearfix">
    <h3 class="big_title">Ricerche correlate<small>Immobili simili a quello ricercato</small></h3>
    <div class="row">
        <?php
        for($i = 0 ;$i < Count($resSP);$i++){

            $link = PropertyLinksAndTitles::getDetailLink($resSP[$i]["contract"],$resSP[$i]["tipology"],$resSP[$i]["street"],$resSP[$i]["town"],$resSP[$i]["reference_code"]);

            $title = PropertyLinksAndTitles::getTitleNoDb($resSP[$i]["tipology"],$resSP[$i]["contract"],$resSP[$i]["town"]);


            $agentTel = $resSP[$i]["agent_phone"];
            $agentMobile = $resSP[$i]["agent_mobile_phone"];
            $agentMail = $resSP[$i]["agent_email"];

            $reference_code = $resSP[$i]["reference_code"];

            $boxTxt = $resSP[$i]["box_short"];
            if($boxTxt != "NO" && $boxTxt!= "NN"){
                $boxTxt = "SI";
            }
            $price = $resSP[$i]["price"];
            if($price == 0 ){
                $price = "TR";
                $priceTit = "Trattativa riservata";
            }else{
                $price ="&euro;".Utils::formatPrice($price);
            }

            /*  IMAGES */
            $imgAlt = $resSP[$i]["tipology"].' in '.$resSP[$i]['contract']." ".$resSP[$i]["district"].", ".$resSP[$i]["street"];
            $imgNormal =  $imgPathNormal."/".$imgEof;
            $imgBig =  $imgPathBig."/".$imgEof;
            if($resSP[$i]["img_name"]!=""){
                $imgNormal =   $imgPathNormal.$resSP[$i]["img_name"];
                $imgBig =  $imgPathBig.$resSP[$i]["img_name"];
            }

        ?>


            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="boxes">
                    <div class="boxes_img ImageWrapper">
                            <img class="img-responsive" src="<?php echo $imgNormal?>" alt="<?php echo $imgAlt ?>" />
                            <div class="ImageOverlayH"></div>
                            <div class="Buttons StyleB">
                                <span class='WhiteSquare' title='Vai al dettaglio'><a  href='<?php echo $link ?>'><i class='fa fa-search'></i></a></span>
                                <span class='WhiteSquare' title='Ingrandisci Foto'><a  class='fancybox' href='<?php echo $imgBig ?>'><i class='fa fa-picture-o'></i></a></span>
                                <!--<span class='WhiteSquare' title='Contattaci'><a class='contact-modal-toggle' href="#"><i class='fa fa-envelope-o'></i></a></span>-->
                                <div class='hiddenInfo'>
                                    <input type='hidden' class='email_info' value='<?php echo $agentMail?>' />
                                    <input type='hidden' class='telephone_info' value='<?php echo $agentTel?>' />
                                    <input type='hidden' class='mobile_info' value='<?php echo $agentMobile?>' />
                                </div>
                            </div>
                        <div class="box_type" title="<?php echo $priceTit ?>"><?php echo $price ?></div>
                        <div class="status_type"><?php echo $resSP[$i]["contract_status"] ?></div>
                    </div>
                    <h2 class="title"><a href="../../../index.php"><?php echo PropertyLinksAndTitles::getTitleFromRef($reference_code,2) ?></a></h2>
                    <div class="boxed_mini_details clearfix">
                        <span class="first" title="<?php echo $resSP[$i]["box"] ?>"><strong></strong><i class="icon-garage"></i> <?php echo $boxTxt ?></span>
                        <span class="" title="<?php echo $resSP[$i]["rooms"] ?>"><strong></strong><i class="icon-bed"></i> <?php echo $resSP[$i]["rooms_short"] ?></span>
                        <span class="last" title="<?php echo $resSP[$i]["bathrooms"] ?>" ><strong></strong><i class="icon-bath"></i><?php echo $resSP[$i]["bathrooms_short"] ?>  </span>
                    </div>
                </div><!-- end boxes -->
            </div>


        <?php
        }
        ?>

    </div><!-- end row -->
</div>
