<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Check if all form fields are set and not empty
  if (isset($_POST['name']) && !empty($_POST['name'])
      && isset($_POST['email']) && !empty($_POST['email'])
      && isset($_POST['message']) && !empty($_POST['message'])) {
    
    // Store form values in variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contact_us";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $sql)) {
        echo "Thank you for your message! <br><br>";
        echo "<button onclick=\"window.location.href='index.html'\">Back to contact form</button>";
    } else {
        die("Query failed: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);

  } else {
    echo "Please fill in all the required fields.";
  }
}
?>
