
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-2">
<?php

require_once (BASE_PATH."/app/classes/AgencyManager.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

$agMng = new AgencyManager();
$imgInfo = new ImagesInfo();

$logoPath = $imgInfo->info["agencies_logo"]["normal"]["path"];

$agencies = $agMng->getAgenciesData();

foreach ($agencies as $agency) {

    $agencyId = $agency["id"];

    $agencyName = $agency["name"];
    $logoUrl = $logoPath.$agency["logo_round_path"];
    $phone  = $agency["agent_phone"];
    $mobilePhone = $agency["agent_mobile_phone"];
    $email = $agency["agent_email"];
    $description = $agency["description"];
    $detailsLink = SITE_URL."/agenzie/".$agencyName;
    $address = $agency["street"].",".$agency["street_num"]." (".$agency["city_short"].")";

    ?>
    <div class="boxes agencies_widget">
        <div class="col-lg-3">
            <div class="image">
                <img class="img-responsive img-thumbnail" src="<?php echo $logoUrl ?>" alt="<?php echo $agencyName?> Logo">
            </div><!-- end agencies img -->
        </div>
        <div class="col-lg-9">
            <div class="agencies_desc">
                <h3 class="title"><?php echo $agencyName?></h3>
                <p><?php echo $description?></p>
                <a href="<?php echo $detailsLink?>" class="btn btn-tecnoimm-red btn-sm">Dettagli agenzia</a> <a href="list-view.html" class="btn btn-tecnoimm-blue btn-sm">Immobili trattati</a>

            </div><!-- agencies_desc -->
        </div>
        <div class="clearfix"></div>
        <div class="agencies_meta">
            <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span>
            <span><i class="fa fa-phone-square"></i> <a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></span>
            <span><i class="fa fa-phone-square"></i> <a href="tel:<?php echo $mobilePhone ?>"><?php echo $mobilePhone ?></a></span>
            <span><i class="fa fa-map-marker"></i> <a href="https://maps.google.com/maps?q=<?php echo $address ?>" target="_blank"><?php echo $address ?></a></span>
            <!--<span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>-->

        </div><!-- end agencies_meta -->
    </div><!-- end boxes -->

<?php
}
?>
</div>
