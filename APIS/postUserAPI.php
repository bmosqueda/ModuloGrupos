<?php
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');

$request = $_SERVER['REQUEST_METHOD'];

if($request == 'GET')
{
	$users = PostUser::getAll("users");
        foreach ($users as $user) {
        	echo $user->id;
        }
    // echo json_encode(PostUser::getAll("users"));
	/*echo "HOLAaa";
	$param = isset($_GET['id']) ? $_GET['id'] : false;
    if ($param) 
    {
    	echo "HOLA";
        // echo json_encode(PostUser::getById($param));
    } 
    else 
    {
        /*$users = PostUser::getById("users");
        foreach ($users as $user) {
        	echo $user;
        }

    }*/
}
?>