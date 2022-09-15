<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=projectone;","root","root");
$sql = "SELECT * FROM user WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
	$_SESSION['error'] = "Неверный логин или пароль!";
	header("location: /project1/task_16.php");
	exit;
}

if (!password_verify($password, $user['password'])) {
		$_SESSION['error'] = "Неверный логин или пароль!!";
		header("location: /project1/task_16.php");
		exit;
}

	$_SESSION['user'] = ["email" => $user['email'], "id" => $user['id']];
	header("location: /project1/task_16_index.php");


?>