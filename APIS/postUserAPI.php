<?php
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');

$request = $_SERVER['REQUEST_METHOD'];

if($request == 'GET')
{
	$param = isset($_GET['id']) ? $_GET['id'] : false;
    if ($param) 
    {
    	$user = PostUser::getById($param, "users");
    	PostUser::toUTF8($user);

        echo json_encode($user);
    } 
    else 
    {
    	$users = PostUser::getAll("users");
    	PostUser::toUTF8($users);

        echo json_encode($users);
    }
}
else if($request == 'POST')
{
	$input = json_decode(file_get_contents('php://input'), false);
    if (isset($input->accountNumber) && isset($input->names) && isset($input->lastName) && isset($input->email) && isset($input->idCampus)) 
    {
        $post = new PostUser();
        $post->accountNumber = $input->accountNumber;
        $post->names = $input->names;
        $post->lastName = $input->lastName;
        $post->secondLastName = isset($input->secondLastName) ? $input->secondLastName : "" ;
        $post->email = $input->email;
        $post->idCampus = $input->idCampus;

	    $result = $post->insert();


        if ($result) 
        {
        	$post->id = $result;
            //return as JSON the values of the inserted element
			PostUser::toUTF8($post);
            echo json_encode($post);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
    else 
    {
        http_response_code(403);
    }
}
?>