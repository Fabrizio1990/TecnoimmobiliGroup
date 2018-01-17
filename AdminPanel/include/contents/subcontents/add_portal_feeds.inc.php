<!-- OGNI FEED E UNA ENTRY , IL TEMPLATE DELLA ENTRY E PRESO DA add_portal_single_feed_section.inc.php -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label title="è anche il nome del file">Documenti feed</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-file-archive-o"></i></div>
                <input  type="file" id="inp_portal_feeds_doc" class="form-control" />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">  </div>
</div><!-- /.row -->


<div id="feed_container">
<?php
if($id_portal == 0){
    include (BASE_PATH."/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php");
}
else{
    //TODO IN QUESTO CASO DEVE CICLARE OGNI FEED E RECUPERARE LE INFO
}
?>
</div>


<div class="row">

    <div class="col-md-6">
       <input type="button" id="btn_add_feed" class="btn btn-primary btn-tecnoimm-blue" value="Aggiungi Feed" />
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">  </div>
</div><!-- /.row -->
