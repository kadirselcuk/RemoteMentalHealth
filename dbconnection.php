<?php
$server = "us-cdbr-east-02.cleardb.com";
$username = "b4fa477bbcb49c";
$password = "48fd0dfb";
$database = "heroku_8a33ab59478119d";


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
