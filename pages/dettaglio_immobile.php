<?php
if(!isset($_GET["rif"]))
    header("location:index.html");



include(BASE_PATH."/app/classes/PropertyManager.php");
require_once(BASE_PATH."/app/classes/Utils.php");
require_once(BASE_PATH."/app/classes/PropertyLinksAndTitles.php");

$propertyM = new PropertyManager();

$reference_code = $_GET["rif"];
$title          = $_GET["title"];
$details = $propertyM->readAllAds("reference_code = ?","limit 1",array($reference_code),null,false);
if(Count($details)<=0 || $details[0]["id_ads_status"] != 1)
    header("location: ".SITE_URL."/404.html");


$details = $details[0];

$title = PropertyLinksAndTitles::getTitleFromRef($reference_code,3);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TecnoimmobiliGroup, Case in vendita,Case in affitto,Aste immobiliari, Dettaglio Immobile, Torino, Aosta, Ciriè, Liguria"><!-- TODO AGGIUNGI META KEYS -->
    <meta name="author" content="Fabrizio Coppolecchia">

    <title><?php echo PropertyLinksAndTitles::getTitleFromRef($reference_code,4). " - TecnoimmobiliGroup" ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/css/bootstrap_3_0.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/style.css" rel="stylesheet">
    <!-- utils CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/utils.css" rel="stylesheet">
    <!-- DETTAGLIO CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/dettaglio_immobile.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-144x144.png">

</head>
<body>


<!-- ########## TOOLBAR LATERALE "PER ORA NON UTILIZZATA ##########-->
<?php //include(SITE_URL."/app/include/Templates/toolbar.inc.php") ?>


<!-- ######## TOPBAR contenente contatti e pulsante di login ########-->
<?php include(BASE_PATH."/app/include/Templates/topbar.inc.php") ?>


<!-- ######## HEADER contenente Logo, social buttons e menu ########-->
<?php include(BASE_PATH."/app/include/Templates/header.inc.php") ?>


<section class="post-wrapper-top dm-shadow clearfix">
    <div class="container">
        <div class="post-wrapper-top-shadow">
            <span class="s1"></span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo SITE_URL."/index.html" ?>">Home</a></li>
                <li>Dettaglio immobile</li>
            </ul>
            <h2><?php echo $title ?></h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        </div>
    </div>
</section><!-- end post-wrapper-top -->

<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            <!-- ######## SCHEDA DETTAGLIO ########-->
            <?php include(BASE_PATH . "/app/include/pages_content/dettaglio_immobile.inc.php") ?>
            <!-- ######## COLONNA A DESTRA DELLA SCHEDA DETTAGLIO ########-->
            <?php include(BASE_PATH . "/app/include/pages_content/dettaglio_immobile_right_panel.inc.php") ?>
            <!-- ######## IMMOBILI SIMILI ########-->
            <?php //include(SITE_URL."/app/include/Templates/dettaglio_immobile_similar_properties.inc.php") ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end generalwrapper -->

<!-- ######## FOOTER ########-->
<?php include(BASE_PATH."/app/include/Templates/footer.inc.php") ?>


<!-- Bootstrap core and JavaScript's
================================================== -->
<script src="<?php echo SITE_URL . "/libs/frontend/jQuery/js/jquery-1.10.2.min.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/bootstrap/js/bootstrap.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryParallax/js/jquery.parallax.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryFitvids/js/jquery.fitvids.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryUnveiEffects/js/jquery.unveilEffects.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/Others/retina-1.1.0.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/Others/fhmm.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/bootstrapSelect/js/bootstrap-select.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/fancyBox/jquery.fancybox.pack.js" ?>"></script>
<script src="<?php echo SITE_URL . "/js/application.js" ?>"></script>
<script src="<?php echo SITE_URL . "/js/Widgets/maps_utils.js" ?>" ></script>
<script src="<?php echo SITE_URL . "/js/dettaglio_immobile.js" ?>" ></script>
<script src="<?php echo SITE_URL . "/js/contact_form.js" ?>"></script>



<!-- FlexSlider JavaScript
================================================== -->
<script src="<?php echo SITE_URL."/libs/frontend/jQueryFlexSlider/js/jquery.flexslider.js" ?>"></script>
<script>
    $(window).load(function() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: false,
            animationLoop: true,
            slideshow: true,
            itemWidth: 122,
            itemMargin: 0,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel"
        });


    });

    function initMap(){
        var address = "<?php echo $details["street"] ." " . $details["street_num"]?>";
        var town = "<?php echo $details["town"]?>";
        var country = "<?php echo $details["country"]?>";
        createMap(address,town,country,18);
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvZ4NUmjF7SgprOVDTqd7ToL8jq7Z1ynE&callback=initMap">
</script>

</body>
</html>

