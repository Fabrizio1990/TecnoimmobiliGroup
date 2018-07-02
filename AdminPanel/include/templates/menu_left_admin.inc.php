<?php

// THESE VARIABLES ARE USED TO SET THE CORRECT MENU HIGLIGHTED

//MAIN PAGE (CONTROL PANEL)
$act_control_panel 	        = isset($act_control_panel)?$act_control_panel:false;

// PROPERTY THREEVIEW
$act_menu_propery		    = isset($act_menu_propery)?$act_menu_propery:false;
$act_add_property 		    = isset($act_add_property)?$act_add_property:false;
$act_list_properties 	    = isset($act_list_properties)?$act_list_properties:false;
$act_del_properties 	    = isset($act_del_properties)?$act_del_properties:false;

// MANAGEMENT THREEVIEW
$act_menu_management        = isset($act_menu_management)?$act_menu_management:false;
$act_agencies_management    = isset($act_agencies_management)?$act_agencies_management:false;
$act_tables_management      = isset($act_tables_management)?$act_tables_management:false;
// FEED
$act_feed_management        =  isset($act_feed_management)?$act_feed_management:false;
$act_portals_panel          =  isset($act_portals_panel)?$act_portals_panel:false;
$act_portal_add             =  isset($act_portal_add)?$act_portal_add:false;
$act_portal_conversion_file =  isset($act_portal_conversion_file)?$act_portal_conversion_file:false;
$act_feed_log               =  isset($act_feed_log)?$act_feed_log:false;

//NEWS MANAGEMENT
$act_menu_news_management 	= isset($act_menu_news_management)?$act_menu_news_management:false;



// UTILITY THREEVIEW
$act_menu_utility           = isset($act_menu_utility)?$act_menu_utility:false;
$act_agencies_access        = isset($act_agencies_access)?$act_agencies_access:false;
$act_documents              = isset($act_documents)?$act_documents:false;
$act_agency_add             = isset($act_agency_add)?$act_agency_add:false;
$act_agency_list            = isset($act_agency_list)?$act_agency_list:false;
$act_e_commerce             = isset($act_e_commerce)?$act_e_commerce:false;
$act_newsletter             = isset($act_newsletter)?$act_newsletter:false;
$act_statistics             = isset($act_statistics)?$act_statistics:false;
$act_statistics             = isset($act_statistics)?$act_statistics:false;
$act_show_logs              = isset($act_show_logs)?$act_show_logs:false;
// MAGAZINE MANAGEMENT
$act_magazine_management   = isset($act_magazine_management)?$act_magazine_management:false;
$act_magazine_print        = isset($act_magazine_print)?$act_magazine_print:false;
$act_magazine_customize    = isset($act_magazine_customize)?$act_magazine_customize:false;
 
?>

<!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/logo_160x160.jpg"  class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $SS_usr->agent_name. " " .$SS_usr->agent_lastname ?>
                        </p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i> Online
                        </a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
</button>
</span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MENU'</li>
					<!-- MENU HOME -->
					<li <?php if($act_control_panel) echo('class="active"')?>>
							<a href="index.php"><i class="fa fa-dashboard"></i><span> Pannello di controllo</span></a>
					</li>
					<!-- MENU HOME END -->
					
					<!-- MENU IMMOBILI -->
					<li class="treeview <?php if($act_menu_propery) echo('active')?>">
                        <a href="#">
                            <i class="fa fa-home"></i>
                            <span>Immobili</span>
                            <span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if($act_add_property) echo('class="active"')?>><a href="add_property.php"><i class="fa fa-plus-square"></i> Aggiungi Immobile</a></li>
                            <li <?php if($act_list_properties) echo('class="active"')?>><a href="show_properties.php"><i class="fa fa-edit"></i> Modifica Immobili</a></li>
                        </ul>
                    </li>
					<!-- MENU IMMOBILI END -->



                    <!-- MENU GESTIONE -->

                    <li class="treeview <?php if($act_menu_management) echo('active')?>">
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>Gestione Admin</span>
                            <span class="pull-right-container">
							    <i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <!-- GESTIONE AGENZIE -->

                        <ul class="treeview-menu">
                            <li <?php if($act_agencies_management) echo('class="active"')?>>
                                <a href="#"><i class="fa fa-group"></i> Gestione Agenzie
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li <?php if($act_agency_add) echo('class="active"')?>><a href="agency_add.php"><i class="fa fa-circle-o"></i> Aggiungi Agenzia</a></li>
                                    <li <?php if($act_agency_list) echo('class="active"')?>><a href="agencies_list.php"><i class="fa fa-circle-o"></i> Modifica Agenzia</a></li>

                                </ul>
                            </li>


                        <!-- GESTIONE PORTALI -->

                            <li <?php if($act_feed_management) echo('class="active"')?>>
                                <a href="#">
                                    <i class="fa fa-group"></i> Gestione Portali
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>

                                <ul class="treeview-menu">
                                    <li <?php if($act_portals_panel) echo('class="active"')?>><a href="portals_panel.php"><i class="fa fa-circle-o"></i> Pannello Portali</a></li>
                                    <li <?php if($act_portal_add) echo('class="active"')?>><a href="add_portal.php"><i class="fa fa-circle-o"></i> Aggiungi Portale</a></li>
                                    <li <?php if($act_portal_conversion_file) echo('class="active"')?>><a href="add_portal_conversion_file.php"><i class="fa fa-circle-o"></i> Csv Conversione</a></li>

                                    <li <?php if($act_feed_log) echo('class="active"')?>><a href="feed_log.php"><i class="fa fa-circle-o"></i> Log Feed</a></li>

                                </ul>
                            </li>
                        </ul>


                    <!-- MENU GESTIONE END -->

                    <!-- MENU UTILITY -->

                    <li class="treeview <?php if($act_menu_utility) echo('active')?>">
                        <a href="#">
                            <i class="fa fa-wrench"></i>
                            <span>Utilità</span>
                            <span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if($act_agencies_access) echo('class="active"')?>>
                                <a href="agencies_access.php"><i class="fa fa-unlock"></i>
                                     Accesso Agenzie
                                </a>
                            </li>
                            <li <?php if($act_documents) echo('class="active"')?>>
                                <a href="documents.php"><i class="fa fa-book"></i>
                                    Documenti
                                </a>
                            </li>

                            <li <?php if($act_newsletter) echo('class="active"')?>>
                                <a href="newsletter.php"><i class="fa fa-newspaper-o"></i>
                                    Richieste / Newsletter
                                </a>
                            </li>


                            <!-- ########## SEZIONE RIVISTA #########-->

                            <li <?php if($act_magazine_management) echo('class="active"')?>>
                                <a href="#">
                                    <i class="fa fa-newspaper-o"></i> Rivista
                                    <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                                </a>

                                <ul class="treeview-menu">
                                    <li <?php if($act_magazine_print) echo('class="active"')?>><a href="magazine_print_selection.php"><i class="fa fa-print"></i> Stampa rivista</a></li>
                                    <li <?php if($act_magazine_customize) echo('class="active"')?>><a href="magazine_customization.php"><i class="fa fa-reorder"></i>Personalizza rivista</a></li>

                                </ul>
                            </li>

                            <!-- ########## FINE SEZIONE RIVISTA #########-->

                            <li <?php if($act_statistics) echo('class="active"')?>>
                                <a href="statistics.php"><i class="fa fa-bar-chart"></i>
                                    Statistiche
                                </a>
                            </li>

                            <li <?php if($act_show_logs) echo('class="active"')?>>
                                <a href="log_list.php"><i class="fa fa-file-text-o"></i>
                                    Log errori
                                </a>
                            </li>

                            <!-- TODO da aggiungere  | E-COMMERCE -->
                        </ul>
                    </li>
                    <!-- MENU UTILITY END -->


                    <!-- MENU NEWS -->
                    <li <?php if($act_menu_news_management) echo('class="active"')?>>
                        <a href="news_management.php"><i class="fa fa-newspaper-o"></i><span> News</span></a>
                    </li>
                    <!-- MENU NEWS END -->



                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>