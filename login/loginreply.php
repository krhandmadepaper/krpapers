<?php
session_start();
$id = $_POST['id'];
$pwd = $_POST['pwd'];
include "connection.php";

if ($con) {
    $sql = "SELECT * FROM `Login` WHERE id ='$id' AND Password = '$pwd'";
    $result = mysqli_query($con, $sql);
    $result1 = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);

    if ($row) {
        if ($result1['Type'] == 'Admin') {
            $_SESSION['user_id'] = $id; // Store the user ID in the session
            $_SESSION['user_type'] = 'Admin'; // Store the user type in the session
            header("Location: ../Orders/Admin/dashboard.php");
        } else {
            $_SESSION['user_id'] = $id; // Store the user ID in the session
            $_SESSION['user_type'] = 'Client'; // Store the user type in the session
            header("Location: ../Orders/Client/dashboard.php");
        }
    } else {
        ?>
        <script>
            window.alert("Username and Password are not correct");
            window.location.href = "login.php";
        </script>
        <?php
    }
} else {
    echo "<h1>Sorry! invalid Id and password</h1>";
    // Handle database connection error here
}
?>
