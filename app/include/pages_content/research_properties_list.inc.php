<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
            <?php

            $order = isset($_GET["campoOrdinamento"])?urldecode($_GET["campoOrdinamento"]):"date_up|desc";

            function getSelected($val){
                global $order;
                if($order == $val)
                    echo "selected";
            }
            ?>

            <div id="content" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 clearfix ">

                <!-- ORDINAMENTO -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-lg-push-9 col-md-push-9 col-sm-push-8">
                        <label for="sel_order_filter" class="lbl_tecnoimmobili_blue">Ordine</label>
                        <select id="sel_order_filter" name="sel_order_filter" class="form-control selectpicker sel_tecnoimm_blue">
                            <optgroup label="" style="letter-spacing:-1px;">
                                <option <?php getSelected("price|asc") ?> value="price|asc">Meno costosi</option>
                                <option  <?php getSelected("locals|asc") ?>  value="locals|asc">Meno locali</option>
                                <option <?php getSelected("mq|asc") ?> value="mq|asc">Meno grandi</option>
                                <option <?php getSelected("date_up|asc") ?> value="date_up|asc">Meno recenti</option>
                            </optgroup>
                            <optgroup label="" style="letter-spacing:-1px;">
                                <option <?php getSelected("price|desc") ?> value="price|desc">Più costosi</option>
                                <option <?php getSelected("locals|desc") ?> value="locals|desc">Più locali</option>
                                <option <?php getSelected("mq|desc") ?> value="mq|desc">Più grandi</option>
                                <option <?php getSelected("date_up|desc") ?> value="date_up|desc">Più recenti</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- TABELLA IMMOBILI -->
                    <table id="DT_PROPERTIES" class="table  display responsive no-wrap compact" width="100%">

                        <thead>
                        <tr>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <!--
                        ##########################################################################################
                        il corpo della tabella viene scritto dalla funzione javascript al fondo della pagina padre
                        ##########################################################################################
                        -->

                        </tbody>

                    </table>
                </div>

            </div><!-- end content -->

            <div id="right_sidebar" class="col-lg-3 col-md-3 col-sm-4 col-xs-0  clearfix">
                <div class="widget clearfix">
                    <div class="search_widget">
                        <div class="title"><h3><i class="fa fa-search"></i> Search For Property</h3></div>
                        <form action="#" id="search_form">
                            <input type="text" class="form-control" placeholder="Search by ID or property name...">
                        </form><!-- end search form -->
                    </div><!-- end search_widget -->
                </div><!-- end widget -->


            </div><!-- end sidebar -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end generalwrapper -->