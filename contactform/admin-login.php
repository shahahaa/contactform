<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
		/* Add styles for the login form here */
	</style>
</head>
<body>
	<div class="header">
		<h1>Admin Login</h1>
	</div>
	<div class="container">
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" placeholder="Enter your username" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Enter your password" required>

			<input type="submit" value="Login">
		</form>
		<br><button onclick="window.location.href='index.html'">Back to Contact Form</button>
	</div>
</body>
</html>
