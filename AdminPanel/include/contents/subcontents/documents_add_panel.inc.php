<?php
    $extRes = $docMng->getAvailableExtensions(null,null,null,null);
    $extensions = "";


    foreach($extRes as $extension){


        $extensions .= $extension[0]."|";
    }
    $extensions = substr($extensions,0,strlen($extensions)-1);

?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info" id="doc_panel">
            <div class="box-header with-border">
                <h3 class="box-title">Aggiungi/Modifica documenti</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--action="<?php //echo SITE_URL ?>/AdminPanel/ajax/document_save.ajax.php"-->
            <form method="POST"   name="form_document" id="form_document" class="form-horizontal" novalidate accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
                <input type="hidden" id="inp_edit_id" name="inp_edit_id" value="" />

                <div class="box-body">
                    <div class="form-group">
                        <label for="inp_title" class="col-sm-2 ALING_LEFT control-label">Titolo</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inp_title" name="inp_title" placeholder="Titolo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt_description" class="col-sm-2 ALING_LEFT  control-label">Descrizione</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="txt_description" id="txt_description" placeholder="Descrizione"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="valid_extensions" name="valid_extensions" value="<?php echo $extensions?>" />
                        <label for="inp_file" class="col-sm-2 ALING_LEFT control-label">File</label>

                        <div class="col-sm-10">
                            <input type="file" id="inp_file" name="inp_file">
                        </div>
                    </div><!-- /.form-group -->
                </div> <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit"  class="btn btn-info pull-right">Salva</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div><!-- /.box -->
    </div><!-- /.col-md-12 -->
</div><!-- /.row -->