<?php
require_once(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImageManager.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

$pMng = new PortalManager();
$imgH = new ImagesInfo();

$imgPath = SITE_URL."/".$imgH->info["portals"]["min"]["path"];



?>
<div class="boxes clearfix ALIGN_LEFT LIGHT-GREY-BORDER PADDING-30 BG_COLOR_WITHE">
<h2>
    I Nostri Partner
</h2>
<div class="row">
    <div class="col-md-12 ">
        <p class="JUSTIFIED">
            <b class="COLOR_BLUE">Tecnoimmobili Group Service®</b> collabora direttamente con i più importanti Portali immobiliari italiani senza intermediari. Gli immobili caricati nel nostro portale sono immediatamente visibili in tutta Italia con più di <b class="COLOR_BLUE">5.000</b> visite giornaliere, il tutto si traduce nei <b class="COLOR_BLUE">Vantaggi</b> di chi ci affida un incarico per vendere il proprio immobile o di chi cerca un immobile in acquisto, avendo un ottima visibiltà su tutta la rete. Un ringrziamento particolare da tutto il Gruppo è rivolto ai nostri <b class="COLOR_BLUE">Partner</b> che hanno permesso tutto questo.
        </p>
    </div>
</div>
<br>
<hr>
<br>

<?php
$pList = $pMng->getPortalList();


foreach ($pList as $portal){
    if($portal["portal_enabled"]){
?>
        <div class="col-md-2 col-sm-4 col-xs-6 PADDING-5 col_partner_container">
            <div data-effect="helix">
                <a class="partner_link" target="_blank" rel="nofollow" href="<?php echo $portal["portal_site"]?>">
                    <img class="img-responsive MARGIN_0_AUTO POINTER partner_image" src="<?php echo($imgPath."/".$portal["logo_name"]); ?>" alt="<?php echo "TecnoimmobiligGroup partner:". $portal["portal_name"]?>" title="<?php echo $portal["portal_name"]?>">
                </a>
            </div>
        </div>

  <?php
    }

}
?>

</div>
