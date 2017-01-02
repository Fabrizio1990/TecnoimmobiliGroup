<?php
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
class DbManager 
{
    // PARAMETRI DI CONNESSIONE
    private $hostName  = "";
    private $dbName = "";
    private $user = "";
    private $password	= "";

    public $conn = null;



	public $tableName ="" ; // verrà valorizzato per poi utilizzare una qualsiasi funzionalità di questa classe. come il count

	public function openConnection()// APERTURA DELLA CONNESSIONE
    {
        try {
            $this->conn =  new PDO("mysql:dbname=" . $this->dbName . ";host=" . $this->hostName,
                                        $this->user,
                                        $this->password);

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $this->conn;
    }


	function closeConnection(){//CHIUSURA DELLA CONNESSIONE
        $this->conn = null;
	}

    //METODO PER INTERROGAZIONE DB STANDARD, PASSI UNA QUERY E LUI RESTITUISCE IL RESULTSET
	public function executeQuery($query){
        $this->openConnection();
        $res =$this->conn->query($query);
        if(!$res){
            // CONTROLLO SE CI SONO ERRORI
            $errorInfo = $this->conn->errorInfo();
            if($errorInfo[0] != 0){
                Flog::logError($errorInfo[2],"DBManager.php");
            }
        }
        $this->closeConnection();
        return $res;
    }

    // METODO PER ESECUZIONE QUERY DI INSERIMENTO / UPDATE /DELETE (per ora è uguale all' altro)
    public function executeNonQuery($query){
        $this->openConnection();
        //echo($query);
        $res = $this->conn->query($query);
        if(!$res){
            // CONTROLLO SE CI SONO ERRORI
            $errorInfo = $this->conn->errorInfo();
            if($errorInfo[0] != 0){
                Flog::logError($errorInfo[2],"DBManager.php");
            }
        }
        $this->closeConnection();
        return $res;
    }


    // ##################################################################################
    // ########   CREATE FUNCTION , USED TO INSERT DATA FROM DB "INSERT INTO"  ##########
    // ##################################################################################

    // $table = nome tabella
    // $fields = array di valori contenente i campi da popolare
    // $values = array di valori contenente i valori dei campi mandati in $fields
    // NB: la lunghezza di $fields e $values deve essere coerente (uguale)

    protected function create($table,$fields,$values){
        $this->openConnection();
        $values_plh="";
        //foreach field must be created the relative placeholder "?"
        for($i=0,$len =Count($fields); $i<$len; $i++){
            $values_plh .="?,";
        }
        $values_plh = rtrim($values_plh,",");

        $fields         = $this->getFields($fields);

        $query = "INSERT INTO $table ($fields) VALUES($values_plh) ";
        echo($query);
        $sth = $this->conn->prepare($query);

        $ret = $sth->execute($values);
        //$sth->debugDumpParams();

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            $ret = false;
        }

        $this->closeConnection();

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
    protected function read($table,$params = null,$extra_params = null,$values =null ,$fields = null){
        $ret = false;
        $this->openConnection();
        $fields         = $this->getFields($fields);// convert $fields array to useful string
        $params         = $this->getParams($params);// convert $params array to useful string
        $extra_params   = $this->getExtraParams($extra_params);// convert $extra_params array to useful string

        $query = "SELECT $fields from $table $params $extra_params";
        /*if(DEBUG_MODE)*/
            //echo("<br>".$query."<br>");

        $sth = $this->conn->prepare($query);

        $sth->execute($values);
        //$sth->debugDumpParams();

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $ret = $sth->fetchAll();

        $this->closeConnection();
        return $ret;
    }

    protected function update($table,$fields = null,$params = null,$values = null,$extra_params = null){
        $ret = false;
        $this->openConnection();


        $fields         = $this->getFields($fields);
        $params         = $this->getParams($params);
        $extra_params   = $this->getExtraParams($extra_params);

        $query = "UPDATE $table SET $fields $params $extra_params";

        $sth = $this->conn->prepare($query);
        $sth->execute($values);
        //$sth->debugDumpParams();

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $count = $sth->rowCount();
        $this->closeConnection();

        return $count;
    }

    protected function delete($table,$params = null,$values = null,$extra_params = null){
        $ret = false;
        $this->openConnection();

        $params         = $this->getParams($params);
        $extra_params   = $this->getExtraParams($extra_params);

        $query = "DELETE FROM $table $params $extra_params";

        $sth = $this->conn->prepare($query);
        $ret = $sth->execute($values);
        //$sth->debugDumpParams();

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $ret = $sth->rowCount();
        $this->closeConnection();

        return $ret;
    }

    protected function executeSp($spName,$params,$values){
        $ret = false;
        $this->openConnection();
        $params         = $this->getParams($params);// convert $params array to useful string

        $query = "CALL $spName($params)";
        /*if(DEBUG_MODE)*/
        //echo("<br>".$query."<br>");

        $sth = $this->conn->prepare($query);

        $ret = $sth->execute($values);
        //$sth->debugDumpParams();

        // CONTROLLO SE CI SONO ERRORI
        $errorInfo = $sth->errorInfo();
        if($errorInfo[0] != 0){
            Flog::logError($errorInfo[2],"DBManager.php");
            return $ret;
        }

        $this->closeConnection();
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

	
}