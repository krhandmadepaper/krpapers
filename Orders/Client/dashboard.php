
<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Client') {
    // The user is logged in as a Client, show the dashboard content for Clients
    ?>
<html>
    <a href = "../../login/logout.php"> Logout </a>
</html>
<?php 
} else {
    header("Location: ../../login/login.php"); // Redirect to the login page if not logged in or not a Client
    exit();
}
?>