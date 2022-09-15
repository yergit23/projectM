<?php
session_start();

//var_dump($_POST);

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=projectone;","root","root");

$sql = "SELECT * FROM mytable WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$tasks = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($tasks)) {
	$danger = "Такая запись уже есть в БД!";
	$_SESSION['danger'] = $danger;

	header("location: /project1/task_12.php");
	exit;
}

$sql = "INSERT INTO mytable (text) VALUES (:text)";
//:text это метка
$statement = $pdo ->prepare($sql);
$statement->execute(['text' => $text]);
//'text' это та метка

$success = "Такая запись уже есть в БД!";
$_SESSION['success'] = $success;

header("location: /project1/task_12.php");


?>