<?php
date_default_timezone_set('Europe/Rome');
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
require_once(BASE_PATH."/app/classes/MyCrypter/MyCrypter.php");

class DbManager 
{
    // PARAMETRI DI CONNESSIONE
    private $hostName;
    private $dbName;
    private $user;
    private $password;

    public $conn = null;
    public $lastInsertId;

    public $tableName ="" ; // verrà valorizzato per poi utilizzare una qualsiasi funzionalità di questa classe. come il count

    function __construct($conn = null,$configFilePath = null) {
        if($configFilePath == null)
            $configFilePath = BASE_PATH."/app/classes/Configs/dbConfig.ini";

        $config = parse_ini_file($configFilePath);
        $this->hostName = MyCrypter::myDecrypt($config['hostname']);
        $this->dbName = MyCrypter::myDecrypt($config['dbName']);
        $this->user = MyCrypter::myDecrypt($config['username']);
        $this->password = MyCrypter::myDecrypt($config['password']);
        if($conn == null)
            $this->openConnection();
        else
            $this->conn = $conn;
    }

    public function setDatabase($dbName){
        $this->dbName = $dbName;
        $query = "USE ".$dbName;
        $this->conn->query($query);
    }


	public function openConnection()// APERTURA DELLA CONNESSIONE
    {
        if($this->conn !=null)
            return;

        try {
            $this->conn =  new PDO("mysql:dbname=" . $this->dbName . ";host=" . $this->hostName,$this->user,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $this->conn;
    }


	function closeConnection(){//CHIUSURA DELLA CONNESSIONE
        $this->conn = null;
	}


	public function beginTransaction(){
	    $this->conn->beginTransaction();
    }

    public function commit(){
        $this->conn->commit();
    }

    public function rollback(){
        $this->conn->rollback();
    }


    //METODO PER INTERROGAZIONE DB STANDARD, PASSI UNA QUERY E LUI RESTITUISCE IL RESULTSET
	public function executeQuery($query,$printQuery = false){
        if($printQuery)
            echo($query);
        //$this->openConnection();
        $res =$this->conn->query($query);
        if(!$res){
            // CONTROLLO SE CI SONO ERRORI
            $errorInfo = $this->conn->errorInfo();
            if($errorInfo[0] != 0){
                Flog::logError($errorInfo[2],"DBManager.php");
            }
        }

        $ret = $res->fetchAll();
        //$this->closeConnection();
        return $ret;
    }

    // METODO PER ESECUZIONE QUERY DI INSERIMENTO / UPDATE /DELETE (per ora è uguale all' altro)
    public function executeNonQuery($query,$printQuery = false){
        //$this->openConnection();
        if($printQuery)
            echo($query);
        $res = $this->conn->query($query);
        if(!$res){
            // CONTROLLO SE CI SONO ERRORI
            $errorInfo = $this->conn->errorInfo();
            if($errorInfo[0] != 0){
                Flog::logError($errorInfo[2],"DBManager.php");
            }
        }
        $ret = $res->fetchAll();
        //$this->closeConnection();
        return $ret;
    }


    // ##################################################################################
    // ########   CREATE FUNCTION , USED TO INSERT DATA FROM DB "INSERT INTO"  ##########
    // ##################################################################################

    // $table = nome tabella
    // $fields = array di valori contenente i campi da popolare
    // $values = array di valori contenente i valori dei campi mandati in $fields
    // NB: la lunghezza di $fields e $values deve essere coerente (uguale)

    protected function create($table,$fields,$values,$printQuery = false){
        //$this->openConnection();
        $values_plh="";
        //foreach field must be created the relative placeholder "?"
        for($i=0,$len =Count($fields); $i<$len; $i++){
            $values_plh .="?,";
        }
        $values_plh = rtrim($values_plh,",");

        $fields         = $this->getFields($fields);

        $query = "INSERT INTO $table ($fields) VALUES($values_plh) ";

            //echo($query);
        $sth = $this->conn->prepare($query);

        $ret = $sth->execute($values);
        if($printQuery){
            $this->debugQuery($query,$values);
            $sth->debugDumpParams();
            //Flog::logInfo($query,"QueryInfo.php");
        }

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            $ret = false;
        }
        $this->lastInsertId = $this->conn->lastInsertId();
        //$this->closeConnection();

        return $ret;
    }

    // ##################################################################################
    // ##############   READ FUNCTION , USED TO READ DATA FROM DB "SELECT"  #############
    // ##################################################################################
    // $table  = tableName
    // $params = array that must contain pieces of where condition , ex:array("id = ?","id_agency =?"), note that the values must be set as placeholder "?" and sent to $values variable
    // $extra_params = array that must contain pieces of special condition , ex: array("LIMIT 1",GROUP BY ID")
    // $values = array that must contain values of $params sended, ex: array(1,3)
    // $fields =  fields to read (if not specified , the default is all '*')
    // NOTE THAT THE ARRAY VALUES LENGHT MUST BE EQUAL OF THE SUM OF $params+$extra_params lenght
    protected function read($table,$params = null,$extra_params = null,$values =null ,$fields = null,$printQuery = false){
        $ret = false;
        //$this->openConnection();
        $fields         = $this->getFields($fields);// convert $fields array to useful string
        $params         = $this->getParams($params);// convert $params array to useful string
        $extra_params   = $this->getExtraParams($extra_params);// convert $extra_params array to useful string

        $query = "SELECT $fields from $table $params $extra_params";
        /*if(DEBUG_MODE)*/
            //("<br>".$query."<br>");

        $sth = $this->conn->prepare($query);

        $sth->execute($values);
        if($printQuery){
            $this->debugQuery($query,$values);
            $sth->debugDumpParams();
        }
        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $ret = $sth->fetchAll();

        //$this->closeConnection();
        return $ret;
    }

    protected function update($table,$fields = null,$params = null,$values = null,$extra_params = null,$printQuery = false){
        $ret = false;
        //$this->openConnection();


        $fields         = $this->getFields($fields);
        $params         = $this->getParams($params);
        $extra_params   = $this->getExtraParams($extra_params);

        $query = "UPDATE $table SET $fields $params $extra_params";
        $sth = $this->conn->prepare($query);
        $sth->execute($values);
        /*echo $query;
        var_dump($values);*/
        if($printQuery){
            $this->debugQuery($query,$values);
            $sth->debugDumpParams();
            //Flog::logInfo($query,"QueryInfo.php");
        }
        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $count = $sth->rowCount();
        //$this->closeConnection();

        return $count;
    }

    protected function delete($table,$params = null,$values = null,$extra_params = null,$printQuery = false){
        $ret = false;
        //$this->openConnection();

        $params         = $this->getParams($params);
        $extra_params   = $this->getExtraParams($extra_params);

        $query = "DELETE FROM $table $params $extra_params";

        $sth = $this->conn->prepare($query);
        $ret = $sth->execute($values);
        //$sth->debugDumpParams();
        if($printQuery){
            $this->debugQuery($query,$values);
            $sth->debugDumpParams();
            //Flog::logInfo($query,"QueryInfo.php");
        }
        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $ret = $sth->rowCount();
        //$this->closeConnection();

        return $ret;
    }

    protected function executeSp($spName,$params,$values,$printQuery = false){
        $ret = false;
        //$this->openConnection();


        $query = "CALL $spName(";
        foreach ($params as $param)
            $query.=$param.",";
        $query = rtrim($query,",");
        $query.= ");";

        $sth = $this->conn->prepare($query);

        $ret = $sth->execute($values);
        if($printQuery){
            $this->debugQuery($query,$values);
            //$sth->debugDumpParams();
        }
        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }
        $ret = $sth->fetchAll();
        //$this->closeConnection();
        return $ret;
    }


    function isRecordFound($resultSet){
        $ret = Count($resultSet)>0?true:false;
        return $ret;
    }

    function resultToEntity($res,$entity){
        foreach($res as $key => $value) {
            $entity->$key = $value;
        }
        return $entity;
    }

    public function escapeString($string){
        return $this->conn->quote($string);
    }



    /* FUNZIONE DI APPOGGIO PER LA CREAZIONE DELLE QUERY*/
	protected function getFields($fields = null){
        $ret = "*";
        if($fields != null){
            if(is_array($fields))   $ret =  implode(",", $fields);
            else                    $ret = $fields;
        }
        return $ret;
    }

    /* FUNZIONE DI APPOGGIO PER LA CREAZIONE DELLE QUERY*/
    protected function getParams($params= null){
        $ret = "";
        if($params!= null){
            if(is_array($params))   $ret =  " WHERE ". implode(" and ", $params);
            else                    $ret =  " WHERE ". $params;
        }
        return $ret;
    }

    /* FUNZIONE DI APPOGGIO PER LA CREAZIONE DELLE QUERY*/
    protected function getExtraParams($extra_params = null){
        $ret = "";
        if($extra_params!= null){
            if(is_array($extra_params)) $ret = implode(" ", $extra_params);
            else $ret = $extra_params;
        }
        return $ret;
    }

    protected function debugQuery($query,$values){

        $dividedQuery = explode("?",$query);
        $finalQuery = "";
        for($i = 0; $i < count($dividedQuery) -1;$i++){
            $finalQuery .=$dividedQuery[$i]."'".$values[$i]."' ";
        }
        echo("<br>");
        echo($finalQuery);
        echo("<br>");echo("<br>");

    }



    function __destruct() {
        $this->closeConnection();
    }

	
}