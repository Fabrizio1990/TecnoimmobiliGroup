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

$images = glob(BASE_PATH."/public/images/images_properties/big/*.jpg");
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

$images = glob(BASE_PATH."/public/images/images_properties/normal/*.jpg");
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

$images = glob(BASE_PATH."/public/images/images_properties/min/*.jpg");
foreach($images as $image){
    //echo($image);
    if(!unlink($image))
        echo "Failed to delete image ".$image;
}

echo "FATTO";
?>

</body>
</html>