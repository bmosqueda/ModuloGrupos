<?php
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');

$request = $_SERVER['REQUEST_METHOD'];

if($request == 'GET')
{
    if(!isset($_GET['idRol']))
    {
        $param = isset($_GET['id']) ? $_GET['id'] : false;
        if ($param) 
        {
            if(!isset($_GET['rolsUser']))
            {
                $user = PostUser::getById($param, "users");
                PostUser::toUTF8($user);

                echo json_encode($user);
            }
            else
            {
                $rolsUser = PostUser::getRolsUser($param);
                PostUser::toUTF8($rolsUser);

                echo json_encode($rolsUser);    
            }
        } 
        else 
        {
            $users = PostUser::getAll("users");
            PostUser::toUTF8($users);

            echo json_encode($users);
        }
    }
    else
    {   
        $rol = $_GET['idRol'];
        $usersByRol = PostUser::getUsersByRol($rol);
        PostUser::toUTF8($usersByRol);

        echo json_encode($usersByRol);
    }
}
else if($request == 'POST')
{
    //En el post también debe de venir el rol del usuario que se quiere dar de alta
	$input = json_decode(file_get_contents('php://input'), false);
    if (isset($input->accountNumber) && isset($input->idRol) && isset($input->name) && isset($input->lastName) && isset($input->email) && isset($input->idCampus)) 
    {
        $post = new PostUser();
        $post->accountNumber = $input->accountNumber;
        $post->name = $input->name;
        $post->lastName = $input->lastName;
        $post->secondLastName = isset($input->secondLastName) ? $input->secondLastName : "" ;
        $post->email = $input->email;
        $post->idCampus = $input->idCampus;

        $result = $post->insert($input->idRol);
        if ($result) 
        {
            $post->id = $result;
            //return as JSON the values of the inserted element
            echo json_encode($post);
        } 
        else 
        {
            http_response_code(500);
        }
    } 
    else if($_GET['id'] && $_GET['idRol'])
    {
        //Cuando se le va a agregar otro rol a un usuario existente
        $result = PostUser::insertRolUser($_GET['id'], $_GET['idRol']);

        echo json_encode($result);
    }
    else 
    {
        http_response_code(403);
    }
}
else if($request == "PUT")
{
    $param = isset($_GET['id']) ? $_GET['id'] : false;
    $input = json_decode(file_get_contents('php://input'), false);
    if ($param && isset($input->accountNumber) && isset($input->name) && isset($input->lastName) && isset($input->email) && isset($input->idCampus)) 
    {
        $post = new PostUser();
        $post->id = $_GET['id'];
        $post->accountNumber = $input->accountNumber;
        $post->name = $input->name;
        $post->lastName = $input->lastName;
        $post->secondLastName = isset($input->secondLastName) ? $input->secondLastName : "" ;
        $post->email = $input->email;
        $post->idCampus = $input->idCampus;

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
    else 
    {
        http_response_code(403);
    }
}
else if($request == "DELETE")
{
    $param = isset($_GET['id']) ? $_GET['id'] : false; 
    if($param) 
    {
        if(!isset($_GET['idRol']))
        {
            $post = new PostUser();

            $result = $post->delete($_GET['id'], "users");
            if ($result) 
            {
                echo $result;
            } 
            else 
            {
                http_response_code(500);
            }
        }
        else
        {
            //Borrar un rol a un usuario
            $result = PostUser::deleteUserRol($_GET['id'], $_GET['idRol']);
            echo $result;
        }
    } 
    else 
    {
        http_response_code(400);
    }
}
?>