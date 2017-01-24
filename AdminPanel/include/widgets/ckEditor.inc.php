<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 24/01/2017
 * Time: 10:12
 */
?>
<form>
    <div class="row">
        <div class="col-md-12">

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Editor di inserimento</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->

                <div class="box-body pad">
                    <div class="row">
                        <div class="col-md-12 pad">
                            <div class="form-group">
                                <!--<label>Titolo</label>-->
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa   fa-text-width"></i></div>
                                    <input id="inp_editor_title" name="inp_editor_title" type="text" class="form-control" placeholder="Inserisci il titolo" >

                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.col-md-12 -->
                        <div class="col-md-12 pad">
                            <textarea id="editor1" name="editor1" rows="10" cols="80">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer pad">
                    <button type="button" class="btn btn-primary" id="btn_editor_submit" onclick="saveNews()">Salva</button>
                </div>

            </div><!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</form>
