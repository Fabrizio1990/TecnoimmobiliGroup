<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type;
    if($tipo_utente!="1")
        header("location:login.php");
}else{
    header("location:login.php");
}

// SETTGGIO VARIABILI PER VISUALIZZAZIONE PAGINA ATTIVA SUL MENU
$act_menu_news_management		= true; // setta attivo il link news management

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TecnoimmobiliGroup  | Gestione news</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/AdminPanel/css/news_management.css" />
    <!-- modals -->
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/modals.css" />

    <!-- UTILS JS and  modals.js are included here becouse i need it on included files and need to be loaded at start of page-->
    <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/UTILS_JQ.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>
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
                    <small>Gestione News</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-group"></i> Gestione News</a></li>
                </ol>
            </section>

            <!-- MAIN CONTENT -->
            <section class="content">
                <input type="hidden" id="id_edit_news" />
                <?php
                include(BASE_PATH."/AdminPanel/include/widgets/ckEditor.inc.php");
                ?>


				<?php 
				include(BASE_PATH."/AdminPanel/include/widgets/timeline_widget.inc.php");
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
    <!-- AdminLTE App -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/dist/js/app.min.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <!--<script src="<?php echo(SITE_URL) ?>/libs/frontend/ckEditor/js/ckeditor_4.5.7.js"></script>-->

    <!-- ----CUSTOM JS ------ -->
	
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/admin_panel.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/news_management.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        });
    </script>

</body>

</html>