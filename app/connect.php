<?php

session_start();
$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=sbayram_todo;host=localhost', 'sbayram_todouser', 'qwerty');

if (!isset($_SESSION['user_id'])) { 
	die('Je bent niet ingelogd.');
}

?>