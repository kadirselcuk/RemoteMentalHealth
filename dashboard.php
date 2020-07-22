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
<a href="https://public.tableau.com/profile/lakshmi.shri#!/vizhome/StudentDashboard_15954361808020/Student-GuardianDetails?publish=yes" target = 'blank'><button>Student Dashboard</button></a><br>
<a href="https://public.tableau.com/profile/lakshmi.shri#!/vizhome/StudentAnalytics/StudentAnalytics?publish=yes" target = 'blank'><button>Analytics</button></a>
<br><a href="index.html"><button>Logout</button></a>
</form>
</body>
</html>