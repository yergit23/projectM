<?php
session_start();

unset($_SESSION['user']);

header("location: /project1/task_16.php");

?>