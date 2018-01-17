
<?php

$feed_name = isset($_GET["feed_name"])?$_GET["feed_name"]:"";
$feed_folder = isset($_GET["feed_folder"])?$_GET["feed_folder"]:"";
$feed_link = $feed_folder!=""?(SITE_URL."/".$feed_folder."/".$feed_name):"";
$feed_notes = isset($_GET["feed_notes"])?$_GET["feed_notes"]:"";
?>


<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">FEED</h3>
        <div class="pull-right box-tools">
            <button type="button" title="Cancella feed" class="btn btn-secondary btn-sm pull-right btn_delete_feed" onclick="removeFeedRow(this)"><i class="fa fa-times ico_delete_feed" ></i>
            </button>

        </div>
    </div>
    <div class="box-body FEED_DATA">


        <!-- ####################  NOME FEED - CARTELLA FEED   ######################## -->
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label title="è anche il nome del file">Nome feed</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                        <input  type="text" class="form-control inp_portal_feed_name" placeholder="Nome feed"  value="<?php echo $feed_name?>">

                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="form-group">
                    <label>Cartella feed</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-folder"></i></div>
                        <input  type="text" class="form-control inp_portal_feed_foolder" placeholder="Cartella feed"  value="<?php echo $feed_folder?>">

                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->


        <!-- ####################  LINK   ######################## -->
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label >Link al feed</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa  fa-link"></i></div>
                        <input  type="text" class="form-control inp_portal_feed_link" placeholder="Link feed"  value="<?php echo $feed_link?>">

                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->


            <div class="col-md-6"> </div><!-- /.col-md-6 -->

        </div><!-- /.row -->


        <!-- ####################  NOTE   ######################## -->
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control txt_portal_feed_notes" rows="3" placeholder="Note del feed"><?php echo $feed_notes ?></textarea>
                </div>
            </div>

        </div><!-- /.row -->

    </div>
</div>