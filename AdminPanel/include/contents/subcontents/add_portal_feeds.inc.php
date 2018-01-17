
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label title="è anche il nome del file">Documenti feed</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                <input  type="file" id="inp_portal_feeds_doc" class="form-control" />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">  </div>
</div><!-- /.row -->
<?php
if($id_portal == 0){
    include (BASE_PATH."/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php");
}
else{
    //TODO IN QUESTO CASO DEVE CICLARE OGNI FEED E RECUPERARE LE INFO
}

?>