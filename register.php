<?php  

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BCC FEED</title>
</head>
<body>
	

	<form action="register.php" method="POST">
		
		<input type="email" placeholder="Email Address" name="log_email">
		<br>
		<br>
		<input type="password" placeholder="Password" name="log_password">
		<br>
		<br>
		<input type="submit" value="Log In" name="login_button">
		<br>
		<br>

	</form>


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
	
	</form>

</body>
</html>