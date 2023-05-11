<?php
// Start the session
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['username'])) {
	header("Location: admin-login.php");
	exit();
}

// Retrieve the contact messages from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_us";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);
echo "<br><button onclick=\"window.location.href='logout.php'\">Logout</button>";
	mysqli_close($conn);
// Display the messages in a table
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style>
		/* Add styles for the table here */
	</style>
</head>
<body>
	<div class="header">
		<h1>Admin Panel</h1>
		<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
	</div>
	<div class="container">
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Message</th>
			</tr>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['message']; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	
</body>
</html>
