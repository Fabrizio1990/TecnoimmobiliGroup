<?php
echo("INIZIO<br>");
require_once ("../../config.php");
include(BASE_PATH . "/app/classes/Portals&Feed/PropertiesOnPortal.php");
include(BASE_PATH . "/app/classes/Portals&Feed/PortalManager.php");
require_once(BASE_PATH . "/app/classes/AgencyManager.php");


$pMng = new PortalManager();
$agMng = new AgencyManager($pMng->conn);
$popMng = new PropertiesOnPortal($pMng->conn);



$portalFilterId = isset($_GET["portal_id"])?$_GET["portal_id"]:null;

//Recupero la lista dei portali e ciclo
$portalList = $pMng->getPortalList($portalFilterId);

foreach ($portalList as $portal){
    echo("<br><br>----------------------<br>##### CICLO PORTALE". $portal['portal_name']."<br>");
    // se il portale è disabilitato salto questo portale (non devo fare nessuna operazione per i portali disabilitati)
    if($portal["portal_enabled"] == "0"){
        echo("PORTALE ".$portal["portal_name"]." DISABILITATO <br>");
        continue;
    }

    $portalID = $portal["id_portal"];
    $limits = $portal["entries_max"];
    echo("IL LIMITE è SETTATO A ".$limits."<br>");

    //Ciclo la lista delle agenzie
    $agList = $agMng->getAgenciesData();
    foreach ($agList as $agency){
        
        $agencyID = $agency["id"];
        $agencyName =  $agency["name"];
        echo("<br><br>-----> CICLO AGENZIA $agencyName <-----<br>");
        /*if($agencyID != "1")
            continue;*/
        $agLimit = $popMng->getAgencyLimit($agencyID,$portalID);
        echo("Agency id = ".$agencyID." Limits = ".$agLimit."<br>");
        //SE LIMITE è SETTATO A -1 vuol dire che devo mettere tutti gli immobili disponibili
        if($agLimit == -1 ){
            $agProperties = $agMng->getAgencyProperties($agencyID,1);
            $agLimit = count($agProperties);
        }

        // GET AGENCY PROPERTIES ON PORTAL LIST
        $agPropList = $popMng->getAgencyPropertiesList($agencyID,$portalID);
        $agPropCount = count($agPropList);


        /*####################
        NB QUESTA PARTE (CICLO FOR) NON DOVREBBE VENIR CHIAMATA PERCHè SE SETTO UN IMMOBILE A SHOW_ON_PORTAL = FALSE DEVO DISATTIVARLO DAI PORTALI IMMEDIATAMENTE MA LA METTO PER SICUREZZA
        ##########################
        */
        // Controllo se ci sono immobili con il campo show_on_portal settato a zero o disabilitati ma che sono sul portale, in tal caso comincio rimuovendo quelli
        for($i = 0 ; $i < $agPropCount ; $i++){
            $show_on_portal = $agPropList[$i]["show_on_portal"];
            $propertyStatus = $agPropList[$i]["id_ads_status"];
            if(!$show_on_portal || $propertyStatus !=1){
                $popMng->removePropertyOnPortal($portalID,$agPropList[$i]["id_property"]);
            }
        }

        //$agPropList e $agPropCount vanno ricalcolati dopo che ho rimosso quelli disabilitati sul portale.
        $agPropList = $popMng->getAgencyPropertiesList($agencyID,$portalID);
        $agPropCount = count($agPropList);

        echo("agPropCount =".$agPropCount." agLimit =".$agLimit."<br>" );
        //SE L'agenzia ha più immobili su questo portale di quanti dovrebbe averne rimuovo quelli in eccesso.
        if($agPropCount > $agLimit){
            $removeCount = $agPropCount - $agLimit;
            echo("removeCount = ".$removeCount."<br>");
            $popMng->disableOldestPortalProperties($agencyID,$portalID,$removeCount);
        }//SE L'agenzia ha Meno immobili su questo portale di quanti dovrebbe averne aggiungo gli immobili più recenti disponibili.
        elseif($agPropCount < $agLimit){
            echo("agPropCount < agLimit <br>");
            $neededCnt = $agLimit - $agPropCount;
            $newestProperties = $popMng->getAgencyPortalNewestProperties($agencyID,$portalID,false);
            $newestPropertiesCnt = count($newestProperties);
            echo("newestPropertiesCnt = $newestPropertiesCnt <br>");
            //se ci sono nuovi annunci li aggiungo
            if($newestPropertiesCnt > 0 ){
                echo("$newestPropertiesCnt > 0 <br>");
                $neededCnt = $neededCnt > $newestPropertiesCnt ?$newestPropertiesCnt : $neededCnt;
                //echo("neededCnt = $neededCnt<br>");
                for($i = 0 ; $i<$neededCnt;$i++){
                    $res = $popMng->addPropertyOnPortal($portalID,$newestProperties[$i]["id"]);
                }
            }
        }

        //ALLA FINE CONTROLLO SE CI SONO IMMOBILI PIU' NUOVI DI QUELLI CHE SONO PRESENTI SUL PORTALE , SE SI ALLORA LI AGGIUNGO AL PORTALE E NE RIMUOVO UNO VECCHIO
        //RECUPERO NUOVAMENTE LA LISTA DEI NUOVI IMMOBILI CHE PROBABILMENTE é STATA MODIFICATA PRECEDENTEMENTE
        if($agLimit > 0)
            $popMng->checkAndReplaceOldProperties($agencyID,$portalID,$agLimit);

    };

    //TODO , FORSE SERVE UN CONTROLLO CHE VERIFICA SE LA SOMMA DEGLI IMMOBILI PERMESSI PER AGENZIA NON SUPERA QUELLO DEGL IMMOBILI TOTALI PERMESSI SUL PORTALE, SE LO SUPERA DEVO RICALCOLARE GLI IMMOBILI PERMESSI PER AGENZIA

    //GENERA TUTTI I FEED
    include("portals_feeds_generator.php");
}

