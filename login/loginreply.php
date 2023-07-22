<?php 
session_start();
$email = $_POST['email'];
$pwd = $_POST['pwd'];
include "connection.php";
if($con){
    $sql = "SELECT * FROM `users`  WHERE email ='$email' AND password = '$pwd'";
    $result = mysqli_query($con,$sql);
    $result1 = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    if($row){
        if($result1['user']=='0'){
            $_SESSION['unique_id'] = $email;
             header("Location:../Client/dashboard.php");
        }
       else
        {
            $_SESSION['id'] = $email;
            header("Location:../Admin/dashboardpremium.php");
        }
    }
    else{
        ?>
        <script>
        window.alert("Username and Password is not correct");
        window.location.href="login.php";
        </script>
        <?php
    }

    
           
    
    

}
    else{
        echo "<h1>Sorry! invalid Id and password</h1>";
        //header("Location:signup.php");
    }


?>