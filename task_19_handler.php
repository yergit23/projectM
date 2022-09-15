<?php
session_start();

$uploaddir = 'upload/imgs/';
$name = $_FILES["file"]["name"];
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if ($name=='') {
	$_SESSION['message'] = "Вы не выбрали файл";
	header("location: /project1/task_19.php");
	exit;
}

$pdo = new PDO("mysql:host=localhost;dbname=projectone","root","root");

$sql = "SELECT * FROM images WHERE image = :imgname";
$statement = $pdo->prepare($sql);
$statement->execute(['imgname' => $name]);
$img = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($img)) {
	$_SESSION['message'] = "файл с таким именем уже существует!";
	header("location: /project1/task_19.php");
	exit;
}

if ($_FILES && $_FILES["file"]["error"]== UPLOAD_ERR_OK)
{
    move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile);
    $_SESSION['message'] = "Файл загружен";
}

$sql = "INSERT INTO images (image) VALUES (:imgname)";
$statement = $pdo->prepare($sql);
$statement->execute(['imgname' => $name]);

header("location: /project1/task_19.php");

?>