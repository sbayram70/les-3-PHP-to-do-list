<?php
require_once 'app/connect.php';
if(isset($_GET['as'], $_GET['item'])) {
	$as = $_GET['as'];
	$item = $_GET['item'];
	
	switch($as) {
		case 'done':
			$doneQuery = $db->prepare("
			UPDATE items
			SET done = 1
			WHERE id = :item
			AND user = :user
			");
			$doneQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
		
		case 'undo':
			$undoQuery = $db->prepare("
			UPDATE items
			SET done = 0
			WHERE id = :item
			AND user = :user
			");
			$undoQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
	
	
	
	case 'delete':
			$deleteQuery = $db->prepare("
			DELETE from items
			WHERE id = :item
			AND user = :user
			");
			$deleteQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;


	case 'update':
			$updateQuery = $db->prepare("
			UPDATE items
			SET done = 
			WHERE id = :item 
			AND user = :user
			");
			$updateQuery->execute([
				'item' => $item,
				'user' => $_SESSION['user_id']
			]);
		break;
	}
}
header('Location: todolist.php');