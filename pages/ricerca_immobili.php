<?php
require_once(BASE_PATH."/app/classes/Utils.php");
$parallax = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESTATE PLUS - Real Estate HTML5 Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/css/bootstrap_3_0.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/style.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic'
          rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />

    <!-- CUSTOM STYLES CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/ricerca_immobili.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144"
          href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-144x144.png">

</head>
<body>

<!-- MODALE CONTATTACI -->
<?php include(BASE_PATH."/app/include/Templates/contact_form_modal.inc.php") ?>

<!-- ########## TOOLBAR LATERALE "PER ORA NON UTILIZZATA ##########-->
<?php //include(BASE_PATH."/app/include/Templates/toolbar.inc.php") ?>

<!-- ######## TOPBAR contenente contatti e pulsante di login ########-->
<?php include(BASE_PATH . "/app/include/Templates/topbar.inc.php") ?>


<!-- ######## HEADER contenente Logo, social buttons e menu ########-->
<?php include(BASE_PATH . "/app/include/Templates/header.inc.php") ?>

<!-- ######## RICERCA IMMOBILI ########-->
<?php include(BASE_PATH . "/app/include/Templates/research_panel_small.inc.php") ?>

<!-- NAVIGAZIONE -->

<section class="post-wrapper-top dm-shadow clearfix" style="background-color:#fff;">
    <div class="container">

        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Lista immobili</li>
            </ul>
            <h2><?php echo "XXXX risultati per: case in vendita Torino: Centro " ?></h2>
        </div>
    </div>
</section><!-- end post-wrapper-top -->

<!-- NAVIGAZIONE END -->


<!-- ######## LIST PROPERTIES ########-->
<?php include(BASE_PATH . "/app/include/Templates/research_properties_list.inc.php") ?>


<!-- ######## LAST SEARCHED PROPERTIES ########-->
<?php include(BASE_PATH."/app/include/Templates/last_research.inc.php") ?>

<!-- ######## FOOTER ########-->
<?php include(BASE_PATH."/app/include/Templates/footer.inc.php") ?>


<!-- Bootstrap core and JavaScript's
   ================================================== -->
<script src="<?php echo SITE_URL . "/libs/frontend/jQuery/js/jquery-1.10.2.min.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/bootstrap/js/bootstrap.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryParallax/js/jquery.parallax.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryFitvids/js/jquery.fitvids.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/jQueryUnveiEffects/js/jquery.unveilEffects.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/bootstrap_typeHead/js/bootstrap-typeahead.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/Others/retina-1.1.0.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/Others/fhmm.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/bootstrapSelect/js/bootstrap-select.js" ?>"></script>
<script src="<?php echo SITE_URL . "/libs/frontend/fancyBox/jquery.fancybox.pack.js" ?>"></script>
<script src="<?php echo SITE_URL . "/js/application.js" ?>"></script>

<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

<script src="<?php echo SITE_URL . "/js/research_panel_1.js" ?>"></script>
<script src="<?php echo SITE_URL . "/js/contact_modal.js" ?>"></script>


<script>
    $(window).load(function () {

        /*-------- INIT DATATABLE ---------*/
        var table = $('#DT_PROPERTIES').DataTable({
            "language": {
                "url": BASE_PATH+"/AdminPanel/plugins/datatables/localizations/italian.json"
            },
            "bPaginate": true,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": true,
            "bLengthChange": false,
            "pageLength": 5,
            "sAjaxSource": BASE_PATH+"/ajax/properties_list_datatable.ajax.php",
            "initComplete": function() {
                bindButtons();
            }

        });

    });
</script>

</body>
</html>