<?php


header('Content-type: text/html; charset=utf-8');
include("../../config.php");
require_once(BASE_PATH."/app/classes/OptionsManager.php");
include(BASE_PATH."/app/classes/RequestsManager.php");

if(!isset($_GET["id"])){
    echo "Errore, Id non Definito";
    exit;
}

$rqMng = new RequestManager();
$optMng = new OptionsManager();
$id = $_GET["id"];

$req = $rqMng->readRequests($id);

for($i = 0 ,$len = count($req); $i<$len ; $i++){
    // POPULATE VARIABLES AND GET PREFERENCES
    // CONTRATTO
    $optContracts = $optMng->makeOptions("ads_contracts",$rqMng->readPreferences($id,1)[0]["val"]);

    $categories    = $rqMng->readPreferences($id,2);
    $arrCategories = getValuesArrayFromRs($categories);
    $optCategories = $optMng->makeOptions("ads_category",$arrCategories);

    $tipologies    = $rqMng->readPreferences($id,3);
    $arrTipologies = getValuesArrayFromRs($tipologies);
    $optTipologies = $optMng->makeOptions("ads_tipologies",$arrTipologies,$arrCategories);






?>

            <!-- ############ DETAILS STARTS HERE ############ -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input id="inp_req_name" name="inp_req_name" type="text" class="form-control" placeholder="Inserisci il nome del richiedete" value="<?php echo $req[$i]["name"] ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cognome</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input id="inp_req_lastname" name="inp_req_lastname" type="text" class="form-control" placeholder="Inserisci il Cognome del richiedete" value="<?php echo $req[$i]["lastname"] ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input id="inp_req_email" name="inp_req_email" type="text" class="form-control" placeholder="Inserisci la mail del richiedete" value="<?php echo $req[$i]["email"] ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telefono</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input id="inp_req_telephone" name="inp_req_telephone" type="text" class="form-control" placeholder="Inserisci il telefono del richiedete" value="<?php echo $req[$i]["telephone"] ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div>

            <!-- ######## REQUEST PREFERENCES STARTS HERE ####### -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contratto</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>

                            <select id="sel_req_contracts" name="sel_req_contracts" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di contratto">
                                <option value="">Seleziona un valore</option>
                                <?php echo($optContracts); ?>
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->



                <div class="col-md-6">
                    <!-- SELECT MULTIPLE -->
                    <div class="form-group">
                        <label>Categoria</label>
                        <select id="sel_req_category" name="sel_req_category" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una categoria" style="width: 100%;" onchange="getTipologies(this)">
                            <?php echo $optCategories?>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!-- SELECT MULTIPLE -->
                    <div class="form-group">
                        <label>Tipologia</label>
                        <select id="sel_tipology" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una tipologia" style="width: 100%;">
                            <?php echo $optTipologies ?>
                        </select>
                    </div>
                </div><!-- /.col-md-6 -->
            </div>


            <!-- ######## REQUEST PREFERENCES ENDS HERE ######## -->

            <!-- ############ DETAILS ENDS HERE ############ -->




<?php
}



function getValuesArrayFromRs($dbRes){
    $ret = array();
    for($i = 0 ,$len = count($dbRes) ;$i < $len; $i++){
        array_push($ret,$dbRes[$i]["val"]);
    }
    return $ret;
}
?>




