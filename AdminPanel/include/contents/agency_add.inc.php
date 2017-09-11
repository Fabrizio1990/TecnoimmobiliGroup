<?php

require_once(BASE_PATH."/app/classes/OptionsManager.php");
require_once(BASE_PATH."/app/classes/AgencyManager.php");
require_once(BASE_PATH."/app/classes/DefValues.php");

$agMng = new AgencyManager();
$defVal = new DefValues();

$action = "save";
$id_agency = isset($_REQUEST["id_agency"])?$_REQUEST["id_agency"]:"";
$id_agent  = "";


// DATI AGENZIA
$logo_path          = "deflogo_ext.png";
$banner             = "";
$name               = "";
$description        = $defVal->getDefaultValue("agency_description")[0]["value"];
$id_country         = 1;
$id_region          = "";
$id_city            = "";
$id_town            = "";
$id_district        = "";
$street             = "";
$street_num         = "";
$inp_competence_area= "";
$p_iva              = "";
$CF                 = "";
$REA                = "";
$business_register  = "";
$id_status          = "";
$id_sub_status      = "";
$id_portal_status   = "";
$date_ins           = "";
$date_up            = "";
$date_del           = "";

// DATI AGENTE

$agent_name                 = "";
$agent_lastname             = "";
$agent_email                = "";
$agent_private_email        = "";
$agent_phone                = "";
$agent_mobile_phone         = "";
$agent_fax                  = "";
$agent_skype                = "";
$agent_address              = "";
$agent_pIva                 = "";
$agent_CF                   = "";
$agent_REA                  = "";
$agent_id_status            = "";





if($id_agency!=""){
    $agencyData = $agMng->getAgenciesData("id =?",null,array($id_agency),null, false);
    //var_dump($agencyData);
    $agentData  = $agMng->getOperators("id_agency = ?"," order by date_ins asc limit 1",array($id_agency),null,false);
    if(Count($agencyData)>0) {
        // DATI AGENZIA
        $logo_path = $agencyData[0]["logo_path"];
        $banner = $agencyData[0]["banner"];
        $name = $agencyData[0]["name"];
        $description = $agencyData[0]["description"];
        $id_country = $agencyData[0]["id_country"];
        $id_region = $agencyData[0]["id_region"];
        $id_city = $agencyData[0]["id_city"];
        $id_town = $agencyData[0]["id_town"];
        $id_district = $agencyData[0]["id_district"];
        $street = $agencyData[0]["street"];
        $street_num = $agencyData[0]["street_num"];
        $inp_competence_area = $agencyData[0]["competence_area"];
        $p_iva = $agencyData[0]["p_iva"];
        $CF = $agencyData[0]["fiscal_code"];
        $REA = $agencyData[0]["rea"];
        $business_register = $agencyData[0]["business_register"];
        $id_status = $agencyData[0]["id_status"];
        $id_sub_status = $agencyData[0]["id_sub_status"];
        $id_portal_status = $agencyData[0]["id_portal_status"];
    }

    // DATI AGENTE
    if(Count($agentData)>0){
        $id_agent                   = $agentData[0]["id"];
        $agent_name                 = $agentData[0]["name"];
        $agent_lastname             = $agentData[0]["lastname"];
        $agent_email                = $agentData[0]["email"];
        $agent_private_email        = $agentData[0]["email_personal"];
        $agent_phone                = $agentData[0]["phone"];
        $agent_mobile_phone         = $agentData[0]["mobile_phone"];
        $agent_fax                  = $agentData[0]["fax"];
        $agent_skype                = $agentData[0]["skype"];
        $agent_address              = $agentData[0]["address"];
        $agent_pIva                 = $agentData[0]["p_iva"];
        $agent_CF                   = $agentData[0]["fiscal_code"];
        $agent_REA                  = $agentData[0]["rea"];
        $agent_id_status            = $agentData[0]["id_status"];
    }


}

$optMng = new OptionsManager();
/* ----- OPTIONS AGENZIA ----*/

// CREO OPTIONS COUNTRY
$optCountries		= $optMng->makeOptions("geo_country",$id_country,null);
// CREO OPTIONS REGIONS
$optRegions			= $optMng->makeOptions("geo_region",$id_region,$id_country);
// CREO OPTIONS CITY
$optCities			= $optMng->makeOptions("geo_city",$id_city,$id_region);
// CREO OPTIONS TOWN
$optTowns			= $optMng->makeOptions("geo_town",$id_town,$id_city);
// CREO OPTIONS DISTRICT
$optDistricts		= $optMng->makeOptions("geo_district",$id_district,$id_town);


// CREO OPTIONS STATUS
$optStatus		    = $optMng->makeOptions("ag_status",$id_status,null);
// CREO OPTIONS SUB STATUS
$optSubStatus		= $optMng->makeOptions("ag_sub_status",$id_sub_status,null);
// CREO OPTIONS PORTAL STATUS
$optPortalStatus	= $optMng->makeOptions("ag_portal_status",$id_portal_status,null);


/* ----- OPTIONS AGENTE ----*/
$optAgentStatus =  $optMng->makeOptions("operator_status",$agent_id_status,null);

?>



<form name="FORM_AGENCY" id="FORM_AGENCY" novalidate accept-charset="UTF-8">



    <div class="row">
    <div class="col-md-12">

        <!-- NAV TABS START -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="false">
                        Descrizione
                    </a>
                </li>
                <li>
                    <a href="#tab_agent" data-toggle="tab" aria-expanded="true">
                        Agente
                    </a>
                </li>

                <li  style="float:right;">
                    <button type="submit" class="btn btn-primary" id="btn_submit">Salva</button>
                </li>
            </ul>
            <div class="tab-content">

                <!-- #################### INIZIO TAB DESCRIZIONE ######################## -->
                <div class="tab-pane active" id="tab_details">
                    <?php
                    require("subcontents/agency_add_description.inc.php")
                    ?>
                </div><!-- ################ FINE TAB DESCRIZIONE  ###################-->


                <!-- #################INIZIO TAB AGENTE ##################### -->
                <div class="tab-pane" id="tab_agent">
                    <?php
                    require("subcontents/agency_add_agent.inc.php")
                    ?>
                </div><!-- ############# FINE TAB AGENTE ################# -->

            </div><!-- FINE TAB CONTENT -->

        </div> <!-- FINE NAV TABS -->

    </div><!-- /.col-md-12 -->


    </div><!-- /.row-->
    <?php


    ?>
</div>
</form>