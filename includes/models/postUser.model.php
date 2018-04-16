<?php

require('post.model.php');

class PostUser extends Post 
{
	public $id;
	public $accountNumber;
	public $names;
	public $lastName;
	public $secondLastName;
	public $email;
	public $idCampus;

	public function insert()
	{
		$sql = "insert into users (accountNumber, names, lastName, secondLastName, email, idCampus)".
		"values (?, ?, ?, ?, ?, ?)";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		//It´ll save if the inserted element
		$lastId = 0;		

		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('sssssi', $this->accountNumber, $this->names, $this->lastName,
		$this->secondLastName, $this->email, $this->idCampus);
			
			// Execute statement
			$statement->execute();
			
			//Save de id of the inserted element
			$lastId = $database->insert_id;

			// Close statement
			$statement->close();
		}
		
		// Close database connection
		$database->close();

		return self::getById($lastId);
	}

	public function update()
	{
		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "update users set accountNumber = ?, names = ?, lastName = ?, secondLastName = ?, email = ?, idCampus = ? where id = ?";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
						// Bind parameters
			$statement->bind_param('sssssii', $this->accountNumber, $this->names, $this->lastName,
		$this->secondLastName, $this->email, $this->idCampus, $this->id);

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

	//Return all the users where the sended names, it can be complete name, only the last name, the first name, etc.
	public static function getByName($tableName, $completeName)
	{
		$sql = "select * from ".$tableName." where names & ' ' & lastName & ' ' & secondLastName like '%".$names."%'";

		return self::getBySql($sql);
	}
}