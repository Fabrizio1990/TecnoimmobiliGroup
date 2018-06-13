<!-- OGNI FEED E UNA ENTRY , IL TEMPLATE DELLA ENTRY E PRESO DA add_portal_single_feed_section.inc.php -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label title="è anche il nome del file">Documenti feed Locali</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-file-archive-o"></i></div>
                <input  type="file" id="inp_portal_feeds_doc" name="inp_portal_feeds_doc" accept="application/zip" class="form-control" />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

    <div class="col-md-6">
        <div class="form-group">
            <label title="è anche il nome del file">Documenti feed Online</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                <input  type="text" id="inp_portal_feeds_doc_link" name="inp_portal_feeds_doc_link" value="<?php echo $inpPortalDocLink ?>" class="form-control" />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->


<div id="feed_container">
<?php

if($id_portal == 0){
    include (BASE_PATH."/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php");
}
else{
    // LEGGO E STAMPO TUTTI I FEED
    $feeds = $prtMng->getPortalFeeds($id_portal);
    for($i = 0 ,$len = Count($feeds); $i < $len; $i++){
        $tmpName = $feeds[$i]["feed_name"];
        $tmp_feed_file_type_id = $feeds[$i]["feed_extension_id"];
        $tmp_feed_extension = $feeds[$i]["feed_extension"];
        $tmpFilterField = $feeds[$i]["filter_field"];
        $tmpFilterValue = $feeds[$i]["filter_value"];
        $tmpNotes = $feeds[$i]["notes"];

        include (BASE_PATH."/AdminPanel/include/contents/subcontents/add_portal_single_feed_section.inc.php");
    }
}
?>
</div>


<div class="row">

    <div class="col-md-4">  </div>
    <div class="col-md-4">
        <input type="button" id="btn_add_feed" class="btn btn-primary btn-tecnoimm-blue" value="Aggiungi Feed" />
    </div><!-- /.col-md-4 -->
    <div class="col-md-4">  </div>

</div><!-- /.row -->
