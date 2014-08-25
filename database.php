<?php

interface Database
{
	function connect($host, $user,$pass, $db);
	function disconnect();
	function query($table, $fields, $where);
	function update($table, $id, $fields);
	function insert($table, $fields);
	function delete($table, $id);
}

class MySqlDb implements Database
{	
	var $mysqli;
	
	public function __construct($host, $user, $pass, $db)
	{
		$this->connect($host, $user, $pass, $db);
	}
	
	public function __destruct()
	{
		$this->disconnect();
	}
	
	public function connect($host, $user, $pass, $db)
    { 
       $this->mysqli = new mysqli($host, $user, $pass, $db);
    }
	
	public function disconnect()
    { 
       mysqli_close($this->mysqli);
    }
	
	public function query($table, $fields, $where = null)
	{
		$data = array();
		$query = 'SELECT ' . join(",", $fields) . ' FROM ' . $table;
		if(!is_null($where))
			$query .= " WHERE " . $where;
		if ($result = $this->mysqli->query($query)) {
		  while ($row = $result->fetch_assoc())
		  {
			 array_push($data, $row);
		  }
		}
		return $data;
	}
	
	public function update($table, $id, $fields)
	{
		$keyvalues = "";
		foreach ( $fields as $key => $value ) {
			if($keyvalues != "")
				$keyvalues .= ",";
			$keyvalues .= sprintf( "%s=%s" , $key , "'".$value."'" );
		}
		$this->mysqli->query('UPDATE '.$table.' SET '.$keyvalues.' WHERE id='.$id);
		return $this->mysqli->affected_rows;
	}
	
	public function insert($table, $fields)
	{
		$keys = "";
		$values = "";
		foreach ( $fields as $key => $value ) {
			if($keys != "")
				$keys .= ",";
			if($values != "")
				$values .= ",";
			$keys .= $key;
			$values .= "'".$value."'";
		}
		$this->mysqli->query("INSERT INTO ".$table."(".$keys.") VALUES (".$values.")");
		return $this->mysqli->insert_id;
	}
	
	public function delete($table, $id)
	{
		$this->mysqli->query('DELETE FROM '.$table.' WHERE id='.$id);
		return $this->mysqli->affected_rows;
	}
}

?>