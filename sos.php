<?php
$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b64a01ad209189","e8daa8ec","heroku_a1867c3d7431251");
// Check connection
if (! $con)
{
echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

if(isset($_GET["Student_id"])){
  $id=$_GET["Student_id"];
$result = mysqli_query($con,"SELECT student.Fname as sfname,student.Lname as slname,student.Address as saddress,student.city as scity,student.state as sstate,student.zip as szip,student.Birthdate as sbday,
       guardian.Fname as gfname,guardian.Lname as glname,guardian.Address as gaddress,guardian.City as gcity,guardian.State as gstate,guardian.zip as gzip,
	guardian.Phone as gphone,guardian.Email as gemail
FROM student,guardian WHERE student.Student_id= '$id' and guardian.Student_id='$id'");

echo "<center> <h1> Student Details </h1></center>";


while($row = mysqli_fetch_array($result))
{
  echo "<p style='text-align:center;'>";
  echo "<b>Student Name : </b>". $row['sfname']." ".$row['slname']."<br>";
  echo "<b>Address : </b>".$row['saddress'] .",". $row['scity'].",".$row['sstate']." - ".$row['szip']."<br>";
  echo "<b>Date Of Birth : </b>". $row['sbday']."<br>";
  echo "<b>Parent/Guardian Name :</b> ". $row['gfname']." ".$row['glname']."<br>";
  echo "<b>Parent/Guardian Phone : </b>". $row['gphone']."<br>";
  echo "<b>Parent/Guardian Address : </b>" . $row['gaddress'] .",". $row['gcity'].",".$row['gstate']." - ".$row['gzip']."<br>";
  echo"<b>Parent/Guardian Email : </b>". $row['gemail']."<br><br>";
  echo "<button type='button' class='cancelbtn'> <a href='dashboard.html'> Prev </a></button></p>";
}
}
else{
  echo("student not found");
}
mysqli_close($con);
?>