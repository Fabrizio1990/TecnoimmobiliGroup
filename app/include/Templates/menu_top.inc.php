<!-- INCLUDED IN APP/INCLUDE/TEMPLATES/HEADER.INC.PHP -->
<?php
if(!isset($menuSelected))
    $menuSelected ="home";

function checkSelected($menuName,$activeCommand = "active"){
    global $menuSelected ,$subMenuSelected, $subMenu2Selected;
    if($menuSelected == $menuName || $subMenuSelected == $menuName || $subMenu2Selected == $menuName)
        echo "active";
}
?>


<nav class="navbar navbar-default fhmm" role="navigation">
    <div class="menudrop container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div><!-- end navbar-header -->
        <div id="defaultmenu" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li class="dropdown fhmm-fw <?php checkSelected("home") ?>">
                    <a href="<?php echo SITE_URL ?>"><i class="fa fa-home"></i> HOME</a>
                </li>


                <li class="dropdown fhmm-fw <?php checkSelected("aste_immobiliari") ?>">
                    <a href="<?php echo SITE_URL."/aste_immobiliari.html" ?>"> ASTE IMMOBILIARI</a>
                </li>


                <!-- standard drop down -->
                <li class="dropdown <?php checkSelected("finanziaria") ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle ">FINANZIARIA<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="<?php checkSelected("mutui") ?>"><a href="<?php echo SITE_URL."/mutui.html" ?>" >Mutui</a></li>
                        <li class="<?php checkSelected("perizie") ?>"><a href="<?php echo SITE_URL."/perizie_bancarie.html" ?>" >Perizie bancarie</a></li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->


                <!-- standard drop down -->
                <li class="dropdown <?php checkSelected("studioTecnico") ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle <?php checkSelected("studio_tecnico") ?>">STUDIO TECNICO<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="<?php checkSelected("perizieLegali") ?>"><a href="<?php echo SITE_URL."/perizie_legali.html" ?>">Perizie legali</a></li>
                        <li class="<?php checkSelected("serviziTecnici") ?>"><a href="<?php echo SITE_URL."/servizi_tecnici.html" ?>">Servizi tecnici</a></li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->


                <!-- standard drop down -->
                <li class="dropdown <?php checkSelected("gruppo") ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle <?php checkSelected("gruppo") ?>">IL GRUPPO<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="<?php checkSelected("agenzie") ?>"><a href="<?php echo SITE_URL."/agenzie.html" ?>">Agenzie</a></li>
                        <li class="<?php checkSelected("chiSiamo") ?>"><a href="<?php echo SITE_URL."/chi_siamo.html" ?>">Chi siamo</a></li>
                        <li class="<?php checkSelected("doveSiamo") ?>"><a href="<?php echo SITE_URL."/dove_siamo.html" ?>">Dove Siamo</a></li>
                        <li class="<?php checkSelected("contatti") ?>"><a href="<?php echo SITE_URL."/contatti.html" ?>">Contatti</a></li>
                        <li class="<?php checkSelected("lavoraConNoi") ?>"><a href="<?php echo SITE_URL."/lavora_con_noi.html" ?>">Lavora con noi</a></li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->

                <li class="dropdown fhmm-fw <?php checkSelected("mediazione_civile") ?>">
                    <a href="<?php echo SITE_URL."/mediazione_civile.html" ?>"> MEDIAZIONE CIVILE</a>
                </li>

                <li class="dropdown fhmm-fw <?php checkSelected("partner") ?>">
                    <a href="<?php echo SITE_URL."/partner.html" ?>"> PARTNER</a>
                </li>



            </ul><!-- end nav navbar-nav -->
        </div><!-- end #navbar-collapse-1 -->
    </div><!-- end dm_container -->
</nav><!-- end navbar navbar-default fhmm -->

