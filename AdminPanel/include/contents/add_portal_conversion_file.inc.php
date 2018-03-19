<html>
    <head></head>
    <body>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Separatore di campi
                    <input class="form-control" type="text" name="separator" id="separator" value=";"/>
                </label>
            </div>
            <div class="form-group">

                <label>Usa Header<br>
                    <input class="switch" type='checkbox' name="use_header" id="use_header"  />
                </label>
            </div>
            <div class="form-group">
                <label>Permetti conversioni Con stringa vuota<br>
                    <input class="switch" type='checkbox' name="allow_empty_conversion" id="allow_empty_conversion"  />

            </div>
            <div class="form-group">
                <label>Csv
                    <input class="form-control" type="file" name="conversionCSV" id="conversionCSV"/>
                </label>
            </div>
            <input type="button" id="send_csv" value="Salva conversioni" />
        </form>


    </body>
</html>
