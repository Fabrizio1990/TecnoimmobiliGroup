<?php
require_once("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");


?>

<!DOCTYPE html>
<html>

    <head>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo(SITE_URL) ?>/css/modals.css" />



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
        

        
        <!-- My UTILS LO METTO PRIMA DI TUTTI I JS CHE SONO CARICATI A FONDO PAGINA PERCHé CONTIENE FUNZIONALITà UTILI A QUALSIASI JS , QUINDI SE CARICO UN JS DA UN INCLUDE DEVO AVERE UTILS -->
        <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>
        <script src="<?php echo(SITE_URL) ?>/js/UTILS_JQ.js"></script>
        <!-- Plugin per apertura modali -->
        <script src="<?php echo(SITE_URL) ?>/js/MODALS.js"></script>
        <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
        <script src="<?php echo(SITE_URL) ?>/AdminPanel/js/feed_generation.js"></script>



    </head>

    <body>


        <script>
            setTimeout(generateAllFeeds,2000);
        </script>
    </body>

</html>






