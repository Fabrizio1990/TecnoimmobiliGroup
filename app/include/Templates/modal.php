<?php
    $title = isset($_GET["title"])?$_GET["title"]:"Azione";
    $body = isset($_GET["body"])?$_GET["body"]:"";
    $closeTxt = isset($_GET["closeTxt"])?$_GET["closeTxt"]:"Chiudi";
    $saveTxt = isset($_GET["saveTxt"])?$_GET["saveTxt"]:"Salva";


?>


<!-- #########################  MODAL (require modals.css) ################################## -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $title ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $body ?>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-outline modal_close" data-dismiss="modal"><?php //echo $closeTxt ?></button>
                <button type="button" class="btn btn-outline modal_save"><?php echo $saveTxt ?></button>
            </div>
        </div>
    </div>
</div>
<!-- #########################  END MODAL ############################### -->