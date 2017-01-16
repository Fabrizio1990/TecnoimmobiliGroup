<?php 

$autenticato =isset($_COOKIE["authenticated"])?$_COOKIE["authenticated"]:0;
if($autenticato=="1"){
	$agency_id 		= $_COOKIE['agency_id'];
	$tipo_utente 	= $_COOKIE['user_type'] == "1"? "%" : $_COOKIE['user_type'];
	$referente 		= $_COOKIE['refer_name'];
}else{
	header("location:login.php");
}

require_once("../include/config.php");
include(BASE_URL."/include/connessione_mysqli.php");

$conn = openConn();

// SETTGGIO VARIABILI PER VISUALIZZAZIONE PAGINA ATTIVA SUL MENU
$act_menu_propery		= true;
$act_del_properties 	= true;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/skins/skin-blue.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- ----CUSTOM CSS ------ -->
	<link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/AdminPanel/common.css" />
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
		<!-- HEADER BAR -->
        <?php include(BASE_URL."/AdminPanel/include/templates/header_nav.inc.php"); ?>
		<!-- END HEADER BAR -->
		
        <!-- MENU LEFT -->
        <?php include(BASE_URL."/AdminPanel/include/templates/menu_left.inc.php"); ?>
		<!-- END MENU LEFT -->
       

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Amministrazione
                    <small>Pannello di controllo</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Pannello di controllo</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
				<?php 
				include(BASE_URL."/AdminPanel/include/contents/index.inc.php");
				?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
		
		<!--  FOOTER -->
        <?php include(BASE_URL."/AdminPanel/include/templates/footer.inc.php"); ?>
		<!-- END FOOTER -->
		
        <!-- CONTROL SIDEBAR -->
                <?php 
				include(BASE_URL."/AdminPanel/include/templates/control_sidebar.inc.php"); 
				?>
        <!-- END CONTROL SIDEBAR -->
        
        
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo(SITE_URL) ?>/js/adminPanel/index.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!--<script src="dist/js/demo.js"></script>-->
    <!-- DataTables -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    

    <!-- ----CUSTOM JS ------ -->
	
	<script src="<?php echo(SITE_URL) ?>/js/AdminPanel/admin_panel.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/common.js"></script>
	<!-- per widget statistiche utenti -->
	<script src="<?php echo(SITE_URL) ?>/js/AdminPanel/statistic_widged.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/AdminPanel/ads_status_manager.js"></script>
	
	<!-- DataTable Init -->
    <script>
        $(function() {
            $('#DT_ADS').on('xhr.dt', function ( e, settings, json, xhr ) {
				$('body').addClass("sidebar-collapse");
			}).
			DataTable({
                "language": {
                    "url": "plugins/datatables/localizations/italian.json"
                },
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "bDeferRender": true,
                "lengthMenu": [5, 10, 15],
                "pageLength": 5,
                "order": [
                    [8, "desc"]
                ],
				"columnDefs": [
					{ targets: "_all",className: "ALING_CENTER"}
				  ],
                "sAjaxSource": "../ajax/AdminPanel/get_ads_datatable.ajax.php",

            });
        });
		
    </script>
<?php 
closeConn($conn);
?>
</body>

</html>