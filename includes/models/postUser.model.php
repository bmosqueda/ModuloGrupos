<?php

require('post.model.php');

class PostUser extends Post 
{
	public $id;
	public $accountNumber;
	public $name;
	public $lastName;
	public $secondLastName;
	public $email;
	public $idCampus;

	//Recordar que cada que se crea un usuario se debe crear un registro del rol que tomará
	public function insert($idRol)
	{
		$sql = "insert into users (accountNumber, name, lastName, secondLastName, email, idCampus)".
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
			$statement->bind_param('sssssi', $this->accountNumber, $this->name, $this->lastName,
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

		self::insertRolUser($lastId, $idRol);

		return $lastId;
	}

	public function update()
	{
		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "update users set accountNumber = ?, name = ?, lastName = ?, secondLastName = ?, email = ?, idCampus = ? where id = ?";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
						// Bind parameters
			$statement->bind_param('sssssii', $this->accountNumber, $this->name, $this->lastName,
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

	public static function insertRolUser($idUser, $idRol)
	{
		$sql = "insert into rolsusers (idUser, idRol)values (?, ?)";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();

		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('ii', $idUser, $idRol);
			
			// Execute statement
			$statement->execute();

			// Get affected rows
			$affected_rows = $database->affected_rows;

			// Close statement
			$statement->close();
		}
		
		// Close database connection
		$database->close();

		return $affected_rows;
	}

	public static function deleteUserRol($idUser, $idRol)
	{
		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "delete from rolsusers where idUser = ? and idRol = ?";
		
		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('ii', $idUser, $idRol);
			
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

	public static function getUsersByRol($idRol)
	{
		$sql = "select * from users left join rolsusers on rolsusers.idUser =  users.id WHERE rolsusers.idRol = ".$idRol;
		return self::getBySql($sql);
	}

	public static function getRolsUser($idUser)
	{
		$sql = "select * from rolsusers where idUser=".$idUser;

		return self::getBySql($sql);
	}

	//Return all the users where the sended name, it can be complete name, only the last name, the first name, etc.
	public static function getByName($tableName, $completeName)
	{
		$sql = "select * from ".$tableName." where name & ' ' & lastName & ' ' & secondLastName like '%".$name."%'";

		return self::getBySql($sql);
	}
}