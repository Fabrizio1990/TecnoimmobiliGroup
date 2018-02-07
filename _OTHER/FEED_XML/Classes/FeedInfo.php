<?php

class FeedInfo extends DbManager implements IDbManager {

    const defTable  = "prt_feeds";
    private $currTable;

    public function __construct() {
        parent::__construct();
        $this->currTable = self::defTable;
    }
    // IMPLEMENTO I METODI DELL INTERFACCIA

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



    public function getPortalIdFromFeed($feedName){
        $ret = "";
        $this->currTable = "prt_feeds";
        $res = $this->read("feed_name = ?",null,array($feedName));
        $this->setDefTable();
        if(Count($res)>0)
            $ret =$res[0]["id_portal"];
        return $ret;
    }

    public function getFeedData($feedName){
        $this->currTable = "portal_feeds_view";
        $ret = $this->read("feed_name = ?",null,array($feedName));
        $this->setDefTable();
        return $ret;
    }

    public function getFeedExtension(){
        $ret = "";
        $query = "SELECT t2.name,t2.extension FROM new_tecnoimmobili.prt_feeds as t1 left join prt_feed_types as t2 on t1.feed_type = t2.id ;";
        $res = $this->executeQuery($query);

        if(Count($res) > 0){
            $ret = $res[0]["extension"];
        }
        return $ret;

    }

    public function  getFeedProperties($feedName){
        $feedData = $this->getFeedData($feedName);
    }


    public function setDefTable(){
        $this->currTable = self::defTable;
    }

    public function setTable($tbName){
        $this->currTable = $tbName;
    }
}