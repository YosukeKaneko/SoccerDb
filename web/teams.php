<?php
	
	$db = new PDO("mysql:host=localhost;dbname=soccerdb;charset=utf8", "root", "root");
	$data = json_decode(file_get_contents('php://input'));

	if ($_SERVER['REQUEST_METHOD'] == "GET"){
		$statement = $db->query('SELECT * FROM teams');
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		echo json_encode($statement->fetchAll());
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$sql = "INSERT INTO teams (title) values (:title)";
		$query = $db->prepare($sql);
		$query->execute(array(":title"=>$data->title));
		$result['id'] = $db->lastInsertId();
		echo json_encode($result);
	}

	// if ($_SERVER['REQUEST_METHOD'] == "PUT"){
	// 	$sql = "UPDATE teams SET done = :done WHERE id = :id";
	// 	$query = $db->prepare($sql);
	// 	$query->execute(array(":done"=>$data->done, ":id"=>$data->id));
	// }
	
	if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
		$sql = "DELETE FROM teams WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(array(":id"=>$_GET['id']));
	}

?>