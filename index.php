<?php
include 'todoapi.php';

// Client request
$action = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$parameters = explode("/", $uri);

$todoapi = new TodoAPI();
$usage = "REST API Examples\n"
			."GET /todolists\n"
			."GET /todoitems\n"
			."GET /todolists/1\n"
			."GET /todoitems/2\n"
			."PUT /todolists (-d label=MyList)\n"
			."PUT /todolists/12 (-d label=MyItem,[done=1])\n"
			."POST /todolists/12 (-d label=MyList)\n"
			."POST /todoitems/3 (-d label=MyItem,[done=1])\n"
			."DELETE /todolists/12\n"
			."DELETE /todoitems/1\n";

if ($action == "GET")
{
	switch (sizeof($parameters))
	{
		case 2:
			$param = $parameters[1];
			if($param == "todolists")
				$response = $todoapi->get_lists();
			else if($param == "todoitems")
				$response = $todoapi->get_all_items();
			break;
		case 3:
			if($parameters[1] == "todoitems")
			{
				if(is_numeric($parameters[2]))
					$response = $todoapi->get_item($parameters[2]);
			}
			else if($parameters[1] == "todolists")
			{
				if(is_numeric($parameters[2]))
					$response = $todoapi->get_list($parameters[2]);
			}
			break;
		case 4:
			if($parameters[1] == "todolists")
			{
				if(is_numeric($parameters[2]))
					if($parameters[3] == "items")
						$response = $todoapi->get_list_items($parameters[2]);
			}
			break;
		case 5:
			if($parameters[1] == "todolists")
				if(is_numeric($parameters[2]))
					if($parameters[3] == "items")
						if($parameters[4] == "notdone")
							$response = $todoapi->get_list_items($parameters[2], 0);
			break;
	}
	if(!empty($response))
	{
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	else
		echo $usage;
}
else if ($action == "POST")
{
	switch (sizeof($parameters))
	{
		case 3:
			if($parameters[1] == "todolists" && isset($_POST["label"]))
				$response = $todoapi->update_list($parameters[2], $_POST["label"]);
			if($parameters[1] == "todoitems")
			{
				if(isset($_POST["label"]))
					$fields["label"] = $_POST["label"];
				if(isset($_POST["done"]))
					$fields["done"] = $_POST["done"];
				$response = $todoapi->update_item($parameters[2], $fields);
			}
			break;
	}
	if(!empty($response))
		echo $response;
	else
		echo $usage;
}
else if ($action == "PUT")
{
	parse_str(file_get_contents("php://input"), $put_vars);
	switch (sizeof($parameters))
	{
		case 2:
			if($parameters[1] == "todolists" && isset($put_vars["label"]))
				$response = "Last inserted id: ".$todoapi->add_list($put_vars["label"]);
			break;
		case 3:
			if($parameters[1] == "todolists")
				$response = "Last inserted id: ".$todoapi->add_item($put_vars, $parameters[2]);
			break;
	}
	if(!empty($response))
		echo $response;
	else
		echo $usage;
}
else if ($action == "DELETE")
{
	switch (sizeof($parameters))
	{
		case 3:
			if($parameters[1] == "todoitems")
			{
				if(is_numeric($parameters[2]))
					if($todoapi->remove_item($parameters[2])." item(s) deleted")
						$response = "Item ".$parameters[2]." deleted";
			}
			else if($parameters[1] == "todolists")
			{
				if(is_numeric($parameters[2]))
					if($todoapi->remove_list($parameters[2])." list(s) deleted")
						$response = "List ".$parameters[2]." deleted";
			}
			break;
	}
	if(!empty($response))
		echo $response;
	else
		echo $usage;
}
?>