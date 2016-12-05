<!-- ################# PROVINCIA - COMUNE ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Provincia</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>

                <select id="sel_provincia" class="form-control select2" style="width: 100%;" data-placeholder="Seleziona una provincia" onchange="getComuni(this,'','Seleziona un comune')">
                    <option value="">Seleziona un valore</option>
                    <?php
                    for($i=0,$cnt = count($optProvincia);$i<$cnt;$i++){
                        echo("<option value='".$optProvincia[$i]["provincia"]."'>".$optProvincia[$i]["provincia"]."</option>");
                    }
                    ?>
                </select>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <!-- SELECT MULTIPLE -->
        <div class="form-group">
            <label>Comune</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_comune" class="form-control select2" data-placeholder="Seleziona un comune" style="width: 100%;" onchange="getZone(this,'','Seleziona una zona')">

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

<!-- ################# ZONA -  ##################### -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Zona</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-home"></i>
                </div>
                <select id="sel_zona" class="form-control select2" data-placeholder="Seleziona una zona" style="width: 100%;" >

                </select>
            </div>
        </div>
    </div><!-- /.col-md-6 -->



</div><!-- /.row -->