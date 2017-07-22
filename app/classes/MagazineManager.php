<?php 
// CLASSE PER LA GESTIONE DB DELLE PROPERTIES (IMMOBILI)
require_once(BASE_PATH."/app/interfaces/IDbManager.php");
require_once(BASE_PATH."/app/classes/DbManager.php");

class MagazineManager extends DbManager implements IDbManager {

    const defTable  = "magazine";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }
	// IMPLEMENTO I METODI DELL INTERFACCIA

    public function create($values = null,$fields = null,$printQuery = false)
    {

        $def_fields = array("id_property","id_agency","order","enabled");

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

    public function addOnMangazine($id_property,$id_agency,$status){
        $fields = array("id_property","id_agency","enabled" );
        $values = array($id_property,$id_agency,$status);
        $ret = $this->create($values,$fields,false);
        $id = $this->lastInsertId;
        $this->setPropertyMagazineStatusAndOrder($id,1,1);
        return $ret;
    }


    public function getMagazineProperties($agency = null,$enabled = 1){
        $this->currTable = "magazine_view";
        if($enabled == 0 )
            $extra_params = "order by date_up desc";
        else
            $extra_params ="order by `order` desc";

        $params = array("enabled = ?");
        $values = array($enabled);
        if($agency!=null){
            array_push($params,"id_agency = ?");
            array_push($values,$agency);
        }
       $res =  $this->read($params,"order by `order` asc",$values,null,false);

        $this->setDefTable();
        return $res;
    }

    public function setPropertyMagazineStatusAndOrder($id,$status,$newOrder = 0,$printQuery = false){
        // pos è status si equivalgono in questo caso perchè
        // se abilito metto in primo piano (pos 1) e se disabilito metto a 0

        $query = "CALL UpdateMagazinePropertyPosition(".$id.",".$status.",".$newOrder.")";
        if($printQuery)
            echo $query;
        $res = parent::executeQuery($query);

        return $res[0]["ret"];
    }

    public function setPropertyMagazineOrder($id,$order){
        $res = $this->update("`order` = ?","id = ?",array($order,$id),null,false);
        return $res;
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }





}


