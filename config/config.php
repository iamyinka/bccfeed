<?php 

ob_start();
session_start();

$time = date_default_timezone_set("Asia/Kuala_Lumpur");

$connection = mysqli_connect("localhost", "root", "root", "social");

if (mysqli_connect_error()) {
	# code...
	echo "Unable to connect to the DB: " . mysqli_connect_error();
	echo "<br>";
}

?>