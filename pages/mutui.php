<?php
$parallax = false;
$menuSelected ="finanziaria";
$subMenuSelected = "mutui";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TecnoimmobiliGroup, Case e appartamenti, Case vendita,Case in affitto, Aste immobiliari, Torino, Aosta, Ciriè, Liguria"><!-- TODO AGGIUNGI META KEYS -->
    <meta name="author" content="Fabrizio Coppolecchia">

    <title>Mutui</title>

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

<!-- MODALE CONTATTACI -->
<?php include(BASE_PATH."/app/include/Templates/contact_form_modal.inc.php") ?>

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
                <li><a href="index.html">Home</a></li>
                <li>Finanziaria</li>
            </ul>
            <h2>Mutui</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        </div>
    </div>
</section><!-- end post-wrapper-top -->

<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <form name="mortgage" method="post" action=""><br /><br />
            <div style="width:180px;text-align:center;"><div style="border:1px solid #000;align:center;text-align:center;"><div style="font-size:12px;line-height:20px;font-family: arial; font-weight:bold;background:#eeeeee;padding: 3px 1px;"><a href="https://www.calcoloratamutuo.com/" style="color:#000000;font-size:14px;text-decoration:none;line-height:16px;" >Calcolo Rata Mutuo</a></div><table width=99% style="align:center;color:#333333;"><tr><br/><td align="right">Importo:</td><td align="left"><input type="text" name="m_loan" value="250000" size=5>€</td></tr><tr><td align="right">Tasso:</td><td align="left"><input type="text" name="m_rate" value="4.5" size=5>%</td></tr><tr><td align="right">Durata:</td><td align="left"><input type="text" name="m_year" value="20" size=5>anni</td></tr><tr align="center"><td colspan=2><br/><input type="button" value="Calcola mutuo" onclick="cal_mortgageamm(this.form);"></td></tr><tr align="center"><td colspan=2><div id="mortgagesummaryamm"></div></td></tr></table><script src="http://mut.jcdn.it/mutuow/3.php"></script></div></div></form>

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
<script src="<?php echo SITE_URL . "/js/aste_immobiliari.js" ?>"></script>





</body>
</html>

