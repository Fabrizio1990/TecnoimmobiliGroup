<?php
include(BASE_PATH."/app/classes/UserEntity.php");

if(SessionManager::getVal("authenticated") != null){
    $SS_usr = SessionManager::getVal("user",true);
    $agency_id 		= $SS_usr->id;
    $tipo_utente 	= $SS_usr->id_user_type ;
    if($tipo_utente!="1")
        header("location:login.php");
}else{
    header("location:login.php");
}

?>

<html>
<head>
    <title>Gestione dati</title>
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">

</head>
<body>

<?php
error_reporting(E_ALL);


    

    ?>
        <form action="" method="POST" name="form_clean_data">
            <table>
            <tr>
                <td>Cancella immobili</td>
                <td><input type ="checkbox" name="clean_properties" /></td>
            </tr>
            <tr>
                <td>Cancella portali</td>
                <td><input type ="checkbox" name="clean_portals" /></td>
            </tr>
            <tr>
                <td>Cancella feed</td>
                <td><input type ="checkbox" name="clean_feeds" /></td>
            </tr>
            <tr>
                <td>Cancella documenti</td>
                <td><input type ="checkbox" name="clean_documents" /></td>
            </tr>
            <tr>
                <td>Cancella mail</td>
                <td><input type ="checkbox" name="clean_mails" /></td>
            </tr>
            <tr>
                <td>Cancella news</td>
                <td><input type ="checkbox" name="clean_news" /></td>
            </tr>
                <td> <input type="submit" name = "clean_data" value="cancella dati" /></td>
            </tr>
           
           
        
        </form>
    <?php

if(isset($_POST["clean_data"])){
    require_once(BASE_PATH . "/app/classes/DbManager.php");
    $dbH = new DbManager();
    echo "<h2>INIZIO</h2>";
    
    //############ START PROPERTIES CLEAN #############
    if(isset($_POST["clean_properties"])){
        $dbH->executeQuery("CALL `DeleteProperties`(-9999)");
        echo"<p>IMMOBILI CANCELLATI DAL DATABASE";
        //get all image type allowed
        $images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["extra"]["path"]."*.gif"));
        //deleted image index count
        $i = 0;
        foreach($images as $image){
            //delete image
            if(!unlink($image))
                echo "<br>Failed to delete image ".$image;
            $i++;
        }
        echo("<br> $i 'EXTRA' images deleted");

        $images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["big"]["path"]."*.gif"));
        $i = 0;
        foreach($images as $image){
            if(!unlink($image))
                echo "<br>Failed to delete image ".$image;
            $i++;
        }
        echo("<br> $i 'BIG' images deleted");

        $images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["normal"]["path"]."*.gif"));
        $i = 0;
        foreach($images as $image){
            if(!unlink($image))
                echo "<br>Failed to delete image ".$image;
            $i++;
        }
        echo("<br> $i 'NORMAL' images deleted");
        
        $images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["medium"]["path"]."*.gif"));
        $i = 0;
        foreach($images as $image){
            if(!unlink($image))
                echo "<br>Failed to delete image ".$image;
            $i++;
        }
        echo("<br> $i 'MEDIUM' images deleted");

        $images = array_merge(glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.jpg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.jpeg"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.png"),glob(BASE_PATH."/".$IMG_INFO["properties"]["min"]["path"]."*.gif"));
        $i = 0;
        foreach($images as $image){
            if(!unlink($image))
                echo "<br>Failed to delete image ".$image;
            $i++;
        }
        echo("<br> $i 'MIN' images deleted");
        echo("</p><hr>"); //chiusura paragrafo cancellazione immobili
    }
    //########## END PROPERTIES CLEAN ###########



    //############ START PORTALS CLEAN #############
    if(isset($_POST["clean_portals"])){
        $dbH->executeQuery("CALL `DeletePortals`(-9999)");
        echo"<p>PORTALI CANCELLATI DAL DATABASE";
        //DELETE PORTALS FOLDERS
        $portals_folder = BASE_PATH."/public/portals";
        //Get a list of all of the file names in the folder.
        $files = glob($portals_folder . '/*');
        echo($portals_folder);
        //Loop through the folder list.
        foreach($files as $file){
            echo($portals_folder."\\".$file);
            //Make sure that this is a folder 
            if(!is_file($file)){
                //Use the rmdir function to delete the folder.
               
                deleteDirectory($file);
                echo("<br>cartella ' ".$portals_folder."\\".$file." ' cancellata");
            }
        }
        echo"</p><hr>";
    }
    //########## END PORTALS CLEAN ###########



    //############ START FEEDS CLEAN (this will delete only feed db values, not the generated feeds)#############
    if(isset($_POST["clean_portals"]) || isset($_POST["clean_feeds"])){
        $dbH->executeQuery("TRUNCATE table prt_feeds;");
        $dbH->executeQuery("TRUNCATE table prt_feed_field_conversion;");
        echo"<p>FEED CANCELLATI DAL DATABASE";
        //DELETE FEEDS FOLDERS
        $portals_folder = BASE_PATH."/public/portals";
        //Get a list of all of the file names in the folder.
        $files = glob($portals_folder . '/*');
        //Loop through the portals list.
        foreach($files as $file){
            //enter into portal folder
            if(!is_file($file)){
                //go into Feeds folder
                $feed_folder = glob($file."/Feeds". '/*');
                //delete all feed of current cycled portal
                foreach($feed_folder as $feed_file){
                    if(is_file($feed_file)){
                        unlink($feed_file);
                        echo("<br>feed ' ".$file."/Feeds/"."\\".$feed_file." ' cancellato");
                    }
                }
            }
            echo("</p><hr>");
        }
    }
    //########## END FEEDS CLEAN ###########



    //############ START DOCUMENTS CLEAN #############
    if(isset($_POST["clean_documents"])){
        $dbH->executeQuery("TRUNCATE table documents");
        echo"<p>DOCUMENTI CANCELLATI DAL DATABASE";
        //DELETE DOCUMENTS
        $documents_folder = BASE_PATH."/public/documents";
        //Get a list of all of the file names in the folder.
        $files = glob($documents_folder . '/*');
        //Loop through the file list.
        foreach($files as $file){
            //Make sure that this is a file 
            if(is_file($file)){
                //Use the unlink function to delete the file.
                unlink($file);
                echo("<br>documento ' ".$documents_folder."\\".$file." ' cancellato");
            }
        }
        echo("</p><hr>");
    }
    //########## END DOCUMENTS CLEAN ###########



    //############ START MAILS CLEAN #############
    if(isset($_POST["clean_mails"])){
        $dbH->executeQuery("TRUNCATE table mailer");
        echo"<p>mails CANCELLATE DAL DATABASE</p></hr>";
    }
    //########## END MAILS CLEAN ###########



    //############ START NEWS CLEAN #############
    if(isset($_POST["clean_news"])){
        $dbH->executeQuery("TRUNCATE table news");
        echo"<p>news CANCELLATE DAL DATABASE</p></hr>";
    }
    //########## END NEWS CLEAN ###########


    echo "<h2>FINE</h2>";
}
?>

</body>
</html>


<?php
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}
?>