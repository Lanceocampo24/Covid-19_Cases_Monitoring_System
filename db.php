<?php
//this are variables for database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "pasigcovidcases";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
}
else{
  echo "Success!!!";
}
?>
