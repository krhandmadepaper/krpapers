
<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Client') {
    // The user is logged in as a Client, show the dashboard content for Clients
    ?>
<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php include "navbar.php"; ?>
  </head>
</html>
<?php 
} else {
    header("Location: ../../login/login.php"); // Redirect to the login page if not logged in or not a Client
    exit();
}
?>