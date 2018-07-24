<?php
include("../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");
include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type;
    //$referente 	= $_COOKIE['refer_name'];
}else{
    header("location:login.php");
}

// SETTGGIO VARIABILI PER VISUALIZZAZIONE PAGINA ATTIVA SUL MENU
$act_menu_management    = true;
$act_feed_management    = true;

$id_portal = isset($_POST["id_portal"])?$_POST["id_portal"]:"";
if($id_portal == ""){
    header("location:".SITE_URL."/AdminPanel/portals_panel.php");
}
$prefixAction = $id_portal == ""?"Creazione" :"Modifica";





$pMng = new PortalManager();
$imgH = new ImagesInfo();
$imgPaths = $imgH->info;

$pDetails = $pMng->getPortalDetails($id_portal);
$pDetails = $pDetails[0];

$portal_name = $pDetails["portal_name"];
$portal_logo = SITE_URL."/".$imgPaths["portals"]["min"]["path"].$pDetails["logo_name"];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TecnoimmobiliGroup | <?php echo $prefixAction?> Conversioni Feed Portale (<?php echo("(".$portal_name.")") ?>)</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap_switch/css/bootstrap3/bootstrap-switch.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />

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
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo(SITE_URL) ?>/AdminPanel/css/add_portal_conversions.css" />-->
    <!-- modals -->
    <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/modals.css" />

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
                    <small><?php echo $prefixAction?> Conversioni Feed Portale <?php echo("(<b>".$portal_name.")</b>") ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Portale</a></li>
					<li><a href="#"><i class="fa fa-plus-square"></i> <?php echo $prefixAction?> Conversione Feed Portale <?php echo("(<b>".$portal_name."</b>)") ?></a></li>
                </ol>
            </section>

            <!-- MAIN CONTENT -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12 ALIGN_LEFT">
                        <img style="border:1px solid lightgrey;" src="<?php echo($portal_logo) ?>" />
                    </div>
                </div>
				<?php
				include(BASE_PATH . "/AdminPanel/include/contents/add_portal_conversions.inc.php");
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
    <!-- DataTables -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>



    <!-- ----CUSTOM JS ------ -->

	<script src="<?php echo(SITE_URL) ?>/AdminPanel/js/admin_panel.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/add_portal_conversions.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/options_populate.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>



	<!-- INIT COMPONENTS -->
    <script>



        $(function() {
            console.log("INIT DATATABLE");
            /*-------- INIT DATATABLE ---------*/
            table = $('#DT_CONVERSIONS').DataTable({
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
                    [0, "desc"]
                ],
                "columnDefs": [
                    {targets: "_all", className: "ALIGN_LEFT"}
                ],

                "sAjaxSource": SITE_URL + "/AdminPanel/ajax/get_conversions_datatable.ajax.php?portal_id=<?php echo $id_portal ?>",
                "fnDrawCallback": function( oSettings ) {
                    //BIND SAVE CONVERSIONS BUTTON
                    //BIND SINGLE DELETE CONVERSION BUTTON
                    $('.CONVERSION_BOX').on('click',".delete_conversion", function () {
                        var btnPressed   = $(this);
                        var parentRow    = btnPressed.closest(".row");
                        removeConversion(parentRow);
                    });


                    //BIND SINGLE SAVE CONVERSION BUTTON
                    $('.CONVERSION_BOX').on('click',".save_conversion", function () {
                        var btnPressed   = $(this);
                        var parentRow    = btnPressed.closest(".row");
                        var id_portal    = $("#id_portal").val();
                        var table        = parentRow.find(".sel_category").val();
                        var defVal       = parentRow.find(".sel_default_value").val();
                        var convertedVal = parentRow.find(".inp_converted_value").val();
                        var conversionIdField = parentRow.find(".id_conversion");
                        saveConversion(id_portal,table,defVal,convertedVal,conversionIdField);
                    });

                    // ONCHANGE (table select) i will get the field select options
                    $(".CONVERSION_BOX").on("change",".sel_category",function(ev){
                        console.log("CHANGE");
                        getTableValues($(this));
                    });
                },

            });
        });

    </script>

</body>

</html>