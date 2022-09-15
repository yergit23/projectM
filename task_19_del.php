<?php
session_start();

$id = $_GET['id'];
$filedir = 'upload/imgs/';

$pdo = new PDO("mysql:host=localhost;dbname=projectone","root","root");
$sql = "SELECT * FROM images WHERE id=:imgid";
$statement = $pdo->prepare($sql);
$statement->execute(['imgid' => $id]);
$img = $statement->fetch(PDO::FETCH_ASSOC);

$file = $filedir . $img['image'];

if (file_exists($file)) {
	unlink($file);
}

$sql = "DELETE FROM images WHERE id=:imgid";
$statement = $pdo->prepare($sql);
$statement->execute(['imgid' => $id]);

$_SESSION['message'] = "Картинка удалена!";

header("location: /project1/task_19.php");


?>