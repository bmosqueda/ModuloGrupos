<?php 
class PostStudent extends Post
{
	public $id;
	public $accountNumber;
	public $name;
	public $lastName;
	public $secondLastName;
	public $email;
	public $typeStudent;

	public function insert()
	{
		$sql = "insert into students (accountNumber, name, lastName, secondLastName, email, typeStudent)".
		"values (?, ?, ?, ?, ?, ?)";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		//It´ll save if insert the element
		$lastId = 0;		

		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('sssssi', $this->accountNumber, $this->name, $this->lastName,
		$this->secondLastName, $this->email, $this->typeStudent);
			
			// Execute statement
			$statement->execute();
			
			//Save de id of the inserted element
			$lastId = $database->insert_id;

			// Close statement
			$statement->close();
		}
		
		// Close database connection
		$database->close();

		return $lastId;
	}

	public function update()
	{
		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "update students set accountNumber = ?, name = ?, lastName = ?, secondLastName = ?, email = ?, typeStudent = ? where id = ?";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
						// Bind parameters
			$statement->bind_param('sssssii', $this->accountNumber, $this->name, $this->lastName,
		$this->secondLastName, $this->email, $this->typeStudent, $this->id);

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

	public static function insertGroupStudent($idStudent, $idGroup)
	{
		$sql = "insert into studetsgroups (idStudent, idGroup)values (?, ?)";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();

		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('ii', $idStudent, $idGroup);
			
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

	public static function deleteGroupStudent($idStudent, $idGroup)
	{
		// Initialize affected rows
		$affected_rows = FALSE;
	
		// Build database query
		$sql = "delete from studetsgroups where idStudent = ? and idGroup = ?";
		
		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
			// Bind parameters
			$statement->bind_param('ii', $idStudent, $idGroup);
			
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

	public static function getStudentsByGroup($idGroup)
	{
		$sql = "select students.id, students.accountNumber, students.name, students.lastName, students.secondLastName, 
				students.email, students.typeStudent from students left join studentsgroup 
				on studentsgroup.idStudent =  students.id WHERE studentsgroup.idGroup = ".$idGroup;
		return self::getBySql($sql);
	}

	public static function getGroupsStudent($idStudent)
	{
		$sql = "select * from studentsgroup where idStudent=".$idStudent;

		return self::getBySql($sql);
	}
}
?>