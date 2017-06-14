<?php
$logs = scandir(BASE_PATH."/app/logs");


?>

<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Dettaglio Log</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

           <textarea id="log_details" style="width:100%;" readonly></textarea>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>



<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Lista Log</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <table class="table table-bordered">
                <tbody>
                <?php
                foreach( $logs as $logName){
                    if($logName!= "." && $logName!=".."){
                        $fullLogPathUrl   = SITE_URL."/app/logs/".$logName;
                        $row= "<tr>";
                            $row.= "<td>$logName</td>";
                            $row.= "<td class='ALIGN_CENTER'>";
                                $row.= "<input type='button' class=\"btn btn-primary \" id=\"btn_log_details\"  value='Dettaglio' onclick='readTextFile(\"$fullLogPathUrl\")' />";
                            $row.= "</td>";
                            $row.= "<td><input type='button' class='btn btn-danger' id='btn_delete_file' onclick='deleteFile(\"$logName\")' value='Delete' /></td>";
                        $row.= "</tr>";
                        echo $row;



                    }
                }
                ?>


                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>