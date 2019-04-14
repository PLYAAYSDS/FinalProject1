<?php
$hostname = "localhost";
$db_username = "p1d4ti06";
$db_password = "p1d4ti06";

$link = mysqli_connect($hostname, $db_username, $db_password) or die("Cannot connect to the database");
mysqli_select_db($link,"p1d4ti06_apululos") or die("Cannot select the database");


?>