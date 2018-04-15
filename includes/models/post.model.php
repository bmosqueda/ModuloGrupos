<?php

class Post 
{	
	public static function getBySql($sql) 
	{
		//Comment
		// Open database connection
		$database = new Database();
		
		// Execute database query
		$result = $database->query($sql);
		
		// Initialize object array
		$objects = array();
		
		// Fetch objects from database cursor
		while ($object = $result->fetch_object()) {
			$objects[] = $object;
		}
		
		// Close database connection
		$database->close();

		// Return objects
		return $objects;	
	}

	public static function getById($id, $tableName) 
	{	
		// Build database query
		$sql = "select * from ".$tableName." where id = ?";
		
		return self::getBySql($sql);
	}

	public function delete($id, $tableName) 
	{

		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "delete from ".$tableName." where id = ?";
		
		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('i', $id);
			
			// Execute statement
			$statement->execute();
			
			// Get affected rows
			$affected_rows = $database->affected_rows;
				
			// Close statement
			$statement->close();
		}
		
		// Close database connection
		$database->close();

		// Return affected rows
		return $affected_rows;			
	}	


	public static function getAll($tableName)
	{
		$sql = "select * from ".$tableName;
		return self::getBySql($sql);
	}
}