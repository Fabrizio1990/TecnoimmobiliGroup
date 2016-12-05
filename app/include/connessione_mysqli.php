 
 <?php

    require BASE_PATH.'/app/classes/DbManager.php';

	
    
    function openConn(){
      $dbM = new DbManager();
      $conn = $dbM->openConnection();
      return $conn;
    }
    
    function closeConn($cn){
      mysqli_close($cn);
      
    }
	
	
	
	function resultsetToArray($CONN,$QUERY,$ERR_HANDLER){
		$result = $CONN->query($QUERY) or die($ERR_HANDLER/*. " -> ".mysqli_error($CONN)*/);//mysqli_error($this->conn)
		$results = array();
		while($row = $result->fetch_assoc())
		{
			$results[] = $row;
		}
		mysqli_free_result($result);
		mysqli_next_result($CONN);
		return $results;
	}

    //echo("connected".$conn->host_info);
 ?>