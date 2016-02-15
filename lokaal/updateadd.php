<?php


require_once 'app/connect.php';

if (isset($_POST['name'])) {
	$name = trim ($_POST['name']);
	
	if (!empty($name)) { 
	$updateQuery = $db->prepare("
	INSERT INTO items (name, user, done, created)
		VALUES (:name, :user, 0, NOW())
	
	");
		$updateQuery->execute([
		'name' => $name,
		'user' => $_SESSION ['user_id']
	]);
	}
		
}
header ('Location: todolist.php');
