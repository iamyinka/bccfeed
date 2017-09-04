<?php  

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BCC FEED</title>
	<link rel="stylesheet" href="assets/css/register_style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

<?php  

if (isset($_POST['register_button'])) {
	# code...
	echo '
	
	<script>
	
	$(document).ready(function() {
		$(".first").hide();
		$(".second").show();
	})
	
	</script>

	';
}

?>
	
<div class="container">

	<div class="login_box">

		<div class="login_header">
			<h1>BCC Social</h1>
			<p>Log In or Sign Up below:</p>
		</div>
		
		<div class="first">
			<form action="register.php" method="POST">
			
				<input type="email" placeholder="Email Address" name="log_email" value="
				<?php if (isset($_SESSION['log_email'])) {
					# code...
					echo $_SESSION['log_email'];
				} ?>" required>
				<br>
				<br>
				<input type="password" placeholder="Password" name="log_password">
				<br>
				<br>
				<input type="submit" value="Log In" name="login_button">
				<br>
				<br>
				<?php if (in_array("Email or password is incorrect <br>", $error_array)) echo "Email or password is incorrect <br>"; ?>
				<a href="#" id="signup" class="signup">Sign up here &rarr;</a>
			</form>
		</div>

		<div class="second">
			<form action="register.php" method="POST">

				<input type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) {
					# code...
					echo $_SESSION['reg_fname'];
				} ?>" required>
				<br>
				<?php if (in_array("Your first name must be between 2 and 25 letters <br>", $error_array)) echo "Your first name must be between 2 and 25 letters <br>"; ?>
				<br>


				<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) {
					# code...
					echo $_SESSION['reg_lname'];
				} ?>" required>
				<br>
				<?php if (in_array("Your last name must be between 2 and 25 letters <br>", $error_array)) echo "Your last name must be between 2 and 25 letters <br>"; ?>
				<br>


				<input type="email" name="reg_email" placeholder="Email Address" value="
					<?php if (isset($_SESSION['reg_email'])) {
					# code...
					echo $_SESSION['reg_email'];
				} ?> 
				" required>
				<br>

				<br>


				<input type="email" name="reg_email2" placeholder="Confirm Email Address" value="
					<?php if (isset($_SESSION['reg_email2'])) {
					# code...
					echo $_SESSION['reg_email2'];
				} ?> 
				" required>
				<br>
				<?php if (in_array("Email already exists in database <br>", $error_array)) echo "Email already exists in database <br>"; 
					else if (in_array("Invalid Email Format <br>", $error_array)) echo "Invalid Email Format <br>";
					else if (in_array("Emails don't match! <br>", $error_array)) echo "Emails don't match! <br>"; 
				?>
				<br>


				<input type="password" name="reg_password" placeholder="Password" required>
				<br>
				<br>
				<input type="password" name="reg_password2" placeholder="Confirm Password" required>
				<br>
				<?php if (in_array("Your passwords do not match <br>", $error_array)) echo "Your passwords do not match <br>"; 
					else if (in_array("Your passwords can only conatin English characters or numbers <br>", $error_array)) echo "Your passwords can only conatin English characters or numbers <br>";
					else if (in_array("Your password must be between 5 and 30 letters <br>", $error_array)) echo "Your password must be between 5 and 30 letters <br>"; 
				?>
				<br>
				<input type="submit" name="register_button" value="Register">
				<br>
				<?php if (in_array("<span style='color: green;'>Registration successful! You may proceed to login</span><br>", $error_array)) echo "<span style='color: green;'>Registration successful! You may proceed to login</span><br>"; ?>
				<a href="#" id="signin" class="signin">Login here &rarr;</a>
			</form>
		</div>
		
	</div>
	
</div>

</body>
</html>