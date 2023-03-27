<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Collect user data from form
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		// Validate form data
		if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
			echo "All fields are required.";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email format.";
		}
		elseif($password != $confirm_password) {
			echo "Passwords do not match.";
		}
		else {
			// Redirect to confirmation page
			header("Location: confirmation.php?name=" . $first_name);
			exit();
		}
	}
?>
