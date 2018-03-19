<html>
    <head></head>
    <body>
    <?php
    if(isset($_FILES["conversionCSV"])){
        set_time_limit(0);
        require_once(BASE_PATH . "/app/classes/Portals&Feed/OptionsConversionManager.php");
        $convMng = new OptionsConversionManager();

        $fieldDelimiter = $_REQUEST["separator"];
        $file = file_get_contents($_FILES['conversionCSV']['tmp_name']);
        parseCsv($convMng,$file,$fieldDelimiter,PHP_EOL);
    }else{
    ?>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Separatore di campi
                    <input class="form-control" type="text" name="separator" id="separator" value=";"/>
                </label>
            </div>
            <div class="form-group">

                <label>Usa Header<br>
                    <input class="switch" type='checkbox' name="use_header" id="use_header" checked />
                </label>
            </div>
            <div class="form-group">
                <label>Permetti conversioni Con stringa vuota<br>
                    <input class="switch" type='checkbox' name="empty_conversion" id="empty_conversion"  />

            </div>
            <div class="form-group">
                <label>Csv
                    <input class="form-control" type="file" name="conversionCSV" id="conversionCSV"/>
                </label>
            </div>
            <input type="submit" value="Salva conversioni" />
        </form>

    <?php
    }
    ?>
    </body>
</html>

<?php
    function parseCsv($convMng,$text,$fieldDelimiter,$lineDelimiter){
        $lines = explode($lineDelimiter, $text);
        $linesCount = count($lines);


        // START FROM 1 TO AVOID HEADERS
        for($i = 1 ; $i < $linesCount ; $i++){

            $rowValues = explode($fieldDelimiter, $lines[$i]);

            //IF CONVERTED VALUE == NF I WILL SKIP THIS CONVERSION
            $convertedVal   = $rowValues[4];
            if($convertedVal=="NF" || $convertedVal == "")
                continue;

            $portalName     = $rowValues[0];
            $portalId = $convMng->portalNameToId($portalName);
            $tableCatId     = $rowValues[1];
            $idOriginalVal  = $rowValues[2];
            $originalTxt  = $rowValues[3];
            // THIRD ELEMENT IS ONLY TO CSV COMPRENSION BUT IS USED ONLY FOR LOG
            if($portalName == ""){
                echo("ERR: Manaca il nome del portale a linea "+$i +" per il valore" +$originalTxt);
                continue;
            }
            if($tableCatId == ""){
                echo("ERR: ID CATEGORIA TABELLA MANCANTE a linea "+$i +" per il valore" +$originalTxt);
                continue;
            }

            $ret = $convMng->saveConversion($portalId,$tableCatId,$idOriginalVal,$convertedVal,false);

        }
        //echo("ci sono ".count($lines));
    }
?>