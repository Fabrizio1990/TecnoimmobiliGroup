<link rel="stylesheet" href="<?php echo(SITE_URL) ?>/AdminPanel/css/utility_agenct_access.css">
<?php
    require_once (BASE_PATH."/app/classes/UserManager.php");
    $AgMng = new UserManager();
    $resAg = $AgMng->getAllAgencies();
    $tbody ="";
    foreach($resAg as $agency){
        $operators = "";
        $operators_arr = explode(",",$agency["operators"]);
        $operators_ids = explode(",",$agency["operators_ids"]);
        $tbody.="<tr>";

        $tbody.="<td><img src='".SITE_URL."/".$agency["logo_path"]."' title='logo' /></td>";
        $tbody.="<td>".$agency["name"]."</td>";

        for($i = 0,$len = count($operators_arr);$i<$len;$i++){
            $operators.="<form method='POST'  action='".SITE_URL."/AdminPanel/login_as.php'>";
            $operators.="<input type='hidden'  name='id_operator' value='".$operators_ids[$i]."'/>";
            $operators.="<p class='operator_name' onclick='this.parentNode.submit()'>".$operators_arr[$i]."</p>";
            $operators.="</form>";


        }
        //echo($operators);
        $tbody.="<td>".$operators."</td>";

        $tbody.="</tr>";
    }
    //$AgMng->read("status=?","order by name desc",array(1),array("name,"))

?>
<table id="DT_AGENCIES" class="table table-bordered table-striped display responsive no-wrap" width="100%">
    <thead>
    <tr>
        <th>Logo</th>
        <th>Agenzia</th>
        <th>Accedi come</th>
    </tr>
    </thead>
    <tbody>
        <?php echo($tbody)?>
    </tbody>
    <tfoot>
    <tr>
        <th>Logo</th>
        <th>Agenzia</th>
        <th>Accedi come</th>
    </tr>
    </tfoot>
</table>