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
                        <li class="active"><a href="#tab" data-toggle="tab">Family House</a></li>
                        <li><a href="#tab2" data-toggle="tab">Land</a></li>
                        <li><a href="#tab3" data-toggle="tab">Apartment</a></li>
                        <li><a href="#tab4" data-toggle="tab">Cottage</a></li>
                        <li><a href="#tab5" data-toggle="tab">Condo</a></li>
                    </ul>
                    <div class="tab-content tabbed_widget clearfix">
                        <div class="tab-pane active" id="tab">
                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$3.000.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 4</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2.332.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Sea view duplex villa</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 4</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$189.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Country side house exterior</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$345.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Executive Home</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 5</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/05_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$4.200.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Ottoman Style Triplex</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Two Week on Miami </a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/07_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.210.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Wooden Style Family Hose</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 3</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 5</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$3.100.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Modern Family House</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2200</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> One Week Istanbul Holiday</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 7</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>
                        </div><!-- tab pane-->

                        <div class="tab-pane" id="tab2">

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.655.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> One Week Istanbul Holiday</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 4</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.600.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Country side house exterior</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 7</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.000.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 5</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$3.100.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Sea view duplex villa</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 4</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.100</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Executive Home</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/05_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$11.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Ottoman Style Triplex</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Two Week Holiday on Miami </a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$5.500.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Wooden Style Family Hose</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$5.100.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Modern Family House</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>
                        </div><!-- tab pane -->

                        <div class="tab-pane" id="tab3">
                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/05_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$14.200.100</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Ottoman Style Triplex</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$6000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Two Week Holiday on Miami </a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 7</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 12</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/07_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$123.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Wooden Style Family Hose</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2400</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> One Week Istanbul Holiday</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.222.100</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Sea view duplex villa</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Executive Home</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$4.200.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Country side house exterior</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$380.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Modern Family House</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>
                        </div><!-- tab pane -->

                        <div class="tab-pane" id="tab4">

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/07_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$124.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Wooden Style Family Hose</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$340.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> One Week Istanbul Holiday</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Sea view duplex villa</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 11</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$3.200.500</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Executive Home</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/05_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.500.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Ottoman Style Triplex</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Two Week Holiday on Miami </a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 4</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$189.900</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Country side house exterior</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$555.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Modern Family House</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>
                        </div><!-- tab pane -->

                        <div class="tab-pane" id="tab5">
                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Two Week Holiday on Miami </a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Executive Home</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$2.200.500</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Country side house exterior</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/05_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$1.200.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Ottoman Style Triplex</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$3.200.100</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Home of your dreams</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$880.000</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Modern Family House</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Area:</strong> 250m²</span>
                                        <span class="status"><strong>Status:</strong> On Sale</span>
                                        <span class="bedrooms last"><strong>Beds:</strong> 5</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 first">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/07_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$134.999</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Wooden Style Family Hose</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$4200</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> One Week Istanbul Holiday</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 last">
                                <div class="boxes">
                                    <div class="boxes_img ImageWrapper">
                                        <a href="single-property.html">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="PStyleNe"></div>
                                        </a>
                                        <div class="box_type">$4.200.00</div>
                                    </div>
                                    <h2 class="title"><a href="single-property.html"> Sea view duplex villa</a></h2>
                                    <div class="boxed_mini_details clearfix">
                                        <span class="area first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                        <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                        <span class="bedrooms last"><strong>Beds</strong><i class="icon-bed"></i> 2</span>
                                    </div>
                                </div><!-- end boxes -->
                            </div><!-- tab pane -->
                        </div><!-- tabbed_widget -->
                    </div><!-- tab-content -->
                </div> <!-- widget -->
            </div><!-- end col-lg-12 -->

        </div><!-- end row -->
    </div><!-- end dm_container -->
</section><!-- end generalwrapper -->