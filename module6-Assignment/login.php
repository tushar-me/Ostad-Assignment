<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Collect user data from form
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];

		// Validate form data
		if(empty($email) || empty($password)) {
			echo "Both email and password are required.";
		}
		else {
			// Redirect to Welcome page
			header("Location: welcome.php?name=" . $first_name);
			exit();
		}
	}
?>
