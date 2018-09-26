<?php
require_once("../../config.php");
require_once (BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once (BASE_PATH."/_OTHER/FEED_XML/Classes/FeedManager.php");

$pMng = new PortalManager();

Flog::logInfo(
    "************> INIZIO DELLA PROCEDURA DI GENERAZIONE DEI FEED",
    "feed_generation",
    false,
    false,
    true
);


$pRes = $pMng->getPortalList();
$ret = "" ;
$portals = array();
foreach ($pRes as $portal) {
    if($portal["portal_enabled"] != "1")
        continue;
    $portalName = $portal["portal_name"];

    Flog::logInfo(
            "@@@@@@>INIZIO GENERAZIONE DEI FEED DEL PORTALE $portalName",
            "feed_generation",
            true,
            false,
            false
    );

    $fRes = $pMng->getPortalFeeds($portal["id_portal"]);

    foreach ($fRes as $feed){
        $feedMng = new FeedManager();
        $feedMng->generateFeed($portalName,$feed["feed_name"],false);
    }

    Flog::logInfo(
        "@@@@@@> FINE GENERAZIONE DEI FEED DEL PORTALE $portalName",
        "feed_generation",
        true,
        false,
        false
    );
}


Flog::logInfo(
    "************> GENERAZIONE FEED COMPLETATA",
    "feed_generation",
    true,
    false,
    false
);





Flog::logInfo(
    "************> INIZIO SALVATAGGIO SU FTP",
    "feed_generation",
    false,
    false,
    true
);

foreach ($pRes as $portal) {
    if($portal["portal_enabled"] != "1")
        continue;
    $portalName = $portal["portal_name"];


    $fRes = $pMng->getPortalFeeds($portal["id_portal"]);

    foreach ($fRes as $feed){
        $feedMng = new FeedManager();
        $feedName = $feed["feed_name"];
        $feedExtension = $feed["feed_extension"];
        Flog::logInfo(
            "@@@@@@> MUOVO SU FTP IL FEED $portalName -> $feedName",
            "feed_generation",
            true,
            false,
            false
        );

        $ret = $feedMng->writeFeedOnFtp($portalName,$feedName);

        Flog::logInfo(
            $ret->retText,
            "feed_generation",
            true,
            false,
            false
        );
    }


}

Flog::logInfo(
    "************> FINE SALVATAGGIO SU FTP ",
    "feed_generation",
    true,
    false,
    false
);





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
            //setTimeout(setupAllFeedGeneration,5000);
        </script>
    </body>

</html>






