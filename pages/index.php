<?php
require_once(BASE_PATH."/app/classes/Utils.php");
$parallax = true;
$menuSelected ="home";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="TecnoimmobiliGroup, Case e appartamenti, Case vendita,Case in affitto, Aste immobiliari, Torino, Aosta, Ciriè, Liguria"><!-- TODO AGGIUNGI META KEYS -->
        <meta name="author" content="Fabrizio Coppolecchia">

        <title>Appartamenti in vendita e in affitto - TecnoimmobiliGroup</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/css/bootstrap_3_0.css" rel="stylesheet">
        <!-- Style CSS -->
        <link href="<?php echo(SITE_URL) ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo(SITE_URL) ?>/css/utils.css" rel="stylesheet">

        <!-- Jquery validate  override css-->
        <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/jquery_validate_override.css" />

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


        <!-- MODALE CONTATTACI -->
        <?php include(BASE_PATH."/app/include/Templates/contact_form_modal.inc.php") ?>

        <!-- ########## TOOLBAR LATERALE "PER ORA NON UTILIZZATA ##########-->
        <?php //include(SITE_URL."/app/include/Templates/toolbar.inc.php") ?>

        <!-- ######## TOPBAR contenente contatti e pulsante di login ########-->
        <?php include(BASE_PATH."/app/include/Templates/topbar.inc.php") ?>


        <!-- ######## HEADER contenente Logo, social buttons e menu ########-->
        <?php include(BASE_PATH."/app/include/Templates/header.inc.php") ?>

        <!-- ######## SLIDER E RICERCA IMMOBILI ########-->
        <?php //include(SITE_URL."/app/include/Templates/slider_index.inc.php") ?>

        <!-- ######## RICERCA IMMOBILI ########-->
        <?php include(BASE_PATH . "/app/include/Templates/research_panel_1.inc.php") ?>


        <!-- ######## Popular properties ########-->
        <section id="three-parallax" class="parallax" style="background-image: url('<?php echo SITE_URL."/images/ParallaxBg/02_parallax.jpg" ?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="threewrapper">
                <div class="overlay1 dm-shadow">
                    <div class="container">
                        <?php include(BASE_PATH."/app/include/Templates/popular_properties_bar.inc.php") ?>
                    </div><!-- end container -->
                </div><!-- end overlay1 -->
            </div><!-- end threewrapper -->
        </section><!-- end parallax -->

        <!-- ######## SERVIZI ########-->
        <section class="generalwrapper dm-shadow clearfix">
            <div class="container">
                <?php include(BASE_PATH."/app/include/Templates/services_bar.inc.php") ?>
            </div>
        </section>

        <!-- ######## LAST SEARCHED PROPERTIES ########-->
        <section id="three-parallax" class="parallax" style="background-image: url('<?php echo SITE_URL."/images/ParallaxBg/02_parallax.jpg" ?>');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="threewrapper">
                <div class="overlay1 dm-shadow">
                    <div class="container">
                        <?php include(BASE_PATH."/app/include/Templates/last_research.inc.php") ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ######## LOCAL PARTNERS ########-->
        <section class="generalwrapper dm-shadow clearfix">
            <div class="container" id="localPartners">
                <?php include(BASE_PATH."/app/include/Templates/localPartners.inc.php") ?>
            </div>
        </section>

        <!-- ######## FOOTER ########-->
        <?php include(BASE_PATH."/app/include/Templates/footer.inc.php") ?>
  

        <!-- Bootstrap core and JavaScript's
        ================================================== -->
        <script src="<?php echo SITE_URL."/libs/frontend/jQuery/js/jquery-1.10.2.min.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/bootstrap/js/bootstrap.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/jQueryParallax/js/jquery.parallax.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/jQueryFitvids/js/jquery.fitvids.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/jQueryUnveiEffects/js/jquery.unveilEffects.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/bootstrap_typeHead/js/bootstrap-typeahead.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/Others/retina-1.1.0.js"?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/Others/fhmm.js"?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/bootstrapSelect/js/bootstrap-select.js" ?>"></script>
        <script src="<?php echo SITE_URL."/libs/frontend/fancyBox/jquery.fancybox.pack.js" ?>"></script>
        <!-- Jquery validate -->
        <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/jquery.validate.min.js"></script>
        <!-- Jquery validate -->
        <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/jquery_validate_selectpicker_override.js"></script>
        <!-- Jquery validate additional methods -->
        <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/jquery_validate_additional_methods.js"></script>
        <!-- Jquery validate IT localization -->
        <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/localization/messages_it.js"></script>

        <script src="<?php echo SITE_URL."/js/application.js" ?>"></script>
        <script src="<?php echo SITE_URL . "/js/form/form_utils.js" ?>"></script>
        <script src="<?php echo SITE_URL."/AdminPanel/js/options_populate.js" ?>"></script>
        <script src="<?php echo SITE_URL."/js/research_panel_1.js" ?>"></script>
        <script src="<?php echo SITE_URL. "/js/contact_form.js" ?>"></script>
        <script src="<?php echo SITE_URL. "/js/contact_modal.js" ?>"></script>


        <!-- FlexSlider JavaScript
        ================================================== -->
        <script src="<?php echo SITE_URL."/libs/frontend/jQueryFlexSlider/js/jquery.flexslider.js" ?>"></script>
        <script>
            $(window).load(function() {
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: true,
                    directionNav: false,
                    animationLoop: true,
                    slideshow: true,
                    itemWidth: 114,
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

                $('#property-slider .flexslider').flexslider({
                    animation: "fade",
                    slideshowSpeed: 6000,
                    animationSpeed:	1300,
                    directionNav: true,
                    controlNav: false,
                    keyboardNav: true
                });
            });

            //bindButtons();

        </script>

    </body>
</html>