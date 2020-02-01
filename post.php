<?php

$nam = "name";
$ema = "email";
$user  = $_POST["name"];
$user1 = $_POST["email"];

$servername =  "localhost";
$username   =  "root";
$password   =  "";
$dbname     =  "user_db";

// Create connection
   $conn = new mysqli($servername, $username, $password,$dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$sql = "INSERT INTO user_info (name,email) VALUES ('$user', '$user1')";

if ($conn->query($sql) === TRUE) {
	
    echo "New record created successfully";
	
} else {
	
    echo "Error: " . $sql . "<br>" . $conn->error;
}



	$conn->close();

?>