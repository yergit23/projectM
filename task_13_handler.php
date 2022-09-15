<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=projectone","root","root");

$sql = "SELECT * FROM user WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($user)) {
	$_SESSION['email'] = "Этот эл адрес уже занят другим пользователем!";

	//var_dump($user);
	header ("location: /project1/task_13.php");
	exit;
}

$passhash = password_hash("$password", PASSWORD_DEFAULT);

$sql = "INSERT INTO user (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email, 'password' => $passhash]);

header ("location: /project1/task_13.php");

?>