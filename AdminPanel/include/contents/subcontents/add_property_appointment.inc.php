<?php
$ownerName=$ownerLastName=$ownerTelHome=$ownerTelOffice=$ownerMobile=$ownerAddress=$ownerTown=$occupantName=$occupantLastName=$occupantTel=$appointmentDate=$appointmentStartDt=$appointmentEndDt = $appointmentAgent =  $appointmentChannel = $appointmentConditions = $appointmentRenwable = $notes = $date_ins = "";

$retApp = $pMng->getAppointment($id_property);

if(Count($retApp)>0){
    $ownerName = $retApp[0]["owner_name"];
    $ownerLastName = $retApp[0]["owner_lastname"];
    $ownerTelHome = $retApp[0]["owner_tel_home"];
    $ownerTelOffice = $retApp[0]["owner_tel_office"];
    $ownerMobile = $retApp[0]["owner_mobile"];
    $ownerAddress = $retApp[0]["owner_address"];
    $ownerTown = $retApp[0]["owner_town"];
    $occupantName = $retApp[0]["occupant_name"];
    $occupantLastName = $retApp[0]["occupant_lastname"];
    $occupantTel = $retApp[0]["occupant_tel"];
    $appointmentDate = $retApp[0]["appointment_date"];
    $appointmentStartDt = $retApp[0]["appointment_start_date"];
    $appointmentEndDt = $retApp[0]["appointment_end_date"];
    $appointmentAgent = $retApp[0]["appointment_agent"];
    $appointmentChannel = $retApp[0]["appointment_channel"];
    $appointmentConditions = $retApp[0]["appointment_conditions"];
    $appointmentRenwable = $retApp[0]["appointment_renwable"];
    $notes = $retApp[0]["note"];
    $date_ins = $retApp[0]["date_ins"];

}

//var_dump($retApp);

?>

<!-- DATI PROPRIETARIO -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Dati Proprietario</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            <!-- PROPRIETARIO ---- NOME E COGNOME ----- -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_name" name="inp_proprietary_name" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerName ?>" >
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cognome</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_lastname" name="inp_proprietary_lastname" type="text" class="form-control" placeholder="Nessun dato inserito"  value="<?php echo $ownerLastName ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <!-- PROPRIETARIO ---- TELEFONO CASA E TELEFONO UFFICIO ----- -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telefono casa</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_tel_home" name="inp_proprietary_tel_home" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerTelHome ?>" >
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telefono ufficio</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_tel_office" name="inp_proprietary_tel_office" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerTelOffice ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <!-- PROPRIETARIO ---- CELLULARE E INDIRIZZO ----- -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cellulare</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_mobile" name="inp_proprietary_mobile" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerMobile ?>">
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Indirizzo</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_address" name="inp_proprietary_address" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerAddress ?>">
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->

            <!-- PROPRIETARIO ---- CITTA ----- -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Città</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-home"></i>
                            </div>
                            <input disabled id="inp_proprietary_town" name="inp_proprietary_town" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $ownerTown ?>">
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div><!-- /.col-md-6 -->

                <div class="col-md-6"></div><!-- /.col-md-6 -->
            </div><!-- /.row -->

        </div><!-- /.box-body -->


        <!-- DATI INQUILINO -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Dati Inquilino</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <!-- INQUILINO ---- NOME E COGNOME ----- -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input disabled id="inp_occupant_name" name="inp_occupant_name" type="text" class="form-control" placeholder="Nessun dato inserito"  value="<?php echo $occupantName ?>">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cognome</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input disabled id="inp_occupant_lastname" name="inp_occupant_lastname" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $occupantLastName ?>">
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->

                    <!-- INQUILINO ---- TELEFONO  ----- -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefono casa</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input disabled id="inp_occupant_tel" name="inp_occupant_tel" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $occupantTel ?>">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6"></div><!-- /.col-md-6 -->
                    </div><!-- /.row -->

                </div><!-- /.box-body -->


                <!-- DATI INCARICO -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Incarico di mediazione</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!-- INCARICO ---- DATA / DATA_INIZIO ----- -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data incarico</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_date" name="inp_appointment_date" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo date("d-m-Y",strtotime($appointmentDate)) ?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data inizio</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_date_start" name="inp_appointment_date_start" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo date("d-m-Y",strtotime($appointmentStartDt)) ?>">
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->

                            <!-- INCARICO ---- DATA SCADENZA / AGENTE  ----- -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data scadenza</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_date_end" name="inp_appointment_date_end" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo date("d-m-Y",strtotime($appointmentEndDt)) ?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agente</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_agent" name="inp_appointment_agent" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $appointmentAgent ?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                            </div><!-- /.row -->

                            <!-- INCARICO ---- CANALE / CONDIZIONI  ----- -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Canale</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_channel" name="inp_appointment_channel" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $appointmentChannel ?>" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Condizioni</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_conditions" name="inp_appointment_conditions" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $appointmentConditions ?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                            </div><!-- /.row -->

                            <!-- INCARICO ---- RINNOVABILITA'  ----- -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rinnovabile</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <input disabled id="inp_appointment_renewable" name="inp_appointment_renewable" type="text" class="form-control" placeholder="Nessun dato inserito" value="<?php echo $appointmentRenwable ?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6"></div><!-- /.col-md-6 -->

                            </div><!-- /.row -->

                            <!-- INCARICO ---- NOTE'  ----- -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea disabled class="form-control" id="txt_appointment_notes" name="txt_appointment_notes" rows="3"><?php echo $notes ?></textarea>
                                    </div>
                                </div>

                            </div><!-- /.row -->

                        </div><!-- /.box-body -->


</div>