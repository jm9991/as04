<?php

	include 'database.php';
	
	$pdo = Database::connect();
	if($_GET['id']) 
		$sql = "SELECT * from fr_persons WHERE id=" . $_GET['id']; 
	else
		$sql = "SELECT * from fr_persons";

	$arr = array();
	foreach ($pdo->query($sql) as $row) {
	
		array_push($arr, $row['lname'] . ", ". $row['fname']);
		
	}
	Database::disconnect();

	echo '{"names":' . json_encode($arr) . '}';
?>
				