<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newreg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, pwd, pwd2) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $first_name, $last_name, $email, $pass1, $pass);

// Set parameters and execute
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$pass1 = $_POST['pwd'];
$pass = $_POST['pwd2'];
$stmt->execute();

echo "New record created successfully";


$stmt->close();
$conn->close();
?>