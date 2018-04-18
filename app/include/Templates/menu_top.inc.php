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
                        <li class="dropdown-submenu <?php checkSelected("progettazione")?>">
                            <a href="#">Progettazione</a>
                            <ul class="dropdown-menu">
                                <li class="<?php checkSelected("catasto") ?>"><a href="<?php echo SITE_URL."/catasto.html" ?>">Catasto</a></li>
                                <li class="<?php checkSelected("direzioneLavori") ?>"><a href="<?php echo SITE_URL."/direzione_lavori.html" ?>">Direzione lavori</a></li>
                                <li class="<?php checkSelected("praticheRisparmioEnergetico") ?>"><a href="<?php echo SITE_URL."/pratiche_risparmio_energetico.html" ?>">Pratiche risparmio energetico</a></li>
                                <li class="<?php checkSelected("servizi") ?>"><a href="<?php echo SITE_URL."/servizi.html" ?>">Servizi a privati e imprese</a></li>
                                <li class="<?php checkSelected("visure") ?>"><a href="<?php echo SITE_URL."/visure.html" ?>">Visure e ricerche</a></li>
                                <li class="<?php checkSelected("consulenze") ?>"><a href="<?php echo SITE_URL."/consulenze.html" ?>">Consulenze varie</a></li>
                            </ul>
                        </li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->


                <!-- standard drop down -->
                <li class="dropdown <?php checkSelected("mediazioneCivile") ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle <?php checkSelected("mediazione_civile") ?>">MEDIAZIONE CIVILE<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="<?php checkSelected("mediazioneObbligatoria") ?>"><a href="<?php echo SITE_URL."/mediazione_obbligatoria.html" ?>">Mediazione obbligatoria</a></li>
                        <li class="<?php checkSelected("mediazioneFacoltativa") ?>"><a href="<?php echo SITE_URL."/mediazione_facoltativa.html" ?>">Mediazione facoltativa</a></li>
                        <li class="<?php checkSelected("mediazioneVantaggi") ?>"><a href="<?php echo SITE_URL."/mediazione_vantaggi.html" ?>">Vantaggi della mediazione</a></li>
                        <li class="<?php checkSelected("vantaggiFiscali") ?>"><a href="<?php echo SITE_URL."/vantaggi_fiscali.html" ?>">Vantaggi fiscali</a></li>
                        <li class="<?php checkSelected("assistenzaLegale") ?>"><a href="<?php echo SITE_URL."/assistenza_legale.html" ?>">Assistenza legale</a></li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->



                <!-- standard drop down -->
                <li class="dropdown <?php checkSelected("gruppo") ?>"><a href="#" data-toggle="dropdown" class="dropdown-toggle <?php checkSelected("gruppo") ?>">IL GRUPPO<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="<?php checkSelected("chiSiamo") ?>"><a href="<?php echo SITE_URL."/chi_siamo.html" ?>">Chi siamo</a></li>
                        <li class="<?php checkSelected("doveSiamo") ?>"><a href="<?php echo SITE_URL."/dove_siamo.html" ?>">Dove Siamo</a></li>
                        <li class="<?php checkSelected("contatti") ?>"><a href="<?php echo SITE_URL."/contatti.html" ?>">Contatti</a></li>
                        <li class="<?php checkSelected("lavoraConNoi") ?>"><a href="<?php echo SITE_URL."/lavora_con_noi.html" ?>">Lavora con noi</a></li>
                    </ul><!-- end dropdown-menu -->
                </li><!-- end standard drop down -->


                <li class="dropdown fhmm-fw <?php checkSelected("partner") ?>">
                    <a href="<?php echo SITE_URL."/partner.html" ?>"> PARTNER</a>
                </li>



            </ul><!-- end nav navbar-nav -->
        </div><!-- end #navbar-collapse-1 -->
    </div><!-- end dm_container -->
</nav><!-- end navbar navbar-default fhmm -->