<html>
    <head></head>
    <body>
    <?php
    if(isset($_FILES["conversionCSV"])){
        require_once(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");
        $convMng = new OptionsConversionManager();


        $file = file_get_contents($_FILES['conversionCSV']['tmp_name']);
        parseCsv($convMng,$file);

    }else{
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="conversionCSV" id="conversionCSV"/>
            <input type="submit" value="Invia" />
        </form>

    <?php
    }
    ?>
    </body>
</html>

<?php
    function parseCsv($convMng,$text){
        $lines = explode(PHP_EOL, $text);
        $linesCount = count($lines);

        // START FROM 1 TO AVOID HEADERS
        for($i = 1 ; $i < $linesCount ; $i++){
            $rowValues = explode(",", $lines[$i]);
            $portalName     = $rowValues[0];
            $portalId = $convMng->portalNameToId($portalName);
            $tableCatId     = $rowValues[1];
            $idOriginalVal  = $rowValues[2];
            // THIRD ELEMENT IS ONLY TO CSV COMPRENSION BUT IS NOT USED
            $convertedVal   = $rowValues[4];

            $ret = $convMng->saveConversion($portalId,$tableCatId,$idOriginalVal,$convertedVal,false);

        }
        //echo("ci sono ".count($lines));
    }
?>