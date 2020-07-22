<!DOCTYPE html>   
<html>   
<head>
<link rel="stylesheet" type="text/css" href="style.css" />  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>  </title>
</head>
<br>
<center><h1>Click On The Image For a Motivational Video !! </h1>
<br>
<p align="center">
 <a href="https://www.youtube.com/watch?v=GghmPtItGA4" target="_blank">
  <img src="motivationpic.jpg" width="400" height="300">
 </a>
 <br>
 <br>
 <a href= "https://www.ccs.k12.in.us/services/student-services/mental-health-resources" target="_blank"> Resource </a>
</p>

<?php

if(isset($_POST['submit'])){
    $selected=$_POST['question'];
    //print_r($selected);
       
}
include 'dbconnection.php';
session_start();
/*$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b64a01ad209189","e8daa8ec","heroku_a1867c3d7431251");
// Check connection
if (! $con)
{
echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}*/
//$i=1;
for($i=1;$i<19;$i=$i+1){
    $r=$selected[$i];
    $rest = substr($r,0,7);
    //echo($rest);
    $q="select * from question where Question_id='$i'";
     $result = mysqli_query($conn,$q);
     while($row = mysqli_fetch_array($result)){
         //echo("points for".$i." question is:".$row[$r]." " .$row[$rest]);
         $sid=$_SESSION['student_id'];
         $sql="update response set Response='$row[$rest]',Score='$row[$r]' where Student_id='$sid' and Question_id='$i' and Test_id=1";
        //$sql = "INSERT INTO response (Student_id,Test_id,Question_id,Response,Score,Recommendation) VALUES ($sid,1,$i,$row[$rest],$row[$r], 'none')";
  if (mysqli_query($conn, $sql)) {
    //echo "<br>New record updated successfully";
 } else {
    //echo "<br>Error: ".$conn->error ;
 }
         
     }
    
}
?>
<a href="index.html"><button>Logout</button></a>
