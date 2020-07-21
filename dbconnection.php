<?php
$server = "us-cdbr-east-02.cleardb.com";
$username = "b04a26081486ca";
$password = "848e77fc";
$database = "heroku_4541a6d0101c4e1";


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
