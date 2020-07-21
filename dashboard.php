<?php

session_start();

	if (!isset($_SESSION['loggedin']))
	{
   	
	    echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "staff.html";';
            echo '</script>';

   	exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>View Student Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css" />  
</head>
<body>
	<center>
<h1>Please select if you want to view student dashboard or Analytics or logout</h1>
<a href="http://10.8.1.19:3000/public/dashboard/8c268ac7-02d5-4aa8-8538-47306b1473d6" target = 'blank'><button>Student Dashboard</button></a><br>
<a href="http://10.8.1.19:3000/public/dashboard/9b95f8ea-a464-4bc4-973f-64ef6ad0c041" target = 'blank'><button>Analytics</button></a>
<br><a href="index.html"><button>Logout</button></a>
</form>
</body>
</html>