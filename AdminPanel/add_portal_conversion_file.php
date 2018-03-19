<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type;
    //$referente 	= $_COOKIE['refer_name'];
}else{
    header("location:login.php");
}

// SETTGGIO VARIABILI PER VISUALIZZAZIONE PAGINA ATTIVA SUL MENU
$act_menu_management                = true;
$act_feed_management                = true;
$act_portal_conversion_file         = true;



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TecnoimmobiliGroup | Aggiungi Conversioni tramite csv</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap_switch/css/bootstrap3/bootstrap-switch.min.css">
    <!-- Bootstrap Switch -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap_switch/css/bootstrap3/bootstrap-switch.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
   
	<!-- Select2 -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/select2/select2.min.css">

	<!-- Theme style -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skin -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/skins/skin-blue.min.css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- ----CUSTOM CSS ------ -->
	<link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/AdminPanel/css/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/AdminPanel/css/add_portal.css" />
    <!-- Jquery validate  override css-->
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/css/jquery_validate_override.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/css/jquery_validate_override_select2.css" />
    <!-- modals -->
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/modals.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/utils.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">

    <!-- UTILS JS AND FILE_UPLOAD JS are included here becouse i need it on included files and need to be loaded at start of page-->
    <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/form/IMAGES_UPLOAD.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<!-- HEADER BAR -->
        <?php include(BASE_PATH."/AdminPanel/include/templates/header_nav.inc.php"); ?>
		<!-- END HEADER BAR -->
		
        <!-- MENU LEFT -->
        <?php
        if($SS_usr->id_user_type==1)
            include(BASE_PATH."/AdminPanel/include/templates/menu_left_admin.inc.php");
        else
            include(BASE_PATH."/AdminPanel/include/templates/menu_left_user.inc.php");
        ?>
		<!-- END MENU LEFT -->
       

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Amministrazione
                    <small>Csv conversione</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Portali</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i> Csv conversione</a></li>
                </ol>
            </section>

            <!-- MAIN CONTENT -->
            <section class="content">
				<?php 
				include(BASE_PATH."/AdminPanel/include/contents/add_portal_conversion_file.inc.php");
				?>
            </section>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- /.content-wrapper -->
		
		<!--  FOOTER -->
        <?php include(BASE_PATH."/AdminPanel/include/templates/footer.inc.php"); ?>
		<!-- END FOOTER -->
		
        <!-- CONTROL SIDEBAR -->
                <?php 
				include(BASE_PATH."/AdminPanel/include/templates/control_sidebar.inc.php");
				?>
        <!-- END CONTROL SIDEBAR -->
        
        
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap_switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/dist/js/app.min.js"></script>
    <!-- Select2 -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/select2/select2.full.min.js"></script>
	<!-- Jquery validate -->
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/jquery.validate.min.js"></script>
    <!-- Jquery validate select2 override -->
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/jquery_validate_select2_override.js"></script>
    <!-- Jquery validate IT localization -->
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/jQueryValidate/js/localization/messages_it.js"></script>


    

    <!-- ----CUSTOM JS ------ -->
	
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/admin_panel.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap_switch/js/bootstrap-switch.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/add_portal_conversion_file.js"></script>



	<!-- INIT COMPONENTS -->
    <script>
        var options = {
            inverse: true,
            size: "mini",
            onColor: 'success',
            offColor: 'danger',
            animate: true,
        };
        $(".switch").bootstrapSwitch(options);


    </script>
</body>

</html>