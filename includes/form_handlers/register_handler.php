<?php  

$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

if (isset($_POST["register_button"])) {
	# code...

	// First Name
	$fname = strip_tags($_POST['reg_fname']);  // Remove HTML tags
	$fname = str_replace(' ', '', $fname); // Remove spaces in name
	$fname = ucfirst(strtolower($fname)); // change characters to lower case and capitalize.
	$_SESSION['reg_fname'] = $fname; // Stores first name into session variable

	// Last Name

	// First Name
	$lname = strip_tags($_POST['reg_lname']);  // Remove HTML tags
	$lname = str_replace(' ', '', $lname); // Remove spaces in name
	$lname = ucfirst(strtolower($lname)); // change characters to lower case and capitalize.
	$_SESSION['reg_lname'] = $lname; // Stores first name into session variable


	// Email Address
	$em = strip_tags($_POST['reg_email']);  // Remove HTML tags
	$em = str_replace(' ', '', $em); // Remove spaces in name
	$em = strtolower($em); // change characters to lower case and capitalize.
	$_SESSION['reg_email'] = $em; // Stores first name into session variable

	// Confirm Email Address
	$em2 = strip_tags($_POST['reg_email2']);  // Remove HTML tags
	$em2 = str_replace(' ', '', $em2); // Remove spaces in name
	$em2 = strtolower($em2); // change characters to lower case and capitalize.
	$_SESSION['reg_email2'] = $em2; // Stores first name into session variable

	// Password
	$password = strip_tags($_POST['reg_password']);  // Remove HTML tags

	// Confirm Password
	$password2 = strip_tags($_POST['reg_password2']);  // Remove HTML tags

	// Date
	$date = date('Y-m-d');

	if ($em == $em2) {
		# code...
		// Check if Email is in valid format 
		if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
			# code...
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			// Check if email alread exits in database

			$e_check = mysqli_query($connection, "SELECT email FROM users WHERE email='$em'");

			// Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if ($num_rows > 0) {
				# code...
				array_push($error_array, "Email already exists in database <br>");
			}

		} else {
			array_push($error_array, "Invalid Email Format <br>");
		}


	} else {
		array_push($error_array, "Emails don't match! <br>");
	}

	if (strlen($fname) > 25 || strlen($fname) < 2) {
		# code...
		array_push($error_array, "Your first name must be between 2 and 25 letters <br>");
	}

	if (strlen($lname) > 25 || strlen($lname) < 2) {
		# code...
		array_push($error_array, "Your last name must be between 2 and 25 letters <br>");
	}

	if ($password != $password2) {
		# code...
		array_push($error_array, "Your passwords do not match <br>");
	} else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your passwords can only conatin English characters or numbers <br>");
		}
	}

	if (strlen($password) > 30 || strlen($password) < 5) {
		# code...
		array_push($error_array, "Your password must be between 5 and 30 letters <br>");
	}


	if (empty($error_array)) {
		# code...
		$password = md5($password);
		$username = strtolower($fname . "_" . $lname);

		// check if username exists in database

		$check_username_query = mysqli_query($connection, "SELECT username FROM users where username='$username'");

		$i = 0;

		// If username exists, add number to username

		while (mysqli_num_rows($check_username_query) != 0) {
			# code...
			$i++; // add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($connection, "SELECT username FROM users where username ='$username'");
		}

		// Profile Picture Assignment
		$rand = rand(1, 2);
		
		if ($rand == 1) {
			# code...
			$profile_pic = "assets/images/profile_pics/defaults/pic1.png";
		} else if ($rand == 2) {
			# code...
			$profile_pic = "assets/images/profile_pics/defaults/pic2.png";
		} 

		$query = mysqli_query($connection, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		array_push($error_array, "<span style='color: green;'>Registration successful! You may proceed to login</span><br>");

		// Clear session variables
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
		$_SESSION['reg_password'] = "";
		$_SESSION['reg_password2'] = "";
	}

}

?>