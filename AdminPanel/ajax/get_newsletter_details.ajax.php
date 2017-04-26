
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
    $id_ew = $req[$i]["id_easywork"];
    $status = $req[$i]["enabled"];

    $optContracts = $optMng->makeOptions("ads_contracts",$rqMng->readPreferences($id,1)[0]["val"]);
    $categories    = $rqMng->readPreferences($id,2);
    $arrCategories = getValuesArrayFromRs($categories);
    $optCategories = $optMng->makeOptions("ads_category",$arrCategories);

    $tipologies    = $rqMng->readPreferences($id,3);
    $arrTipologies = getValuesArrayFromRs($tipologies);
    $optTipologies = $optMng->makeOptions("ads_tipologies",$arrTipologies,$arrCategories);


    $regions        = $rqMng->readPreferences($id,4);
    $arrRegions     = getValuesArrayFromRs($regions);
    $optRegions     = $optMng->makeOptions("geo_region",$arrRegions,"1");

    $cities         = $rqMng->readPreferences($id,5);
    $arrCities      = getValuesArrayFromRs($cities);
    $optCities      = $optMng->makeOptions("geo_city",$arrCities,$arrRegions);

    $towns          = $rqMng->readPreferences($id,6);
    $arrTowns       = getValuesArrayFromRs($towns);
    $optTowns       = $optMng->makeOptions("geo_town",$arrTowns,$arrCities);

    $districts      = $rqMng->readPreferences($id,7);
    $arrDistricts   = getValuesArrayFromRs($districts);
    $optDistricts   = $optMng->makeOptions("geo_district",$arrDistricts,$arrTowns);

    $price_min         = $rqMng->readPreferences($id,8)[0]["val"];
    $price_max         = $rqMng->readPreferences($id,9)[0]["val"];

    $mq_min         = $rqMng->readPreferences($id,10)[0]["val"];
    $mq_max         = $rqMng->readPreferences($id,11)[0]["val"];




?>
            <input type="hidden" id ="H_id_request_details" name="id_request_details" value ="<?php echo $id ?>" />
            <input type="hidden" id ="H_id_EW_request_details" name="H_id_EW_request_details" value ="<?php echo $id_ew ?>" />
            <input type="hidden" id = "H_status" name = "H_status" value="<?php echo $status?>" />

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

            <!-- @@@@@@@ CONTRACTS AND CATEGORIES  @@@@@@@-->
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

             <!-- @@@@@@@ TIPOLOGIES AND REGIONS  @@@@@@@-->
            <div class="row">

                <div class="col-md-6">
                    <!-- SELECT MULTIPLE -->
                    <div class="form-group">
                        <label>Tipologia</label>
                        <select id="sel_req_tipology" name="sel_req_tipology" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una tipologia" style="width: 100%;">
                            <?php echo $optTipologies ?>
                        </select>
                    </div>
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <!-- SELECT MULTIPLE -->
                    <div class="form-group">
                        <label>Regione</label>
                        <select id="sel_region" name="sel_region" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una regione" style="width: 100%;" onchange="getCities(this)">
                            <?php echo $optRegions ?>
                        </select>
                    </div>
                </div><!-- /.col-md-6 -->

        </div>

    <!-- @@@@@@@ CITIES AND TOWNS  @@@@@@@-->
    <div class="row">

        <div class="col-md-6">
            <!-- SELECT MULTIPLE -->
            <div class="form-group">
                <label>Provincia</label>
                <select id="sel_city" name="sel_city" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una provincia" style="width: 100%;" onchange="getTowns(this)">
                    <?php echo $optCities ?>
                </select>
            </div>
        </div><!-- /.col-md-6 -->

        <div class="col-md-6">
            <!-- SELECT MULTIPLE -->
            <div class="form-group">
                <label>Comune</label>
                <select id="sel_town" name="sel_town" class="form-control select2" multiple="multiple" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getDistricts(this)">
                    <?php echo $optTowns ?>
                </select>
            </div>
        </div><!-- /.col-md-6 -->

    </div>

    <!-- @@@@@@@  Districts  @@@@@@@-->
    <div class="row">

        <div class="col-md-6">
            <!-- SELECT MULTIPLE -->
            <div class="form-group">
                <label>Zone</label>
                <select id="sel_district" name="sel_district" class="form-control select2" multiple="multiple" data-placeholder="Seleziona una zona" style="width: 100%;">
                    <?php echo $optDistricts ?>
                </select>
            </div>
        </div><!-- /.col-md-6 -->

    </div>




    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Prezzo Minimo</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa  fa-eur"></i></div>
                    <input id="price_min" name="price_min" type="text" class="form-control price_input" placeholder="Euro (€)"  value="<?php echo $price_min ?>">

                </div>
            </div><!-- /.form-group -->
        </div><!-- /.col-md-6 -->


        <div class="col-md-6">
            <div class="form-group">
                <label>Prezzo Massimo</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa  fa-eur"></i></div>
                    <input id="price_max" name="price_max" type="text" class="form-control price_input" placeholder="Euro (€)"  value="<?php echo $price_max ?>">

                </div>
            </div><!-- /.form-group -->
        </div><!-- /.col-md-6 -->

    </div>


    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label>Superficie Minima</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa  fa-home"></i></div>
                    <input id="mq_min" name="mq_min" type="text" class="form-control mq_input" placeholder="Metri quadri (m²)"  value="<?php echo $mq_min ?>">

                </div>
            </div><!-- /.form-group -->
        </div><!-- /.col-md-6 -->


        <div class="col-md-6">
            <div class="form-group">
                <label>Superficie massima</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa  fa-home"></i></div>
                    <input id="mq_max" name="mq_max" type="text" class="form-control mq_input" placeholder="Metri quadri (m²)"  value="<?php echo $mq_max?>">
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.col-md-6 -->

    </div>
    <div class="row">

        <div class="col-md-6">

        </div><!-- /.col-md-6 -->


        <div class="col-md-6">

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





