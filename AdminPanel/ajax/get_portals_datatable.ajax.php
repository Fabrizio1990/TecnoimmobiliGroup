<?php

	header('Content-type: text/json; charset=utf-8');
	include("../../config.php");
    include(BASE_PATH."/app/classes/Portals&Feed/PortalManager.php");
    include(BASE_PATH."/app/classes/ImageHelper/ImagesInfo.php");

    $prtMng = new PortalManager();
    $imgH = new ImagesInfo();
    $imgPaths = $imgH->info;
    $feedGenerationBaseLink = SITE_URL."/_OTHER/FEED_XML/feed_controller.php";
    //FEED GENERATION LINK EXAMPLE




	$ret = array("aaData"=>array());//sintassi di base che si aspetta datatable , cioè un json con elemento padre aaData e i sottoelementi contengono i dati


    $res = $prtMng->getPortalList();


    $resultFound = Count($res);
    if ($resultFound>0 && $resultFound!="" && $resultFound!=null){
        for($i=0;$i<$resultFound;$i++) {

            $logo_path = SITE_URL."/".$imgPaths["portals"]["min"]["path"].$res[$i]["logo_name"];
            $id = $res[$i]["id_portal"];
            $portalName   = htmlentities($res[$i]["portal_name"], ENT_QUOTES);

            $link_portal_management = SITE_URL."/AdminPanel/add_portal.php";
            $link_portal_conversions = SITE_URL."/AdminPanel/add_portal_conversions.php";
            $portalLink = "<a href='".$res[$i]['portal_site']."' target='blank' data-toggle=\"tooltip\" title=\"Vai al  sito\">".$portalName."</a>";
            $feedGenerationFullLink =$feedGenerationBaseLink ."?portal=trovit&feed=trovit";
            $feedLink =$feedGenerationBaseLink ."?portal=trovit&feed=trovit";

            $date_ins ="<input type='hidden' value='".$res[$i]["portal_date_ins"] ."' />" . Date("d-m-Y", strtotime($res[$i]["portal_date_ins"]));


            $img_logo = "<form action='$link_portal_management' method='POST' target='_blank'><input type='hidden' name='id_portal' class='id_portal' value='$id' /><img onclick='this.parentNode.submit()' class='POINTER' src='".$logo_path."' alt='$portalName' data-toggle=\"tooltip\" title=\"Modifica Dati portale\" /></form>";

            $form_feed_conversion = "
<div class='row'>
    <div class='col-md-12'>
        <form action='$link_portal_conversions' method='POST' target='_blank'>
            <input type='hidden' name='id_portal' class='id_portal' value='$id' />
            <input class='btn btn-xs btn-tecnoimm-blue' type='submit' value='Conversioni'/>
        </form>
    </div>
    <div class='col-md-12'>
        <a href='javascript:generatePortalFeeds(". $id .")' target='_blank' class=' MARGIN_TOP_10 btn btn-xs btn-tecnoimm-red' type='button'> Genera i Feed<a/>
    </div>
</div>";

            $notes   = htmlentities($res[$i]["notes"], ENT_QUOTES);

            // MAX ENTRIES SHOW AND EDIT
            $limitEntriesField = "";
            $limitEntries = $res[$i]["entries_max"];
            $limitEntriesField = "<div class='valueMode'><div class='col-md-9 PADDING-0 currentLimit' >".($limitEntries == "-1"?"Illimitato":$limitEntries)."</div>"."<div class='col-md-3 PADDING-0'><button type=\"button\" class=\"btn  btn-info btn-xs DISPL_INLINE\" onclick='toggleLimitEdit(this)'><i class='fa fa-fw fa-edit' data-toggle=\"tooltip\" title=\"Modifica limiti\"></i></button> </div></div>";
            $limitEntriesField .= "<div class='editMode HIDDEN'><div class='col-md-4 PADDING-0 V_ALIGN_MIDDLE'><input class='form-control newLimit' type='number' value='$limitEntries'/></div><div class='col-md-3'></div><div class='col-md-5 ALIGN_RIGHT'><button type=\"button\" class=\"btn  btn-warning btn-xs DISPL_INLINE\" onclick='toggleLimitEdit(this)' data-toggle=\"tooltip\" title=\"Annulla\"><i class='fa fa-fw fa-undo' ></i></button><button type=\"button\" class=\"btn  btn-success btn-xs DISPL_INLINE\" onclick='saveNewLimit($id,this)' data-toggle=\"tooltip\" title=\"Salva limite\"><i class='fa fa-fw fa-save' ></i></button></div></div>";


            /***************************/

            $propertiesLink = SITE_URL."/AdminPanel/show_properties_on_portal.php?id_portal=".$id;

            $currentEntries = "<div class='col-md-9 PADDING-0' >".$res[$i]["count_properties"]."</div>"."<div class='col-md-3 PADDING-0'><a href='$propertiesLink' type=\"button\" class=\"btn  btn-info btn-xs \" data-toggle=\"tooltip\" title=\"Modifica lista annunci attivi\"><i class='fa fa-fw fa-edit' ></i></a></div>";



            $portal_status  = "<input type='checkbox' class='switch' " .($res[$i]["portal_enabled"]=="1"?"checked":"") .">";
            ;

            array_push($ret["aaData"],array($img_logo,$portalLink,$form_feed_conversion.$notes,$limitEntriesField,$currentEntries,$portal_status,$date_ins));

        }
    }


	echo(json_encode($ret));



?>