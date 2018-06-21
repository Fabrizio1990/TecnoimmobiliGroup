<html>
<head>
    <title>Cancella Immobili</title>
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">

</head>
<body>
<?php
error_reporting(E_ALL);

require_once(BASE_PATH . "/app/classes/DbManager.php");
$dbH = new DbManager();

$dbH->executeQuery("CALL `DeleteProperties`(-9999)");
echo"CANCELLATI DA DB";




$images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.gif"));

foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}


$images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.gif"));

foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

$images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.gif"));
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

$images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.gif"));
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

$images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.gif"));
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}



echo "FATTO";
?>

</body>
</html>