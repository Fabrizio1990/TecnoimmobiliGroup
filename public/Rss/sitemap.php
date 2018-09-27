<?php
header("content-type: text/xml; charset=utf-8");
echo("<?xml version='1.0' encoding='UTF-8'?>");
require_once ("../../config.php");
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!--https://www.sitemaps.org/protocol.html-->
    <url>
        <loc><?php echo SITE_URL ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/aste_immobiliari.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/perizie_bancarie.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/perizie_legali.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/servizi_tecnici.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/agenzie.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/chi_siamo.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/dove_siamo.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/lavora_con_noi.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL."/partner.html" ?></loc>
        <lastmod>2018-10-10</lastmod>
        <changefreq>always</changefreq>
        <priority>0.8</priority>
    </url>

<?php
///TODO INSERISCI LINK IMMOBILI

include BASE_PATH."/app/classes/PropertyManager.php";
include BASE_PATH."/app/classes/PropertyLinksAndTitles.php";

$pMng = new PropertyManager();


$properties = $pMng->getAllProperties("id_ads_status = 1");


foreach ($properties as $property){
    $contract = $property["contract"];
    $tipology = $property["tipology"];
    $street = $property["street"];
    $town = $property["town"];
    $refCode = $property["reference_code"];
    ?>
    <url>
        <loc><?php echo SITE_URL."/".PropertyLinksAndTitles::getDetailLink($contract,$tipology,$street,$town,$refCode); ?></loc>
        <lastmod><?php echo date("Y-m-d")?></lastmod>
        <changefreq>always</changefreq>
        <priority>1</priority>
    </url>

    <?php
}

?>


</urlset>
