<?php
// Start the session
session_start();

// Check if the admin has submitted the login form
if (isset($_POST['username']) && isset($_POST['password'])) {
	
	// Retrieve the admin credentials from the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "contact_us";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// If the admin credentials are correct, redirect the admin to the admin panel
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $username;
		header("Location: admin_message.php");
		exit();
	} else {
		// If the admin credentials are incorrect, display an error message
		echo "Invalid username or password.";
	}

	mysqli_close($conn);
} else {
	// If the admin has not submitted the login form, redirect the admin to the login page
	header("Location: admin-login.php");
	exit();
}
?>
