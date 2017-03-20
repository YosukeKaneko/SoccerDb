<?php

	$db = new PDO("mysql:host=localhost;dbname=soccerdb;charset=utf8", "root", "root");
	$data = json_decode(file_get_contents('php://input'));

	if ($_SERVER['REQUEST_METHOD'] == "GET"){
		$id = $_GET['id'];
		$statement = $db->query('SELECT * FROM players WHERE team_id ='. $id);
		$statement->setFetchMode(PDO::FETCH_ASSOC);
		echo json_encode($statement->fetchAll());
	}

	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$sql = "INSERT INTO players (team_id, name) values (:team_id, :name)";
		$query = $db->prepare($sql);
		$query->execute(array(":team_id"=>$data->teamId, ":name"=>$data->playerName));
		$result['id'] = $db->lastInsertId();
		echo json_encode($result);

	}

	if ($_SERVER['REQUEST_METHOD'] == "PUT"){
		$sql = "UPDATE players SET done = :done WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(array(":done"=>$data->done, ":id"=>$data->id));
	}
	
	if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
		$sql = "DELETE FROM players WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(array(":id"=>$_GET['id']));
	}

?>