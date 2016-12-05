<?php
require_once(BASE_PATH."/app/classes/LogHelper/Flog.php");
class DbManager 
{
    private $hostName  = "";
    private $dbName = "";
    private $user = "";
    private $password	= "";

    public $conn = null;



	public $tableName ="" ; // verrà valorizzato per poi utilizzare una qualsiasi funzionalità di questa classe. come il count

	public function openConnection()
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


	function closeConnection(){
        $this->conn = null;
	}


	public function executeQuery($query){
        $this->openConnection();
        $res =$this->conn->query($query);
        $this->closeConnection();
    }

    public function executeNonQuery($query){
        $this->openConnection();
        $res =$this->conn->query($query);
        $this->closeConnection();
    }

    protected function create($table,$fields,$values){
        $this->openConnection();
        $query = "INSERT INTO $table ($fields) VALUES(?,?) ";

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

    protected function read($table,$params = null,$extra_params = null,$values =null ,$fields = null){
        $ret = false;
        $this->openConnection();
        $fields         = $this->getFields($fields);
        $params         = $this->getParams($params);
        $extra_params   = $this->getExtraParams($extra_params);

        $query = "SELECT $fields from $table $params $extra_params";
        /*if(DEBUG_MODE)
            echo("<br>"$query."<br>");*/

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


    $fields             = $this->getFields($fields);
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

        if($fields != null){
            return implode(",", $fields);
        }
        return "*";
    }

    /* FUNZIONE DI APPOGGIO PER LA CREAZIONE DELLE QUERY*/
    protected function getParams($params= null){
        $ret = "";
        if($params!= null)
            $ret =  " WHERE ". implode(" and ", $params);
        return $ret;
    }

    /* FUNZIONE DI APPOGGIO PER LA CREAZIONE DELLE QUERY*/
    protected function getExtraParams($extra_params = null){
        if($extra_params!= null){
            return $extra_params = implode(" ", $extra_params);
        }
        return "";
    }

	
}