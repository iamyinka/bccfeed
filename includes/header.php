<?php  

require 'config/config.php';

if (isset($_SESSION['username'])) {
	# code...
	$userLoggedIn = $_SESSION['username'];
} else {
	header("Location: register.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BCC FEED</title>
</head>
<body>