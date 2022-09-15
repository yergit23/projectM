<?php
session_start();

$_SESSION['counter'] = (int) $_SESSION['counter'] +1;

header ("location: /project1/task_15.php");

?>