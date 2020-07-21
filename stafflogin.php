<?php
    include 'dbconnection.php';
    session_start();
    $Email = $_POST['Email'];
    $Pass = $_POST['Password'];

    $sql = "select Email, Password from Staff where Email= '$Email' and  Password = '$Pass' limit 1";
    $result = mysqli_query($conn, $sql);

    if (isset($Email) && isset($Pass) && mysqli_num_rows($result)==1 ) {
        $row = mysqli_fetch_assoc($result);
        if($Email == $row['Email'] && $Pass == $row['Password']){
            $_SESSION['loggedin'] = true;
            header("Location: dashboard.php");
        }
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect login credentials");';
        echo 'window.location.href = "staff.html";';
        echo "</script>";
    }
    mysqli_close($conn);
?>

