<!-- #################### CATEGORIA - TIPOLOGIA ######################## -->
<div class="row">

    <div class="col-md-6">
        <!-- DATE RANGE -->
        <div class="form-group">
            <label>Categoria</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_categoria" class="form-control select2" style="width: 100%;" onchange="getTipologies(this,'','Seleziona una tipologia')" data-placeholder="Seleziona una categoria">
                    <option value="">Seleziona una categoria</option>
                    <?php
                    for($i=0,$cnt = count($optCategoria);$i<$cnt;$i++){
                        echo("<option value='".$optCategoria[$i]["categoria"]."'>".$optCategoria[$i]["categoria"]."</option>");
                    }
                    ?>
                </select>
            </div><!-- /.input group -->
        </div><!-- /.form group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Tipologia</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_tipologia" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona una tipologia">
                    <option value="">Seleziona una tipologia</option>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->

<!-- #################### SUPERFICIE - LOCALI ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Superficie</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                <input id="inp_superficie" type="number" class="form-control" placeholder="Inserisci la superficie">
                <span class="input-group-addon">m<sup>2</sup></span>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Locali</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_locali" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero dei locali">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optLocali);$i<$cnt;$i++){
                        echo("<option value='".$optLocali[$i]["valore"]."'>".$optLocali[$i]["locali"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- #################### CAMERE - PIANO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Camere</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_camere" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero delle camere">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optCamere);$i<$cnt;$i++){
                        echo("<option value='".$optCamere[$i]["valore"]."'>".$optCamere[$i]["camere"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Piano</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_piano" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il piano">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optPiano);$i<$cnt;$i++){
                        echo("<option value='".$optPiano[$i]["valore"]."'>".$optPiano[$i]["piano"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- #################### ASCENSORE - CONDIZIONI ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Ascensore</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_ascensore" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optAscensore);$i<$cnt;$i++){
                        echo("<option value='".$optAscensore[$i]["valore"]."'>".$optAscensore[$i]["ascensore"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Condizioni</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_condizioni" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona le condizioni">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optCondizioni);$i<$cnt;$i++){
                        echo("<option value='".$optCondizioni[$i]["valore"]."'>".$optCondizioni[$i]["condizioni"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### STATO ATTUALE - RISCALDAMENTO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Stato attuale</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_stato_immobile" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona lo stato attuale">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optStatoImmobile);$i<$cnt;$i++){
                        echo("<option value='".$optStatoImmobile[$i]["valore"]."'>".$optStatoImmobile[$i]["stato"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Riscaldamento</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_riscaldamento" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di riscaldamento">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optRiscaldamento);$i<$cnt;$i++){
                        echo("<option value='".$optRiscaldamento[$i]["valore"]."'>".$optRiscaldamento[$i]["riscaldamento"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### BAGNI - BOX ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Bagni</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_bagni" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il numero dei bagni">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optBagni);$i<$cnt;$i++){
                        echo("<option value='".$optBagni[$i]["valore"]."'>".$optBagni[$i]["bagni"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Box</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_box" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di box">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optBox);$i<$cnt;$i++){
                        echo("<option value='".$optBox[$i]["valore"]."'>".$optBox[$i]["box"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### GIARDINO - CONTRATTO ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Giardino</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_giardino" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di giardino">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optGiardino);$i<$cnt;$i++){
                        echo("<option value='".$optGiardino[$i]["valore"]."'>".$optGiardino[$i]["giardino"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label>Contratto</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_contratto" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona il tipo di contratto">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optBox);$i<$cnt;$i++){
                        echo("<option value='".$optContratto[$i]["valore"]."'>".$optContratto[$i]["tipo_contratto"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### PREZZO - CLASSE ENERGETICA  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Prezzo</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa  fa-eur"></i></div>
                <input id="inp_prezzo" type="number" class="form-control" placeholder="Inserisci il prezzo" v>

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>Classe energetica</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_classe_energetica" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona la classe energetica">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optClasseEn);$i<$cnt;$i++){
                        echo("<option value='".$optClasseEn[$i]["classe"]."'>".$optClasseEn[$i]["classe"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- ####################  IPE UM - IPE   ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Unità di misura IPE</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_ipe_um" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona un valore">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optIpeUm);$i<$cnt;$i++){
                        echo("<option value='".$optIpeUm[$i]["um"]."'>".$optIpeUm[$i]["um"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->



    <div class="col-md-6">
        <div class="form-group">
            <label>Valore IPE</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                <input id="inp_ipe" type="number" class="form-control" placeholder="Inserisci l' IPE" value ="175">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


</div><!-- /.row -->


<!-- ####################  DESCRIZIONE   ######################## -->
<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Descrizione Immobile</label>
            <textarea class="form-control" rows="3" placeholder="Inserisci una descrizione"></textarea>
        </div>
    </div>

</div><!-- /.row -->