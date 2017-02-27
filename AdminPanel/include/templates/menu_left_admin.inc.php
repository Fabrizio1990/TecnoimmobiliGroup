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

//NEWS MANAGEMENT
$act_menu_news_management 	= isset($act_menu_news_management)?$act_menu_news_management:false;

// UTILITY THREEVIEW
$act_menu_utility           = isset($act_menu_utility)?$act_menu_utility:false;
$act_agencies_access        = isset($act_agencies_access)?$act_agencies_access:false;
$act_documents              = isset($act_documents)?$act_documents:false;
$act_e_commerce             = isset($act_e_commerce)?$act_e_commerce:false;
$act_statistics             = isset($act_statistics)?$act_statistics:false;
 
?>

<!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/logo_160x160.jpg" class="img-circle" alt="User Image">
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
                        <ul class="treeview-menu">
                            <li <?php if($act_agencies_management) echo('class="active"')?>><a href="agencies_management.php"><i class="fa fa-group"></i> Gestione Agenzie</a></li>
                            <li <?php if($act_tables_management) echo('class="active"')?>><a href="tables_management.php"><i class="fa fa-table"></i> Gestione Tabelle</a></li>
                        </ul>
                    </li>
                    <!-- MENU GESTIONE END -->

                    <!-- MENU UTILITY -->

                    <li class="treeview <?php if($act_menu_utility) echo('active')?>">
                        <a href="#">
                            <i class="fa fa-wrench"></i>
                            <span>Utility</span>
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
                            <li <?php if($act_e_commerce) echo('class="active"')?>>
                                <a href="#"><i class="fa fa-balance-scale"></i>
                                    E-Commerce
                                </a>
                            </li>
                            <li <?php if($act_statistics) echo('class="active"')?>>
                                <a href="#"><i class="fa fa-bar-chart"></i>
                                    Statistiche
                                </a>
                            </li>

                            <!-- da aggiungere DOCUMENT | E-COMMERCE | STATISTICHE -->
                        </ul>
                    </li>
                    <!-- MENU UTILITY END -->


                    <!-- MENU NEWS -->
                    <li <?php if($act_menu_news_management) echo('class="active"')?>>
                        <a href="news_management.php"><i class="fa fa-newspaper-o"></i><span> News</span></a>
                    </li>
                    <!-- MENU NEWS END -->




                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Layout Options</span>
                            <span class="pull-right-container">
<span class="label label-primary pull-right">4</span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/widgets.html">
                            <i class="fa fa-th"></i> <span>Widgets</span>
                            <span class="pull-right-container">
<small class="label pull-right bg-green">new</small>
</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Charts</span>
                            <span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>UI Elements</span>
                            <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Forms</span>
                            <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Tables</span>
                            <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/calendar.html">
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <span class="pull-right-container">
<small class="label pull-right bg-red">3</small>
<small class="label pull-right bg-blue">17</small>
</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
<small class="label pull-right bg-yellow">12</small>
<small class="label pull-right bg-green">16</small>
<small class="label pull-right bg-red">5</small>
</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Examples</span>
                            <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level One
<span class="pull-right-container">
  <i class="fa fa-angle-left pull-right"></i>
</span>
</a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                    <li>
                                        <a href="#"><i class="fa fa-circle-o"></i> Level Two
	<span class="pull-right-container">
	  <i class="fa fa-angle-left pull-right"></i>
	</span>
  </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        </ul>
                    </li>
                    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                    <li class="header">LABELS</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>