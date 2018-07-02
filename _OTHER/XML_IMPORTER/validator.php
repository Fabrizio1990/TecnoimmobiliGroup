<?php
include("../../config.php");
include(BASE_PATH."/app/classes/SessionManager.php");
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type;
}else{
    header("location:".SITE_URL."/AdminPanel/login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""><!-- TODO AGGIUNGI META KEYS -->
    <meta name="author" content="Fabrizio Coppolecchia">

    <title>Importatore</title>

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
                <li>Importatore</li>
            </ul>
            <h2>Importatore TecnoimmobiliGroup</h2>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        </div>
    </div>
</section><!-- end post-wrapper-top -->

<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">
            <div style="display: none;" id="import_response" class="alert alert-warning">
                <p class="alert-link"></p>
            </div>

            <label for="inp_url">Url Xml</label>
            <input type="text" id="inp_propertiesImport_url" class="form-control" placeholder="url" value="http://www.tecnoimmobiligroup.it/_export/export_immobili.php?limit=10&order=id desc"/>

            <button class="btn btn-tecnoimm-blue" onclick="checkXml($(this).prev().val())">Controlla Xml</button>
            <button class="btn btn-tecnoimm-blue" onclick="startPropertiesImport()">Inizia import</button>

            <br>
            <br>
            <label for="inp_url">Url Xml</label>
            <input type="text" id="inp_requestsImport_url" class="form-control" placeholder="url" value="http://www.tecnoimmobiligroup.it/_export/export_richieste.php?limit=10&order=id_utente desc"/>


            <button class="btn btn-tecnoimm-blue" onclick="startRequestImport()">Inizia import</button>


            <!--<h4>Stato Importazione</h4>
            <div class="progress progress-striped active">
                <div data-effect="slide-left" class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                </div>
            </div>-->

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


<script>


    function checkXml(xmlUrl){
        //var xmlUrl =$("#inp_url").val();
        var responseTextContainer = $("#import_response p");

        $.ajax({
            method : 'POST',
            url : "check_xml.ajax.php",
            data :{"xmlUrl":xmlUrl},
            datatype : 'text/html',
            beforeSend: function( xrh ) {
                console.log("sending");
                $("#import_response").show();
                responseTextContainer.html("Parsing Data...");

            },
            success : function(data){
                responseTextContainer.html(data);
                console.log(data);

            },
            error : function(xhr, ajaxOptions, thrownError){
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
    }



    function startPropertiesImport(){
       var xmlUrl =$("#inp_propertiesImport_url").val();
       var responseTextContainer = $("#import_response p");
        $.ajax({
           method : 'POST',
           url : "properties_import.ajax.php",
           data :{"xmlUrl":xmlUrl},
           datatype : 'text/html',
           beforeSend: function( xrh ) {
                console.log("sending");
                $("#import_response").show();
                responseTextContainer.html("Parsing Data...");
                $(window).on("beforeunload", function() {
                return "Import in corso, sei sicuro di voler uscire?";//TANTO QUALSIASI COSA SCRIVO NON VIENE MOSTRATA, MA SEMBRA L' UNICO METODO PER MOSTRARE UN ALERT
               });
           },
           success : function(data){
               responseTextContainer.html(data);
               console.log(data);
               $(window).off("beforeunload");

           },
           error : function(xhr, ajaxOptions, thrownError){
               console.log(xhr.status);
               console.log(thrownError);
               $("#btn_stop_import").hide();
               $(window).off("beforeunload");
           },
           progress : function(e){
               console.log("progress call");
               if(e.lengthComputable) {
                   var pct = (e.loaded / e.total) * 100;
                   console.log(pct);
               }else{
                   console.log("lenght is not computable")
               }
           },
           uploadProgress :(function(e) {
               // tracking uploading
               console.log("uploadProgress call");
               if (e.lengthComputable) {
                 var percentage = Math.round((e.loaded * 100) / e.total);
                 console.log(percentage);
               }
           })

       })
    }


    function startRequestImport(){
        var xmlUrl =$("#inp_requestsImport_url").val();
        var responseTextContainer = $("#import_response p");
        $.ajax({
            method : 'POST',
            url : "requests_import.ajax.php",
            data :{"xmlUrl":xmlUrl},
            datatype : 'text/html',
            beforeSend: function( xrh ) {
                console.log("sending");
                $("#import_response").show();
                responseTextContainer.html("Parsing Data...");
                $(window).on("beforeunload", function() {
                    return "Import in corso, sei sicuro di voler uscire?";//TANTO QUALSIASI COSA SCRIVO NON VIENE MOSTRATA, MA SEMBRA L' UNICO METODO PER MOSTRARE UN ALERT
                });
            },
            success : function(data){
                responseTextContainer.html(data);
                console.log(data);
                $(window).off("beforeunload");

            },
            error : function(xhr, ajaxOptions, thrownError){
                console.log(xhr.status);
                console.log(thrownError);
                $("#btn_stop_import").hide();
                $(window).off("beforeunload");
            },
            progress : function(e){
                console.log("progress call");
                if(e.lengthComputable) {
                    var pct = (e.loaded / e.total) * 100;
                    console.log(pct);
                }else{
                    console.log("lenght is not computable")
                }
            },
            uploadProgress :(function(e) {
                // tracking uploading
                console.log("uploadProgress call");
                if (e.lengthComputable) {
                    var percentage = Math.round((e.loaded * 100) / e.total);
                    console.log(percentage);
                }
            })

        })
    }

</script>


</body>
</html>

