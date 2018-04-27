<?php  
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');
 
$request = $_SERVER['REQUEST_METHOD'];

if($request == 'GET')
{
	if(!isset($_GET['idGroup']))
    {
        if(isset($_GET['id']))
        {
            if(!isset($_GET['groupsStudents']))
            {
                $student = PostStudent::getById($_GET['id'], "students");
                PostStudent::toUTF8($student);

                echo json_encode($student);
            }            
            else
            {
                $groupsStudents = PostStudent::getGroupsStudents($param);
                PostStudent::toUTF8($groupsStudents);

                echo json_encode($groupsStudents);    
            }
        }
        else if(!isset($_GET['byName']))
        {
            $students = PostStudent::getAll("students");
            PostStudent::toUTF8($students);

            echo json_encode($students);
        }
        else
        {
            //Acepta espacios o _ para separar nombre de apellidos, etc
            $studentsByName = PostStudent::getByName("students", $_GET['byName']);
            PostStudent::toUTF8($studentsByName);

            echo json_encode($studentsByName); 
        }
    }
    else
    {
        $studentsByGroup = PostStudent::getStudentsByGroup($_GET['idGroup']);
        PostStudent::toUTF8($studentsByGroup);

        echo json_encode($studentsByGroup);
    }
}
else if($request == "POST")
{
	$input = json_decode(file_get_contents('php://input'), false);
    if (isset($input->accountNumber) && isset($input->typeStudent) && isset($input->name) && isset($input->lastName) && isset($input->email))
    {
    	$post = new PostStudent();
        $post->accountNumber = $input->accountNumber;
        $post->name = $input->name;
        $post->lastName = $input->lastName;
        $post->secondLastName = isset($input->secondLastName) ? $input->secondLastName : "" ;
        $post->email = $input->email;
        $post->typeStudent = $input->typeStudent;

        $result = $post->insert();
        if($result)
        {
        	$post->id = $result;
        	echo json_encode($post);
        }
        else
        	http_response_code(500);
    } 
}
else if($request == "PUT")
{
    $param = isset($_GET['id']) ? $_GET['id'] : false;
    $input = json_decode(file_get_contents('php://input'), false);
    if ($param && isset($input->accountNumber) && isset($input->name) && isset($input->lastName) && isset($input->email) && isset($input->typeStudent))
    {
    	$post = new PostStudent();
        $post->id = $_GET['id'];
        $post->accountNumber = $input->accountNumber;
        $post->name = $input->name;
        $post->lastName = $input->lastName;
        $post->secondLastName = isset($input->secondLastName) ? $input->secondLastName : "" ;
        $post->email = $input->email;
        $post->typeStudent = $input->typeStudent;

        $result = $post->update();
        if ($result) 
        {
            //return as JSON the values of the updatep element
            echo json_encode($post);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
}
elseif ($request == "DELETE") 
{
	$param = isset($_GET['id']) ? $_GET['id'] : false; 
    if($param) 
    {
        $post = new PostStudent();

        $result = $post->delete($_GET['id'], "students");
        if ($result) 
            echo $result;
        else 
            http_response_code(500);
    } 
    else 
        http_response_code(400);
}

?>