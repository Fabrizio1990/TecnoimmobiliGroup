<?php


/*function is_url_exist($url){
        $headers=get_headers($url);
        return stripos($headers[0],"200 OK")?true:false;
}*/

    if(!defined("BASE_PATH"))
        require_once("../../../../config.php");

    $portalName = isset($inpPortalName)?$inpPortalName:"";
    $feed_name = isset($tmpName)?$tmpName:"";
    $feed_file_type_id = isset($tmp_feed_file_type_id)?$tmp_feed_file_type_id:"";
    $feed_extension    = isset($tmp_feed_extension) ?$tmp_feed_extension:"";
    $feed_path         =((isset($portalFeedPath))&&($portalFeedPath!=""))?BASE_PATH."/".$portalFeedPath."/".$feed_name.$feed_extension:"";
    $feed_link = ((isset($portalFeedPath))&&($portalFeedPath!=""))?SITE_URL."/".$portalFeedPath."/".$feed_name.$feed_extension:"";
    $feed_generator_link = SITE_URL."/_OTHER/FEED_XML/feed_controller.php?portal=$portalName&feed=$feed_name";
    $feed_filter_field = isset($tmpFilterField)?$tmpFilterField:"";
    $feed_filter_value = isset($tmpFilterValue)?$tmpFilterValue:"";
    $feed_notes = isset($tmpNotes)?$tmpNotes:"";
    require_once (BASE_PATH."/app/classes/OptionsManager.php");
    $optMng = new OptionsManager();
    $optFeedTypes   = $optMng->makeOptions("prt_feed_types",$feed_file_type_id);
    //$extensions = $dbh->executeQuery("Select name,extension from prt_feed_types");
?>

<div class="box box-primary FEED_BOX">
    <div class="box-header">
        <h3 class="box-title">FEED</h3>
        <div class="pull-right box-tools">
            <button type="button" title="Cancella feed" class="btn btn-secondary btn-sm pull-right btn_delete_feed" onclick="removeFeedRow(this)"><i class="fa fa-times ico_delete_feed" ></i>
            </button>

        </div>
    </div>
    <div class="box-body FEED_DATA">


        <!-- ####################  NOME FEED - ESTENSIONE   ######################## -->
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
                    <label>Tipo Feed</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                        </div>
                        <select  class="form-control sel_feed_file_type" style="width: 100%;" data-placeholder="Seleziona il tipo di feed">
                            <?php echo($optFeedTypes); ?>
                        </select>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->


        <!-- #################### LINK AL FEED ######################## -->
        <div class="row">
            <div class="col-md-6">
                <?php
                if($feed_link != ""){
                ?>
                    <div class="form-group">
                        <label >Link al feed</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa  fa-link"></i></div>
                            <input  type="text" readonly class="form-control inp_portal_feed_link" placeholder="Link feed"  value="<?php echo $feed_link?>">

                        </div>
                    </div><!-- /.form-group -->
                <?php
                }
                ?>
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
            </div><!-- /.col-md-6 -->

        </div><!-- /.row -->


        <!-- ####################  Filter INFO   ######################## -->
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label >Campo filtro</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa  fa-link"></i></div>
                        <input  type="text" class="form-control inp_portal_filter_field" placeholder="Filter field"  value="<?php echo $feed_filter_field?>">

                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->

            <div class="col-md-6">
                <div class="form-group">
                    <label >Valore Filtro</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa  fa-link"></i></div>
                        <input  type="text" class="form-control inp_portal_filter_value" placeholder="Filter value"  value="<?php echo $feed_filter_value?>">

                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col-md-6 -->

        </div><!-- /.row -->


        <!-- ####################  NOTE   ######################## -->
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Note</label>
                    <textarea  class="form-control txt_portal_feed_notes" rows="3" placeholder="Note del feed"><?php echo $feed_notes ?></textarea>
                </div>
            </div>

        </div><!-- /.row -->

        <?php
        if($feed_link != "")
        {
        ?>
            <div class="row">

                <div class="col-md-4 col-xs-12">
                    <?php
                    if(file_exists($feed_path)){
                    ?>
                    <a target="_blank" href="<?php echo $feed_link ?>" class="btn btn-tecnoimm-red btn_go_to_feed">
                        Vai al feed
                    </a>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-md-4 col-xs-12">
                    <a target="_blank" href="<?php echo $feed_generator_link ?>" class="btn btn-tecnoimm-red btn_feed_generator">
                        Genera feed
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>