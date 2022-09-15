<?php
session_start();

unset($_SESSION['counter']);

header ("location: /project1/task_15.php");

?>