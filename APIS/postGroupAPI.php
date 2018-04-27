<?php  
header('Content-Type: application/json');
require_once(dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'config.inc.php');
$request = $_SERVER['REQUEST_METHOD'];

if ($request == "GET") 
{
	if(isset($_GET['id']))
	{
		$group = PostGroup::getById($_GET['id'], "groups");
		PostGroup::toUTF8($group);

		echo json_encode($group);
	}
	else
	{
		$groups = PostGroup::getAll("groups");
		PostGroup::toUTF8($groups);

		echo json_encode($groups);
	}
}
elseif ($request == "POST") 
{
	$input = json_decode(file_get_contents('php://input'), false);
    if (isset($input->grade) && isset($input->groups) && isset($input->generation) && isset($input->periods) && isset($input->idCarrerArea) && isset($input->isOfficial))
    {
    	$post = new PostGroup();
        $post->grade = $input->grade;
        $post->generation = $input->generation;
        $post->periods = $input->periods;
        $post->idCarrerArea = $input->idCarrerArea;
        $post->groups = $input->groups;
        $post->isOfficial = $input->isOfficial;

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
elseif ($request == "PUT") 
{
	$param = isset($_GET['id']) ? $_GET['id'] : false;
    $input = json_decode(file_get_contents('php://input'), false);
    if ($param && isset($input->grade) && isset($input->groups) && isset($input->generation) && isset($input->periods) && isset($input->idCarrerArea) && isset($input->isOfficial))
    {
    	$post = new PostGroup();
        $post->id = $_GET['id'];
        $post->grade = $input->grade;
        $post->groups = $input->groups;
        $post->generation = $input->generation;
        $post->periods = $input->periods;
        $post->idCarrerArea = $input->idCarrerArea;
        $post->isOfficial = $input->isOfficial;

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
        $post = new PostGroup();

        $result = $post->delete($_GET['id'], "groups");
        if ($result) 
            echo $result;
        else 
            http_response_code(500);
    } 
    else 
        http_response_code(400);
}
?>