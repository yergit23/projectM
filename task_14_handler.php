<?php
session_start();

//$text = $_POST['text'];

$_SESSION['text'] = $_POST['text'];

header ("location: /project1/task_14.php");

?>