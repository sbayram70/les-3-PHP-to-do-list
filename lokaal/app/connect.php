<?php

session_start();
$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=localhost', 'root', '');

if (!isset($_SESSION['user_id'])) { 
	die('Je bent niet ingelogd.');
}

?>