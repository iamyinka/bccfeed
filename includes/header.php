<?php  

require 'config/config.php';

if (isset($_SESSION['username'])) {
	# code...
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
} else {
	header("Location: register.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BCC FEED</title>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="top_bar navbar-fixed-top">
	<div class="logo pull-left">
		<a href="index.php">BCC Social</a>
	</div>

	<nav class="pull-right">
		<a href="<?php echo $userLoggedIn; ?>">
			<?php  

				echo $user['first_name'];

			?> <i class="fa fa-user-plus fa-lg"></i>
		</a>
		<a href="index.php"> <i class="fa fa-home fa-lg"></i></a>
		<a href="#"> <i class="fa fa-envelope fa-lg"></i></a>
		<a href="#"> <i class="fa fa-bell-o fa-lg"></i></a>
		<a href="#"> <i class="fa fa-users fa-lg"></i></a>
		<a href="#"> <i class="fa fa-cog fa-lg"></i></a>
		<a href="#"> <i class="fa fa-sign-out fa-lg"></i></a>
	</nav>
</div>

<div class="container">