<?php

// THESE VARIABLES ARE USED TO SET THE CORRECT MENU HIGLIGHTED

//MAIN PAGE (CONTROL PANEL)
$act_control_panel 	        = isset($act_control_panel)?$act_control_panel:false;

// PROPERTY THREEVIEW
$act_menu_propery		    = isset($act_menu_propery)?$act_menu_propery:false;
$act_add_property 		    = isset($act_add_property)?$act_add_property:false;
$act_list_properties 	    = isset($act_list_properties)?$act_list_properties:false;
$act_del_properties 	    = isset($act_del_properties)?$act_del_properties:false;

// DOCUMENTS MENU
$act_documents              = isset($act_documents)?$act_documents:false;

// UTILITY THREEVIEW
$act_menu_utility           = isset($act_menu_utility)?$act_menu_utility:false;
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

                    <!-- MENU DOCUMENTI -->

                    <li <?php if($act_documents) echo('class="active"')?>>
                        <a href="documents.php"><i class="fa fa-book"></i><span> Documenti</span></a>
                    </li>

                    <!-- MENU DOCUMENTI END -->

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


                        </ul>
                    </li>
                    <!-- MENU UTILITY END -->

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>