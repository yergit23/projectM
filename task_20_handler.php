<?php
session_start();

$uploaddir = 'upload/imgs/';

$pdo = new PDO("mysql:host=localhost;dbname=projectone","root","root");

if ($_FILES) {
	$name = basename($_FILES['files']['name'][$key]);
	if ($name=='') {
		$_SESSION['message'] = "файл не выбран";
		header("location: /project1/task_20.php");
		exit;
	}
}

if ($_FILES) {
	foreach ($_FILES['files']['error'] as $key => $error) {
		if ($error == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES['files']['tmp_name'][$key];
			$name = basename($_FILES['files']['name'][$key]);
			$extension = pathinfo($name, PATHINFO_EXTENSION);
			$new_name = uniqid().'.'.$extension;
			$uploadfiles = $uploaddir . $new_name;
			move_uploaded_file($tmp_name, $uploadfiles);
			$sql = "INSERT INTO images (image) VALUES (:imgname)";
			$statement = $pdo->prepare($sql);
			$statement->execute(['imgname' => $new_name]);
		}
	}

	$_SESSION['message'] = "Загрузка выполнена";

	header("location: /project1/task_20.php");
}

?>