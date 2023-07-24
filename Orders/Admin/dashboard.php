
<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?><html>
        
    <a href = "../../login/logout.php"> Logout </a>
</html>
<?php
} else {
    header("Location: ../../login/login.php"); // Redirect to the login page if not logged in or not an Admin
    exit();
}
?>