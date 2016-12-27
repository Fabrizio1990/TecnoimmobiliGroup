<?php
    include ("config.php");
    require_once(BASE_PATH."/app/classes/GeographicManager.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/css/utils.css">

    <style>

        /*.SELECT_ADD,.INPUT_ADD{width:80px;}
        .INPUT_ADD{}
        .INPUT_ADD_DISPLAY{}
        .BTN_ADD{}*/
    </style>

    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


    <script src="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

    <script src="<?php echo(SITE_URL) ?>/js/UTILS.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/form/form_utils.js"></script>
    <script src="<?php echo(SITE_URL) ?>/js/modifica_geografica.js"></script>


    </head>

    <body>
        <div class="container">
            <?php
            if(!isset($_GET["action"])){

                $geoM = new GeographicManager();
                $res = $geoM->read();
                $table ="<table id='DT_GEO_LIST' class='table table-bordered table-striped display responsive no-wrap' width='100%'>";
                $table .= "<thead>";
                $table .="<tr><th>STATO</th><th>REGIONE</th><th>PROVINCIA</th><th>COMUNE</th><th>ISTAT</th><th>ZONA</th><th>CAP</th></tr>";
                $table .= "</thead>";
                $table .= "<tbody>";
                for($i = 0,$len = count($res); $i<$len ;$i++){
                    $table.="<tr>";
                    $table.="<td>" . $res[$i]["stato"] . "</td>";
                    $table.="<td>" . $res[$i]["regione"] . "</td>";
                    $table.="<td>" . $res[$i]["provincia"] . "</td>";
                    $table.="<td>" . $res[$i]["comune"] . "</td>";
                    $table.="<td>" . $res[$i]["istat"] . "</td>";
                    $table.="<td>" . $res[$i]["zona"] . "</td>";
                    $table.="<td>" . $res[$i]["cap"] . "</td>";
                    $table.="</tr>";
                }
                $table  .= "</tbody>";
                $table  .=  "</table>";

                echo($table);

            }else{
                $action = $_GET["action"];


                $btn_submit = "";
                $link       = "";



                $sel_country     = "<label>Stato <select id=\"SEL_COUNTRY\" class=\"SELECT_ADD\" ></select></label>";
                $sel_region      = "<label>Regione <select id=\"SEL_REGION\" class=\"SELECT_ADD\"  ></select></label>";
                $sel_city        = "<label>Provincia <select id=\"SEL_CITY\" class=\"SELECT_ADD\"  ></select></label>";
                $sel_town        = "<label>Comune <select id=\"SEL_TOWN\" class=\"SELECT_ADD\"  ></select></label>";
                $sel_district    = "<label>Zona <select id=\"SEL_DISTRICT\" class=\"SELECT_ADD\"></select></label>";


                $input_country      = "<label>Stato <input type='text' id='txt_country'> </label>";
                $input_region       = "<label>Regione <input type='text' id='txt_region' /> </label>";
                $input_city         = "<label>Provincia <input type='text' id='txt_city' /> </label>";
                $input_city_short   = "<label>Provincia Breve <input type='text' id='txt_city_short'> </label>";
                $input_town         = "<label>Comune <input type='text' id='txt_town'> </label>";
                $input_istat        = "<label>Istat <input type='text' id='txt_istat'> </label>";
                $input_district     = "<label>Zona <input type='text' id='txt_district'> </label>";
                $input_cap          = "<label>Cap <input type='text' id='txt_cap'> </label>";


                switch($action){
                    case "country":
                        $fields = $input_country;

                        break;

                    case "region":

                        $fields = $sel_country."<br>".$input_region;
                        break;

                    case "city":
                        $fields = $sel_country."<br>".$sel_region."<br>".$input_city."<br>".$input_city_short;
                        break;

                    case "town":
                        $fields = $sel_country."<br>".$sel_region."<br>".$sel_city."<br>".$input_town."<br>".$input_istat;
                        break;

                    case "district":
                        $fields = $sel_country."<br>".$sel_region."<br>".$sel_city."<br>".$sel_town."<br>".$input_district."<br>".$input_cap;
                        break;


                }

                echo("<form Action='ajax/form/save_opt_val.ajax.php' name='form_add_geo' method='POST'>");

                echo("<input type='hidden' id='action' name='action'  value='".$_GET["action"]."'/>");

                echo($fields);
                echo("<input type='button' id ='btn_save' name='saveGeo'   value='Salva'/>");
                echo("</form>");


            }
            ?>

            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php'>Lista geografica</a><br>
            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php?action=country'>Aggiungi Stato</a><br>
            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php?action=region'>Aggiungi Regione</a><br>
            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php?action=city'>Aggiungi Proivincia</a><br>
            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php?action=town'>Aggiungi Comune</a><br>
            <a href='<?php echo(SITE_URL)?>/modifica_geografica.php?action=district'>Aggiungi Zona</a><br>


        </div>

    </body>
</html>
