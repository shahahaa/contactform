<?php
session_start();

// Clear the session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: admin-login.php");
exit;
?>
