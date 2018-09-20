<?php 
// CLASSE PER LA GESTIONE DEI PORTALI
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");
require_once(BASE_PATH."/app/classes/DefValues.php");

class PropertiesOnPortal extends DbManager implements IDbManager {

    const defTable  = "prt_portal_properties";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array(); // TODO METTI I CAMPI DI DEFAULT

        $fields = $fields == null ? $def_fields : $fields;
        $ret = parent::create($this->currTable,$fields,$values,$printQuery);
        return $ret;
    }

    public function read($params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){

        $ret = parent::read($this->currTable,$params,$extra_params,$values ,$fields,$printQuery);
        return $ret;
    }


    public function update($fields,$params,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::update($this->currTable,$fields,$params,$values,$extra_params,$printQuery);
        return $ret;
    }

    public function delete($params = null,$values = null,$extra_params = null,$printQuery = false)
    {
        $ret = parent::delete($this->currTable,$params,$values,$extra_params,$printQuery);
        return $ret;
    }


    public function getAgencyLimit($id_agency,$id_portal){
        $this->setTable("prt_portal_agencies_info");
        $ret = $this->read(array("id_portal = ?","id_agency = ?"),null,array($id_portal,$id_agency),null,false);
        return $ret[0]["max_properties_on"];
        $this->setDefTable();
    }


    public function getAgencyPropertiesList($id_agency,$id_portal){
        $this->setTable("portals_properties_view");//View
        $ret = $this->read(array("id_portal = ?","id_agency =?"),"order by date_up desc",array($id_portal,$id_agency),null,false);
        $this->setDefTable();
        return $ret;
    }

    //recupera la lista di immobili più recenti dell' agenzia, esclusi quelli già sul portale (se il flag basdOnMostRecent è flaggato allora recupererà solo quelli con data successiva al più recente presente sul portale, altrimenti non tiene conto della data.
    public function getAgencyPortalNewestProperties($id_agency,$id_portal, $basedOnMostRecent = true){

        $ret = $this->executeSp("prt_get_recents_properties",array("?","?","?"),array($id_agency,$id_portal,$basedOnMostRecent),false);

        return $ret;
    }

    public function getOldestPropertiesList($id_agency,$id_portal,$num){
        $this->setTable("portals_properties_view");//View
        $ret = $this->read(array("id_portal = ?","id_agency =?"),"order by date_up asc limit $num",array($id_portal,$id_agency),null,false);
        $this->setDefTable();
        return $ret;
    }

    //Rimuove gli ultimi $removeCount immobili sul portale relativi a una data agenzia
    public function disableOldestPortalProperties($id_agency,$id_portal,$removeCount){
        //recupero la lista degli immobili da disabilitare per quel portale
        $oldestList = $this->getOldestPropertiesList($id_agency,$id_portal,$removeCount);

        $this->setTable("prt_portal_properties");
        foreach ($oldestList as $record){
            $this->switchPropertyOnPortalStatus($id_portal,$record["id_property"]);
        }

        $this->setDefTable();
    }


    public function addPropertyOnPortal($id_portal,$id_property){
        $this->setTable("prt_portal_properties");
        echo("AGGIUNGO SUL PORTALE CON ID ".$id_portal." l' immobile con id ".$id_property."<br>");
        $fields = array("id_portal","id_property");
        $params = array("id_portal = ?","id_property = ?");
        $values = array($id_portal,$id_property);
        $exist = $this->read($params,null,$values);
        if(count($exist)> 0){
            //echo("ESISTE GIà");
            return 0;
        }else {
            //echo("LO INSERISCO ");
            $ret = $this->create($values, $fields);
            $this->setDefTable();
            return $ret;
        }
    }


    public function removePropertyOnPortal($id_portal,$id_property){
        $this->setTable("prt_portal_properties");
        echo("RIMUOVO DAL PORTALE CON ID ".$id_portal." l' immobile con id ".$id_property."<br>");
        $params = array("id_portal = ?","id_property = ?");
        $values = array($id_portal,$id_property);

        $ret = $this->delete($params,$values);
        $this->setDefTable();
        return $ret;
    }

    //CONTROLLA SE CI SONO  IMMOBILI PIU RECENTI DI QUELLI SUL PORTALE (per la data agenzia), SE SI LI SOSTITUISCE AI PIU VECCHI NEL PORTALE
    public function checkAndReplaceOldProperties($id_agency,$id_portal){

        $newestProperties = $this->getAgencyPortalNewestProperties($id_agency,$id_portal,true);
        $newestPropertiesCnt = count($newestProperties);
        echo("NEWEST PROPERTIES COUNT ".$newestPropertiesCnt);
        if($newestPropertiesCnt > 0){
            echo("CI SONO NUOVI IMMOBILI<br>");
            $oldestProperties = $this->getOldestPropertiesList($id_agency,$id_portal,$newestPropertiesCnt);
            for($i =  0; $i< $newestPropertiesCnt ; $i++){
                $this->removePropertyOnPortal($id_portal,$oldestProperties[$i-1]["id_property"]);
                $this->addPropertyOnPortal($id_portal,$newestProperties[$i]["id"]);
            }
        }
    }

  

    //USATO DALLA PAGINA DI ASSEGNAZIONE IMMOBILI SUL PORTALE (NELLA CHIAMATA AJAX)
    public function switchPropertyOnPortalStatus($id_portal,$id_property){
        $this->setTable("prt_portal_properties");
        $ret = 0 ;

        $fields = array("id_portal","id_property");
        $params = array("id_portal = ?","id_property = ?");
        $values = array($id_portal,$id_property);

        $cntRet = $this->read($params,null,$values,"Count(id) as cnt");

        if($cntRet[0][0] == "0"){
            $this->addPropertyOnPortal($id_portal,$id_property);
            $ret = 1;

        }else{
            $this->removePropertyOnPortal($id_portal,$id_property);
            $ret = 0;
        }
        $this->setDefTable();
        //RETURN THE NEW STATUS
        return $ret;
    }






    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }




}


