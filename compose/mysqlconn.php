<?php
$servername = "mariadb";
$username = "testuser";
$database = "testdb";
$password = "testpassword";

//  Create a new connection to the MySQL database using PDO
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
