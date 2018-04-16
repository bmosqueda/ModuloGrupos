<?php
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');

$request = $_SERVER['REQUEST_METHOD'];

if($request == 'GET')
{
	$param = isset($_GET['id']) ? $_GET['id'] : false;
    if ($param) 
    {
    	$user = PostUser::getById($param, "users")[0];
    	echo $user->id."\n";
    	echo $user->accountNumber."\n";
    	echo $user->names."\n";
    	echo $user->lastName."\n";
    	echo $user->secondLastName."\n";
    	echo $user->idCampus."\n";
        echo json_encode($user);
    } 
    else 
    {
        echo json_encode(PostUser::getAll("users"));
    }
}
?>