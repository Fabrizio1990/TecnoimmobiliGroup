<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ESTATE PLUS - Real Estate HTML5 Website Template</title>

	<!-- Bootstrap core CSS -->
    <link href="<?php echo(SITE_URL) ?>/libs/frontend/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Style CSS -->
    <link href="<?php echo(SITE_URL) ?>/css/style.css" rel="stylesheet">
    
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="htt

	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo(SITE_URL) ?>/images/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo(SITE_URL) ?>/images/icons/apple-touch-icon-144x144.png">

</head>
<body>
        <!-- ########## TOOLBAR LATERALE "PER ORA NON UTILIZZATA ##########-->
        <?php include(BASE_PATH."/app/include/Templates/toolbar.inc.php") ?>

        <!-- ######## TOPBAR contenente contatti e pulsante di login ########-->
        <?php include(BASE_PATH."/app/include/Templates/topbar.inc.php") ?>


        <!-- ######## HEADER contenente Logo, social buttons e menu########-->
        <?php include(BASE_PATH."/app/include/Templates/header.inc.php") ?>

        <!-- ######## SLIDER E RICERCA IMMOBILI ########-->
        <?php include(BASE_PATH."/app/include/Templates/slider_index.inc.php") ?>

        <section class="generalwrapper dm-shadow clearfix">
        	<div class="container">
				<div class="row text-center">
					<h3 class="big_title">To attain your dream home <small>You need to do is very simple. Just join us </small></h3>
                    <div class="services_section clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="servicebox first">
                                <div class="service-icon">
                                    <div class="dm-icon-effect-1" data-effect="slide-bottom">
                                        <a href="#" class=""> <i class="hovicon effect-1 sub-a fa fa-list fa-2x"></i> </a>
                                    </div>
                                </div>
                                <div class="servicetitle">
                                    <h3>List on the same day</h3>
                                </div>
                                <p>Lorem Ipsum is simply dummy Lorem Ipsum has been the industry's standard dummy text..</p>
                            </div>
                        </div>
                                                
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="servicebox">
                                <div class="service-icon">
                                    <div class="dm-icon-effect-1" data-effect="slide-bottom">
                                        <a href="#" class=""> <i class="hovicon effect-1 sub-a fa fa-eye-slash fa-2x"></i> </a>
                                    </div>
                                </div>
                                <div class="servicetitle">
                                    <h3>Detailed Agent Panel</h3>
                                </div>
                                <p>Lorem Ipsum is simply dummy Lorem Ipsum has been the industry's standard dummy text..</p>
                            </div>
                        </div>
                                                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="servicebox">
                                <div class="service-icon">
                                    <div class="dm-icon-effect-1" data-effect="slide-bottom">
                                        <a href="#" class=""> <i class="hovicon effect-1 sub-a fa fa-check-square-o fa-2x"></i> </a>
                                    </div>
                                </div>
                                <div class="servicetitle">
                                    <h3>Easy to Use</h3>
                                </div>
                                <p>Lorem Ipsum is simply dummy Lorem Ipsum has been the industry's standard dummy text..</p>
                            </div>
                        </div>
                                                                    
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="servicebox last">
                                <div class="service-icon">
                                    <div class="dm-icon-effect-1" data-effect="slide-bottom">
                                        <a href="#" class=""> <i class="hovicon effect-1 sub-a fa fa-home fa-2x"></i> </a>
                                    </div>
                                </div>
                                <div class="servicetitle">
                                    <h3>Sell & Make Money online</h3>
                                </div>
                                <p>Lorem Ipsum is simply dummy Lorem Ipsum has been the industry's standard dummy text..</p>
                            </div>
                        </div>
                    </div><!-- services_section -->  
                </div><!-- end row -->
                    <div class="text-center clearfix">
                    	<a class="btn btn-primary" href="#">VIEW ALL SERVICES</a>
                    </div><!-- end text-center -->
            </div><!-- end container -->
		</section><!-- end generalwrapper -->

		<section id="three-parallax" class="parallax" style="background-image: url('demos/02_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="threewrapper">
                <div class="overlay1 dm-shadow">
                    <div class="container">
                    	<div class="row">
                        	<div class="text-center clearfix">
								<h3 class="big_title">Most Popular Properties <small>This week's most admired properties </small></h3>
                            </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes first" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/01_home.jpg" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleSc">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/01_home.jpg"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a class="fancybox" data-type="iframe" href="http://player.vimeo.com/video/64550407?autoplay=1"><i class="fa fa-video-camera"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$3.000.00</div>
                                            <div class="status_type">For Sale</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> Home of your dreams</a> <small class="small_title">2307 New York City</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 4</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 325</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/02_home.jpg" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/02_home.jpg"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$2550</div>
                                            <div class="status_type">For Rent</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> A Family Home for all your needs</a> <small class="small_title">890 Istanbul / Maslak</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 1</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 140</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/03_home.jpg" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/03_home.jpg"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$3000</div>
                                            <div class="status_type">For Rent</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> Complete Apertment (1 Year)</a> <small class="small_title">50/7 Amsterdam / HOLLAND</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 5</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 3</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 400</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes last" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/04_home.jpg" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/04_home.jpg"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$5 000 000</div>
                                            <div class="status_type">For Sale</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> Grand Triplex (Limited time)</a> <small class="small_title">1508 Bodrum / TURKEI</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 3</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 12</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 7</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 890</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>      

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes first" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/06_home.png" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/06_home.png"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$2.100.00</div>
                                            <div class="status_type">For Sale</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> Sea & Sun and A House</a> <small class="small_title">2307 New York City</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 3</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 4</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 445</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/07_home.png" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/07_home.png"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$3650</div>
                                            <div class="status_type">For Rent</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> Creative & Modern Family House</a> <small class="small_title">120/79 ST Antalya / TURKEI</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 2</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 3</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 6</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 240</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/08_home.png" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleMg">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/08_home.png"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$5200</div>
                                            <div class="status_type">For Rent</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> 2 Week Holland Travel</a> <small class="small_title">21/22 Hanue / Germany</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 1</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 4</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 200</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes last" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="demos/09_home.png" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleSc">
                                                <span class="WhiteSquare"><a class="fancybox" href="demos/09_home.png"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a class="fancybox" data-type="iframe" href="http://player.vimeo.com/video/64550407?autoplay=1"><i class="fa fa-video-camera"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="single-property.html"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">$2 200 000</div>
                                            <div class="status_type">For Sale</div>
                                        </div>
                                        <h2 class="title"><a href="single-property.html"> House in New York City</a> <small class="small_title">980 Roterdam / Holland</small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
                                            <span class="garage first"><strong>Garage</strong><i class="icon-garage"></i> 1</span>
                                            <span class="bedrooms"><strong>Beds</strong><i class="icon-bed"></i> 5</span>
                                            <span class="status"><strong>Baths</strong><i class="icon-bath"></i> 2</span>
                                            <span class="sqft last"><strong>Area</strong><i class="icon-sqft"></i> 360</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
                                                   
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end overlay1 -->
            </div><!-- end threewrapper -->
        </section><!-- end parallax -->
                  
        <section class="generalwrapper dm-shadow clearfix">
        	<div class="container">
				<div class="row">
                	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 first clearfix">
                    	<div class="widget cats_widget clearfix">
							<div class="title"><h3><i class="icon-sale"></i> For Sale</h3></div>
                			<ul class="real-estate-cats-widget" data-effect="slide-left">
                                <li><a href="#">Housing (21)</a>
                                    <ul>
                                        <li><a href="#">Apartment</a></li>
                                        <li><a href="#">Villa</a></li>
                                        <li><a href="#">Summerhouse</a></li>
                                        <li><a href="#">Family House</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Workplace (12)</a>
                                    <ul>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Apartment</a></li>
                                        <li><a href="#">Resort</a></li>
                                        <li><a href="#">Emporium</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Land (9)</a>
                                    <ul>
                                        <li><a href="#">Arable Field</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        
                    	<div class="widget clearfix">
							<div class="title"><h3><i class="icon-rent"></i> For Rent</h3></div>
                			<ul class="real-estate-cats-widget" data-effect="slide-left">
                                <li><a href="#">Housing (15)</a>
                                    <ul>
                                        <li><a href="#">Apartment</a></li>
                                        <li><a href="#">Villa</a></li>
                                        <li><a href="#">Summerhouse</a></li>
                                        <li><a href="#">Family House</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Workplace (65)</a>
                                    <ul>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Apartment</a></li>
                                        <li><a href="#">Resort</a></li>
                                        <li><a href="#">Emporium</a></li>
                                        <li><a href="#">Arable Field</a></li>
                                        <li><a href="#">Land</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                    </div>
                    
                	<div class="col-lg-7 col-md-9 col-sm-9 col-xs-12 clearfix">
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
					</div><!-- end col-lg-7 -->

 					<div class="col-lg-3 col-md-6 col-sm-9 col-xs-12 last clearfix">
                    	<div class="widget clearfix">
                        	<div class="agents_widget">
                            	<div class="title"><h3><i class="fa fa-users"></i> Our Agents</h3></div>
								<div class="agent boxes clearfix" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" src="demos/01_team.png" alt="">
                                    </div><!-- image -->
                                    <div class="agent_desc">
                                    	<h3 class="title">Mustapha COLLIENS</h3>
										<p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                        <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                                    </div><!-- agento desc -->
								</div>
								<div class="agent boxes clearfix" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" src="demos/02_team.png" alt="">
                                    </div><!-- image -->
                                    <div class="agent_desc">
                                    	<h3 class="title">Stephania JOHNSON</h3>
										<p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                        <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                                    </div><!-- agento desc -->
								</div>
								<div class="agent boxes clearfix" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" src="demos/03_team.png" alt="">
                                    </div><!-- image -->
                                    <div class="agent_desc">
                                    	<h3 class="title">Mark ANTHONY</h3>
										<p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                        <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                                    </div><!-- agento desc -->
								</div>     
								<div class="agent boxes clearfix" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" src="demos/04_team.png" alt="">
                                    </div><!-- image -->
                                    <div class="agent_desc">
                                    	<h3 class="title">Jenny ANTHONY</h3>
										<p><span><i class="fa fa-envelope"></i> info@yoursite.com</span></p>
                                        <p><span><i class="fa fa-phone-square"></i> +90 333 444 55 66</span></p>
                                    </div><!-- agento desc -->
								</div>                          
                            </div><!-- end of agents_widget -->
						</div><!-- end of widget -->
                     	<div class="widget text-center clearfix">
							<img data-effect="fade" class="img-thumbnail img-responsive" src="demos/01_banner.png" alt="">
						</div><!-- end of widget -->  
					</div><!-- end col-lg-4 --> 
				</div><!-- end row -->
            </div><!-- end dm_container -->  
        </section><!-- end generalwrapper -->
  
		<section id="two-parallax" class="parallax" style="background-image: url('demos/03_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="threewrapper">
                <div class="overlay1 dm-shadow">
                    <div class="container">
                    	<div class="row">
                        	<div class="text-center clearfix">
                            	<h3 class="big_title">Testimonials <small>Hundred thousand happy customers over 5 year </small></h3>
                            </div><!-- text-center -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="boxes testimonial_widget text-right first" data-effect="slide-left">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" alt="" src="demos/03_team.png">
                                    </div>
                                    <div class="testimonial_desc">
                                    <h3 class="title">Mark ANTHONY</h3>
                                    <p><i class="fa fa-quote-left"></i> Gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog niet half geloofwaardig ogen.. <i class="fa fa-quote-right"></i></p>
                                    </div>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="boxes testimonial_widget text-left last" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" alt="" src="demos/02_team.png">
                                    </div>
                                    <div class="testimonial_desc">
                                    <h3 class="title">Sandra ROBERTS</h3>
                                    <p><span><i class="fa fa-quote-left"></i></span> Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog niet half geloofwaardig ogen. <i class="fa fa-quote-right"></i></p>
                                    </div>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="boxes testimonial_widget text-right first" data-effect="slide-left">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" alt="" src="demos/04_team.png">
                                    </div>
                                    <div class="testimonial_desc">
                                    <h3 class="title">Amy JOHNSON</h3>
                                    <p><i class="fa fa-quote-left"></i> Lorem ipsum dehad van wijzigingen in een of andere vorm, door ingevoegde humor of willekeurig gekozen woorden die nog niet half ogen.. <i class="fa fa-quote-right"></i></p>
                                    </div>
								</div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="boxes testimonial_widget text-left last" data-effect="slide-right">
                                    <div class="image">
                                    	<img class="img-circle img-responsive img-thumbnail" alt="" src="demos/01_team.png">
                                    </div>
                                    <div class="testimonial_desc">
                                    <h3 class="title">Robert PIRSON</h3>
                                    <p><span><i class="fa fa-quote-left"></i></span> Vele variaties van passages van Lorem Ipsum beschikbaar maa, door ingevoegde humor of willekeurig gekozen woorden die nog niet half geloofwaardig ogen. <i class="fa fa-quote-right"></i></p>
                                    </div>
								</div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end overlay1 -->
            </div><!-- end threewrapper -->
        </section><!-- end parallax -->
        
        <section class="secondwrapper dm-shadow clearfix">
        	<div class="container">       
                <div class="row">
                	<div class="col-lg-5 col-md-5 col-sm-12">
                        <h3 class="big_title">Recent Properties <small>Handpicked Properties for you</small></h3>
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Family Home</span>
										<span class="price">€1 112 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/01_home.jpg" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Villa</span>
										<span class="price">€3 111 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/02_home.jpg" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Apertment</span>
										<span class="price">$2 000 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/03_home.jpg" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Family Home</span>
										<span class="price">€1 112 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/04_home.jpg" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Triplex</span>
										<span class="price">€3 100 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/05_home.png" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Family Home</span>
										<span class="price">€4 211 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/06_home.png" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Home</span>
										<span class="price">€3 000</span>
										<a href="#" class="status">On Rent</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/07_home.png" alt="">
                                </li>
                                <li>
                                    <div class="ps-mini-desc">
										<span class="type">Apertment</span>
										<span class="price">€1 112 000</span>
										<a href="#" class="status">On Sale</a>
                                    </div>
                                    <img class="img-thumbnail" src="demos/08_home.png" alt="">
                                </li>  
                            </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li><img class="img-thumbnail" src="demos/01_home.jpg" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/02_home.jpg" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/03_home.jpg" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/04_home.jpg" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/05_home.png" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/06_home.png" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/07_home.png" alt=""></li>
                                <li><img class="img-thumbnail" src="demos/08_home.png" alt=""></li>
                            </ul>
                        </div>  
                    </div><!-- end col6 -->
                    
                	<div class="col-lg-7 col-md-7 col-sm-12">
						<h3 class="big_title">News & Updates <small>The most popular real estate news</small></h3>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <article class="blog-wrap">
                                <div class="blog-media">
                                   <iframe src="http://player.vimeo.com/video/73221098?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div><!-- end blog media -->
                                <div class="post-date">
                                    <span class="day">01</span>
                                    <span class="month">Feb</span>
                                </div><!-- end post-date -->
            
                                <div class="post-content">
                                    <h2><a href="single-blog.html">New York City 124/56 for Sale!</a></h2>
                                        <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel.</p>
                                    <div class="post-meta">
                                        <span><i class="fa fa-user"></i> <a href="#">John Doe</a> </span>
                                        <span><i class="fa fa-tag"></i> <a href="#">Video</a> </span>
                                        <span><i class="fa fa-comments"></i> <a href="#">1 Comments</a></span>
                                    </div><!-- end post-meta -->
                                        <a href="single-blog.html" class="btn btn-primary btn-xs">read more</a>
                                </div><!-- post-content -->
                            </article><!-- end blog wrap -->
                        </div><!-- end col-lg-6 -->
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <article class="blog-wrap">
                                <div class="blog-media">
									<iframe src="http://player.vimeo.com/video/64550407?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div><!-- end blog media -->
                                <div class="post-date">
                                    <span class="day">12</span>
                                    <span class="month">Jan</span>
                                </div><!-- end post-date -->
            
                                <div class="post-content">
                                    <h2><a href="single-blog.html">Estate+ video presentation</a></h2>
                                        <p>Er zijn vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel.</p>
                                    <div class="post-meta">
                                        <span><i class="fa fa-user"></i> <a href="#">Mark Doe</a> </span>
                                        <span><i class="fa fa-tag"></i> <a href="#">Video</a> </span>
                                        <span><i class="fa fa-comments"></i> <a href="#">11 Comments</a></span>
                                    </div><!-- end post-meta -->
                                        <a href="single-blog.html" class="btn btn-primary btn-xs">read more</a>
                                </div><!-- post-content -->
                            </article><!-- end blog wrap -->
                        </div><!-- end col-lg-6 -->
                    </div><!-- end col7 -->
				</div><!-- end row -->
            </div><!-- end dm_container -->  
        </section><!-- end secondwrapper -->

        <section id="four-parallax" class="parallax" style="background-image: url('demos/04_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            <div class="overlay1 dm-shadow">
            	<div class="container">
                	<div class="row">
                        <div class="text-center clearfix">
                            <h3 class="big_title">Agencies <small>Some real estate agencies working with us</small></h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="boxes agencies_widget first" data-effect="slide-bottom"> 
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">NYC Real Estate Group</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="#" class="btn btn-primary btn-sm">About Agencie</a> <a href="#" class="btn btn-primary btn-sm">Assigned Properties</a>
                                        
                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-effect="slide-bottom">
                            <div class="boxes agencies_widget last">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">Istanbul Real Estate</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="#" class="btn btn-primary btn-sm">About Agencie</a> <a href="#" class="btn btn-primary btn-sm">Assigned Properties</a>
                                        
                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="boxes agencies_widget first" data-effect="slide-bottom"> 
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">Madrid Real Estate Company INC.</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="#" class="btn btn-primary btn-sm">About Agencie</a> <a href="#" class="btn btn-primary btn-sm">Assigned Properties</a>
                                        
                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->
                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-effect="slide-bottom">
                            <div class="boxes agencies_widget last">
                                <div class="col-lg-3">
                                    <div class="image">
                                        <img class="img-responsive img-thumbnail" src="demos/agencies_logo.png" alt="">
                                    </div><!-- end agencies img -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="agencies_desc">
                                        <h3 class="title">Amsterdam Real Estate Group</h3>
                                        <p>Vele variaties van passages van Lorem Ipsum beschikbaar maar het merendeel heeft te lijden gehad van wijzigingen in een of andere vorm...</p>
                                        <a href="#" class="btn btn-primary btn-sm">About Agencie</a> <a href="#" class="btn btn-primary btn-sm">Assigned Properties</a>
                                        
                                    </div><!-- agencies_desc -->
                                </div>
                                <div class="clearfix"></div>
                                <div class="agencies_meta">
                                    <span><i class="fa fa-envelope"></i> <a href="mailto:support@sitename.com">support@sitename.com</a></span>
                                    <span><i class="fa fa-link"></i> <a href="#">www.sitename.com</a></span>
                                    <span><i class="fa fa-phone-square"></i> +1 232 444 55 66</span>
                                </div><!-- end agencies_meta -->
                            </div><!-- end boxes -->
                        </div><!-- end col-6 -->
              		</div><!-- end row -->
                    <div class="text-center clearfix">
                    	<a class="btn btn-primary" href="agencies.html">VIEW ALL AGENCIES</a>
                    </div><!-- end text-center -->
            	</div><!-- end dm_container -->
            </div><!-- end overlay -->
        </section>  
            
        <section class="message_banner dm-shadow">
        	<div class="container">
            	<div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="message">
                        <h2>ESTATE PLUS A <strong>Real Estate</strong> Website Template</h2>
                        </div>
                	</div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="message">
                      		<a class="btn btn-primary btn-block btn-lg" href="#"><i class="fa fa-home"></i> VIEW ALL PROPERTIES</a>
                        </div>
                	</div>
                </div>
            </div>
        </section>
        
        <footer class="footer1">
        	<div class="container">
            	<div class="row">
                	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 first clearfix">
                   		<div class="widget clearfix">
                        	<div class="title"><h3>Site Links</h3><hr></div>
                            <ul class="list">
                            	<li><a title="" href="#">Support</a></li>
                            	<li><a title="" href="#">Get in touch</a></li>
                            	<li><a title="" href="#">About us</a></li>
                            	<li><a title="" href="#">Terms of use</a></li>
                            	<li><a title="" href="#">Copyrights</a></li>
                            	<li><a title="" href="#">Join us</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->
                	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-xs-12 clearfix">
                   		<div class="widget clearfix">
                        	<div class="title"><h3><i class="fa fa-home"></i> About Estate+</h3><hr></div>
                            	<p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free.</p>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-info"></i> read more</a>
                        </div>
                    </div><!-- end col-lg-3 -->
                	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-xs-12 clearfix">
                   		<div class="widget clearfix">
                        	<div class="title"><h3>Twitter Stream</h3><hr></div>
                            <ul class="tweet">
                            	<li><a title="" href="#">@support</a> Latin words, combined with sentence structures, to generate Lorem Ipsum which looks reasonable.
                                <small><a href="#">12 Minutes Ago</a></small>
                                </li>
                            	<li><a title="" href="#">@designingmedia</a> To generate Lorem Ipsum which looks reasonable.
                                <small><a href="#">34 Minutes Ago</a></small>
                                </li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->
                	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 last clearfix">
                   		<div class="widget clearfix">
                        	<div class="title"><h3><i class="fa fa-envelope-o"></i> Newsletter Form</h3><hr></div>
                            <p>Latin words, combined with a handful of model sentence structures, to generate.</p>
                              <form class="form-inline" role="form">
                                <div class="form-group">
                                  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                              </form>
                        </div>
                    </div><!-- end col-lg-4 -->
                </div><!-- row -->
            </div><!-- container -->
        </footer><!-- footer1 -->
        
        <section class="copyright">
        	<div class="container">
            	<div class="row">
                	<div class="col-lg-6 col-sm-6 col-md-6">
                        <p><small>Estate+ a real estate template. Copyright 2014</small></p>
                    </div>
                	<div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="social clearfix pull-right">
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="" href="#"><i class="fa fa-twitter"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="#"><i class="fa fa-facebook"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="#"><i class="fa fa-google-plus"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Github" title="" href="#"><i class="fa fa-github"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Pinterest" title="" href="#"><i class="fa fa-pinterest"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="#"><i class="fa fa-rss"></i></a></span>
                        </div><!-- end social -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end copyright -->
        
    
	<!-- Bootstrap core and JavaScript's
    ================================================== -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.parallax.js"></script>
    <script src="js/jquery.fitvids.js"></script>    
	<script src="js/jquery.unveilEffects.js"></script>	
	<script src="js/retina-1.1.0.js"></script>
    <script src="js/fhmm.js"></script>
	<script src="js/bootstrap-select.js"></script>
    <script src="fancyBox/jquery.fancybox.pack.js"></script>
	<script src="js/application.js"></script>
    
	<!-- FlexSlider JavaScript
    ================================================== -->
 	<script src="js/jquery.flexslider.js"></script>
	<script>
        $(window).load(function() {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: true,
                directionNav: false,
                animationLoop: true,
                slideshow: true,
                itemWidth: 114,
                itemMargin: 0,
                asNavFor: '#slider'
            });
       
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel"
            });
            
            $('#property-slider .flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 6000,
                animationSpeed:	1300,
                directionNav: true,
                controlNav: false,
                keyboardNav: true
            });
        });
    </script>

</body>
</html>