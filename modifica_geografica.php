<?php
    include ("config.php");
    require_once(BASE_PATH."/app/classes/GeographicManager.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" />


    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


    <script src="<?php echo(SITE_URL) ?>/AdminPanel/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/jquery.dataTables_new.min.js"></script>
    <script src="<?php echo(SITE_URL) ?>/AdminPanel/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>


    </head>

    <body>
        <div class="container">
            <?php

            $geoM = new GeographicManager();
            $res = $geoM->read();
            $table ="<table id='DT_GEO' class='table table-bordered table-striped display responsive no-wrap' width='100%'>";
            $table .= "<thead>";
            $table .="<tr><th>STATO</th><th>REGIONE</th><th>PROVINCIA</th><th>COMUNE</th><th>ISTAT</th><th>ZONA</th><th>CAP</th>";
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

            ?>

        </div>

    <script>

        $(function() {
            table = $('#DT_GEO')./*on('xhr.dt', function ( e, settings, json, xhr ) {
             $('body').addClass("sidebar-collapse");
             }).*/
            DataTable({
                "language": {
                    "url": "AdminPanel/plugins/datatables/localizations/italian.json"
                },
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "bDeferRender": true,
                "lengthMenu": [5, 10, 15,20,30],
                "pageLength": 10,
                "columnDefs": [
                    { targets: "_all",className: "ALING_CENTER"}
                ]

            });
        });
    </script>
    </body>
</html>
