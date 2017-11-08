<?php
$category = $details["id_category"];
$contract = $details["id_contract"];
$town     = $details["id_town"];



$params = array("id_contract = ?","id_category = ?","id_town = ?","reference_code != ?","id_ads_status = 1","id_contract_status not in(2,4)");
$values = array($contract,$category,$town,$reference_code);

$resSP = $propertyM->readAllAds($params,array("ORDER BY FIELD(id_contract,".$contract.") desc","limit 3"),$values,null,false);

$imgPathMin = $propertyM->getImagesPath("title = ?","limit 1", array("min"),"path",false)[0]["path"];
$imgPathBig = $propertyM->getImagesPath("title = ?","limit 1", array("big"),"path",false)[0]["path"];
$imgEof  = "img_eof/Immagine_eof.jpg";
?>

<div class="property_wrapper boxes clearfix">
    <h3 class="big_title">Similar Properties<small>View other properties from this agent</small></h3>
    <div class="row">
        <?php
        for($i = 0 ;$i < Count($resSP);$i++){


            $agentData = $propertyM->getAgentData($resSP[$i]["id"]);
            $agentTel = $agentData[0]["phone"];
            $agentMobile = $agentData[0]["mobile_phone"];
            $agentMail = $agentData[0]["email"];

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
            $imgMin =  $imgPath = SITE_URL."/".$imgPathMin."/".$imgEof;
            $imgBig =  $imgPath = SITE_URL."/".$imgPathBig."/".$imgEof;
            if($resSP[$i]["img_name"]!=""){
                $imgMin =   SITE_URL."/".$imgPathMin.$resSP[$i]["img_name"];
                $imgBig =  SITE_URL."/".$imgPathBig.$resSP[$i]["img_name"];
            }

        ?>


            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="boxes">
                    <div class="boxes_img ImageWrapper">
                            <img class="img-responsive" src="<?php echo $imgMin?>" alt="<?php echo $imgAlt ?>" />
                            <div class="ImageOverlayH"></div>
                            <div class="Buttons StyleB">
                                <span class='WhiteSquare' title='Vai al dettaglio'><a  href='<?php echo PropertyLinksAndTitles::getDetailLinkFromRef($reference_code) ?>'><i class='fa fa-search'></i></a></span>
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
                    <h2 class="title"><a href="single-property.html"><?php echo PropertyLinksAndTitles::getTitle($reference_code,2) ?></a></h2>
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
