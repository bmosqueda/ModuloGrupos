<? php

class User
{
	public $id;
	public $accountNumber;
	public $names;
	public $lastName;
	public $secondLastName;
	public $role;
	public $email;
	public $campus;
	public $career;
	
	public $course;

	public function User($id, $accountNumber, $names, $lastName, 
		$role, $email, $campus, $career, $course = "", $secondLastName = "")
	{
		$this->$id = $id;
		$this->$accountNumber = $accountNumber;
		$this->$names = $names;
		$this->$lastName = $lastName;
		$this->$role = $role;
		$this->$email = $email;
		$this->$campus = $campus;
		$this->$career = $career;
		$this->$course = $course;
		$this->$secondLastName = $secondLastName;
	}
}