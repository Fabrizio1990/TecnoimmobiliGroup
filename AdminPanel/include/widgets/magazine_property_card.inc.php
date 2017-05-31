<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 magazine_card">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user" >
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header" style="background: url('{img_path}');">

                <div class="btn-group btn-action" >
                    <input type="hidden" class="item_id" value="{item_id}">
                    <button type="button" class="btn btn-info btn_add HIDDEN"  onclick="switchPropertyMagazineStatus($(this).closest('.magazine_card'),$(this).prev().val(),1,1)">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn_remove HIDDEN" onclick="switchPropertyMagazineStatus($(this).closest('.magazine_card'),$(this).prev().prev().val(),0,0)">
                        <i class="fa fa-remove"></i>
                    </button>
                </div>
        </div>
        <div class="box-footer">
            <div class="row description">
                <div class="col-sm-12">
                    <div class="description-block">
                        <h5 class="description-header">{contract}</h5>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 ">
                    <div class="description-block">
                        <h5 class="description-text">{tipology}</h5>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 BORDER_BOTTOM">
                    <div class="description-block">
                        <h5 class="description-text">{town}</h5>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-12 ">
                    <div class="description-block">
                        <h5 class="description-header">{price}</h5>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.widget-user -->
</div>