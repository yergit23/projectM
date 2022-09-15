<?php
session_start();

$_SESSION['score'] += $_POST['score'];

header ("location: /project1/task_15_my_vers.php");

?>