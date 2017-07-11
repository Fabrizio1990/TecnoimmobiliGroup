<div class="row">
    <div class="col-md-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Statistica visitatori</h3>

                      <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label>Scegli le date</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="sel_dateRange">
                            </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-3"></div>

                    </div>
                    <div class="chart">
                        <canvas id="Chart_visits" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
          </div><!-- /.box -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->


<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Statistica Browser</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="chart">
                    <canvas id="Chart_browser" style="height:250px"></canvas>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-md-6 -->
</div><!-- /.row -->