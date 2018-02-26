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

if(!isset($_REQUEST["id_portal"]))
    header('Location: ' . SITE_URL."/AdminPanel/portals_panel.php");

// SETTGGIO VARIABILI PER VISUALIZZAZIONE PAGINA ATTIVA SUL MENU
$act_menu_propery		= true; // setta attivo il link modifica immobili
$act_list_properties 	= true; // setta attivo il menu immobili

$id_portal = $_REQUEST["id_portal"];


require_once(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

$pMng = new PortalManager();
$imgH = new ImagesInfo();

$imgPaths = $imgH->info;


$pDetails = $pMng->getPortalDetails($id_portal);
$pDetails = $pDetails[0];

$portal_name = $pDetails["portal_name"];
$portal_logo = SITE_URL."/".$imgPaths["portals"]["normal"]["path"].$pDetails["logo_name"];


?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TecnoimmobiliGroup | Visualizza Immobili Sul Portale <?php echo("(".$portal_name.")") ?> </title>
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
	<!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datepicker/datepicker3.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />
	
	<!-- Theme style -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skin -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/dist/css/skins/skin-blue.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- ----CUSTOM CSS ------ -->
	<link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/AdminPanel/css/common.css" />
    <!-- modals -->
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/modals.css" />

   <!-- CUSTOM JS UTILS (is there becouse i need to have its function on included widgets  -->
  <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <input type="hidden" id="id_portal" value="<?php echo$id_portal?>">

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
                    <small>Modifica immobili sul portale <?php echo("(".$portal_name.")") ?> </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Immobili</a></li>
					<li><a href="show_properties.php"><i class="fa fa-edit"></i> Modifica immobili sul portale</a></li>
                </ol>
            </section>

            <!-- MAIN CONTENT -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12 ALIGN_CENTER">
                        <img style="width: 300px;border:1px solid lightgrey;" src="<?php echo($portal_logo) ?>" />
                    </div>
                </div>
				<?php 
				include(BASE_PATH."/AdminPanel/include/contents/show_properties_on_portal.inc.php");
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
    <!-- Select2 -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/select2/select2.full.min.js"></script>
	<!-- InputMask -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- DataTables -->
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    

    <!-- ----CUSTOM JS ------ -->
    <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/admin_panel.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/options_populate.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>
	<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/show_properties_on_portal.js"></script>

	
	
	<!-- INIT COMPONENTS -->
    <script>
		
		var table;
		$(".sidebar-toggle").click(function(e){
			setTimeout(function(){ table.columns.adjust().responsive.recalc(); }, 700);
		});
        $(function() {
			/*-------- INIT DATATABLE ---------*/
            table = $('#DT_ADS').
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
                    [6, "desc"]
                ],
				"columnDefs": [
					{ targets: "_all",className: "ALIGN_CENTER"}
				  ],
                "sAjaxSource": SITE_URL+"/AdminPanel/ajax/get_properties_on_portal_datatable.ajax.php?id_portal=<?php echo $id_portal ?>",
                "fnDrawCallback": function( oSettings ) {
                    // serve per l' autowidht del tooltip
                    $('.Tooltip').tooltip({
                        container: 'body'
                    });
                },
            });
			
			
			
			//DATE RANGE PICKER INIT
			$('#sel_dateRange').daterangepicker(
                {
                    locale: {
                        format: 'DD-MM-YYYY'
                    },
                    startDate: '01-01-2010'
                }
            );
			
			//SELECT 2 INIT
			$(".select2").select2();
        });
    </script>
</body>

</html>