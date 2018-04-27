<?php 
class PostGroup extends Post
{
	public $id;
	public $grade;
	public $groups;
	public $generation;
	public $periods;
	public $idCarrerArea;
	public $isOfficial;

	public function insert()
	{
		$sql = "insert into groups (grade, groups, generation, periods, idCarrerArea, isOfficial)"." values (?, ?, ?, ?, ?, ?)";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		//It´ll save if the inserted element
		$lastId = 0;	
		// Prepare query
		if ($statement->prepare($sql)) {
			// Bind parameters
			$statement->bind_param('sssiii', $this->grade, $this->groups, $this->generation,
		$this->periods, $this->idCarrerArea, $this->isOfficial);
			
			// Execute statement
			$statement->execute();
			
			//Save de id of the inserted element
			$lastId = $database->insert_id;

			// Close statement
			$statement->close();
		}
		else
		{
			echo htmlspecialchars($database->error);
			echo htmlspecialchars($statement->error);
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
		$sql = "update groups set grade = ?, groups = ?, generation = ?, periods = ?, idCarrerArea = ?, isOfficial = ? where id = ?";

		// Open database connection
		$database = new Database();
		
		// Get instance of statement
		$statement = $database->stmt_init();
		
		// Prepare query
		if ($statement->prepare($sql)) {
			
						// Bind parameters
			$statement->bind_param('sssiiii', $this->grade, $this->groups, $this->generation,
		$this->periods, $this->idCarrerArea, $this->isOfficial, $this->id);

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
}
?>