<?php

//var_dump($_POST);

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=projectone;","root","root");
$sql = "INSERT INTO mytable (text) VALUES (:text)";
//:text это метка
$statement = $pdo ->prepare($sql);
$statement->execute(['text' => $text]);
//'text' это та метка
header("location: /project1/task_11.php");


?>