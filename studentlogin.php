<?php
    include 'dbconnection.php';
    session_start();
    $ID = $_POST['id'];
    $Pass = $_POST['password'];

    $sql = "select Student_id, Password from Student where Student_id = '$ID' and  Password = '$Pass' limit 1";
    $result = mysqli_query($conn, $sql);

    if (isset($ID) && isset($Pass) && mysqli_num_rows($result)==1 ) {
        $row = mysqli_fetch_assoc($result);
        if($ID == $row['Student_id'] && $Pass == $row['Password']){
            $_SESSION['loggedin'] = true;
            $_SESSION['student_id']=$ID;
            header("Location: AfterLogin.php");
        }
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect login credentials");';
        echo 'window.location.href = "student.html";';
        echo "</script>";
    }
    mysqli_close($conn);
?>