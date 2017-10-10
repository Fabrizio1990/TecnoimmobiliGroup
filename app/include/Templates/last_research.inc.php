<?php
/*require_once(BASE_PATH."/app/classes/PropertyManager.php");
$propertyMng = new PropertyManager();

$properties = $propertyMng->readAllAds("id_ads_status = 1","order by views desc,date_up desc Limit 8 ",null,null,false);*/
?>
<section class="generalwrapper dm-shadow clearfix">
    <div class="container">
        <div class="row">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                <div id="tabbed_widget" class="tabbable clearfix" data-effect="slide-bottom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_frequently_searched" data-toggle="tab">Ricerche frequenti</a></li>
                        <li><a href="#tab_last_searched" data-toggle="tab">Ultime ricerche</a></li>
                        <li><a href="#tab_last_added" data-toggle="tab">Ultimi annunci</a></li>
                    </ul>
                    <div class="tab-content tabbed_widget clearfix">

                        <div class="tab-pane active" id="tab_frequently_searched">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Appartamenti</th>
                                        <th>Tipologia</th>
                                        <th>Locali</th>
                                        <th>Mq</th>
                                        <th>prezzo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@msssa</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>@msssa</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                        <td>sadada</td>
                                        <td>asddfsssa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- tab pane -->

                        <div class="tab-pane" id="tab_last_searched">
                            <h1>tab2</h1>
                        </div><!-- tab pane -->

                        <div class="tab-pane" id="tab_last_added">
                            <h1>tab3</h1>
                        </div><!-- tab pane -->


                    </div><!-- tab-content -->
                </div><!-- tabbed_widget -->
            </div><!-- end col-lg-12 -->

        </div><!-- end row -->
    </div><!-- end dm_container -->
</section><!-- end generalwrapper -->