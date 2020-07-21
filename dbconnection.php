<?php
$server = "us-cdbr-east-02.cleardb.com";
$username = "b31838d4126ddb";
$password = "1b094fdd";
$database = "heroku_95daae288feb624";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	
}

?>
