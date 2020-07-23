<?php
/*$con=mysqli_connect("us-cdbr-east-02.cleardb.com","b64a01ad209189","e8daa8ec","heroku_a1867c3d7431251");
// Check connection
if (! $con)
{
echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}*/
include 'dbconnection.php';
session_start();

?>
<!DOCTYPE html>   
<html>   
<head>
<link rel="stylesheet" type="text/css" href="style.css" />  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Questionnaire </title>
</head>
<body>
	<center> <h2> How have you been feeling for the past 30 days ? </h2>
    <img src="mood.png" width="350" height="300">

 
 
	<div id="page-wrap">
		
	<form action="Motivation.php" method="post" id="quiz">
    <?php
    $q="select * from question where Test_id=1";
     $result = mysqli_query($conn,$q);
     while($row = mysqli_fetch_array($result))
{
    ?>
    <div class="card">
<h4 class="card-header"> <?php echo $row['Question'] ?> </h4>

                        <input type="radio" name="question[<?php echo $row['Question_id']; ?>]" id="question-1-answers-A" value="Answer1_points" required/>
                        <label for="question-1-answers-A"><?php echo $row['Answer1'] ?></label>
                    
                        <input type="radio" name="question[<?php echo $row['Question_id']; ?>]"value="Answer2_points" required/>
                        <label for="question-1-answers-B"><?php echo $row['Answer2'] ?></label>
                    
                        <input type="radio" name="question[<?php echo $row['Question_id'];?>]" value="Answer3_points" required/>
                        <label for="question-1-answers-C"><?php echo $row['Answer3'] ?></label>
                    
 
<?php
} 
?>
<br>
<br>
<button type='submit' class='submit' name='submit'>Submit</button>

</div>
</form>
</body>
</html>
