<?php 
require_once(BASE_PATH."/app/classes/OptionsManager.php");
require_once(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
require_once(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

$imgInfo = new ImagesInfo();
$prtMng  = new PortalManager();
$imgPathMin = $imgInfo->info["portals"]["min"]["path"];
$imgPathNormal = $imgInfo->info["portals"]["normal"]["path"];


$defFeedPath = "_OTHER/FEED_XML/output_feed";

$id_portal                  = 0;

// SEZIONE DATI PORTALE
$inpPortalName              = "";
$inpPortalSite              = "";
$inpPortalPersonalAreaLink  = "";
$inpPortalUsername          = "";
$inpPortalPassword          = "";
$inpPortalMaxProperties     = "";
$inpPortalHasContract       = "";
$inpPortalContractStart     = "";
$inpPortalContractEnd       = "";
$inpPortalContractPrice     = "";
$txtPortalNotes             = "";

// SEZIONE DATI FTP
$inpPortalHasFtp            = "";
$inpPortalLinkFtp           = "";
$inpPortalUserFtp           = "";
$inpPortalPswFtp            = "";

//SEZIONE DATI FEED
$inpPortalFeedsDoc       = "";
$inpPortalDocLink        = "";


// SEZIONE DATI CONTATTO
$inpPortalContactName       = "";
$inpPortalContactEmail      = "";
$inpPortalContactPhone      = "";
$inpPortalContactMobile     = "";
$inpPortalContactCity       = "";
$inpPortalContactAddress    = "";



if(isset($_REQUEST["id_portal"])){
    $id_portal = $_REQUEST["id_portal"];
    $res = $prtMng->getPortalDetails($id_portal);
    if(Count($res)> 0){
        $details = $res[0];

        // SEZIONE DATI PORTALE
        $imgPortal                  = $imgPathMin.$details["logo_name"];
        $inpPortalName              = $details["portal_name"];
        $inpPortalSite              = $details["portal_site"];
        $inpPortalPersonalAreaLink  = $details["personal_area_link"];
        $inpPortalUsername          = $details["portal_login_usr"];
        $inpPortalPassword          = $details["portal_login_psw"];
        $inpPortalMaxProperties     = $details["entries_max"];
        $inpPortalHasContract       = $details["has_contract"];
        $inpPortalContractStart     = date("Y-m-d",strtotime($details["contract_start"]));
        $inpPortalContractEnd       = date("Y-m-d",strtotime($details["contract_end"]));
        $inpPortalContractPrice     = $details["contract_price"];
        $txtPortalNotes             = $details["notes"];

// SEZIONE DATI FTP
        $inpPortalHasFtp            = $details["ftp_enabled"];
        $inpPortalLinkFtp           = $details["ftp_url"];
        $inpPortalUserFtp           = $details["ftp_user"];
        $inpPortalPswFtp            = $details["ftp_password"];

//SEZIONE DATI FEED
        $inpPortalFeedsDoc          = $details["doc_path"];
        $inpPortalDocLink           = $details["doc_url"];


// SEZIONE DATI CONTATTO
        $inpPortalContactName       = $details["contact_name"];
        $inpPortalContactEmail      = $details["contact_email"];
        $inpPortalContactPhone      = $details["contact_phone"];
        $inpPortalContactMobile     = $details["contact_mobile_phone"];
        $inpPortalContactCity       = $details["contact_city"];
        $inpPortalContactAddress    = $details["contact_address"];
    }

}



?>
<form name="FORM_PORTAL" id="FORM_PORTAL" novalidate accept-charset="UTF-8">
	<input type ="hidden" name="action" id="action" value="<?php echo $action ?>" />
	<input type ="hidden" name="id_ads" id="id_ads" value="<?php echo $id_portal ?>" />

	<div class="row">
	<!-- FILTRO PARAMETRI -->
			<!-- /.col (left) -->
		<div class="col-md-12">

			<!-- NAV TABS START -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="false">
							Dati contratto
						</a>
					</li>
					<li id="tab_portal_info">
						<a href="#tab_ftp_info" data-toggle="tab" aria-expanded="true">
							Dati Ftp
						</a>
					</li>
					<li >
                        <a href="#tab_feeds" data-toggle="tab" aria-expanded="true">
                            Dati Feed
                        </a>
                    </li>
                    <li >
                        <a href="#tab_contacts" data-toggle="tab" aria-expanded="true">
                            Contatti
                        </a>
                    </li>
					<li  style="float:right;">
						<button type="submit" class="btn btn-primary btn_submit" >Salva</button>
					</li>
				</ul>
				<div class="tab-content">

					<!-- #################### INIZIO TAB DESCRIZIONE ######################## -->
					<div class="tab-pane active" id="tab_details">
						<?php
						require("subcontents/add_portal_contract_data.inc.php")
						?>
					</div><!-- ####################### FINE TAB DESCRIZIONE  #######################-->


					<!-- #######################INIZIO TAB FTP INFO ############################## -->
					<div class="tab-pane" id="tab_ftp_info">
						<?php
						require("subcontents/add_portal_ftp_info.inc.php");
						?>
					</div><!-- ############# FINE TAB FTP INFO ################# -->



					<!-- #######################INIZIO TAB FEEDS ############################## -->
					<div class="tab-pane" id="tab_feeds">
						<?php
						require("subcontents/add_portal_feeds.inc.php");
						?>
					</div><!-- #######################FINE TAB FEEDS ############################## -->


                    <!-- #######################INIZIO TAB CONTACTS ############################## -->
                    <div class="tab-pane" id="tab_contacts">
                        <?php
                        require("subcontents/add_portal_contacts.inc.php");
                        ?>
                    </div><!-- #######################FINE TAB FEEDS ############################## -->



				</div><!-- FINE TAB CONTENT -->

			</div> <!-- FINE NAV TABS -->

		</div><!-- /.col-md-12 -->


	</div><!-- /.row-->
</form>
<!-- FINE PAGINA -->




