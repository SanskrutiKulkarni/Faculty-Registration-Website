<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server hostname
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$database = "applicants"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cast = $_POST['cast'];
$email = $_POST['email'];

// SQL query to insert data into the registration table
$sql = "INSERT INTO registration (first_name, last_name, cast, email) VALUES ('$fname', '$lname', '$cast', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
