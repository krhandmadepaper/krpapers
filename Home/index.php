
<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?>
    <!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php include"navbar.php" ?>
  </head>
  <body style ="background-color:rgba(164, 189, 250, 0.288) ;">
  <div class="container" style="padding:30px"></div>
    <div class="container" style ="background-color:rgb(195, 201, 194) ;padding-top:20px">
    <!-- <a class="nav-link previous active" href="javascript:history.back()">Previous</a><i class="fas fa-cat"></i> -->
    <a class="btn btn-danger"  href="javascript:history.back()">Previous</a>

    <div class="row" style="padding-top: 28px;padding-bottom: 28px;">  
                <div class="col-xl-4">
                    <div class="card" style="background: rgb(228, 224, 224);">
                        <div class="card-body">
                          <i class='fas fa-dolly'></i>
                            <h5 class="card-title" >Raw Material Stock Details</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="stock_dashboard.php" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="background: rgb(228, 224, 224);">
                        <div class="card-body">
                          <i class='far fa-clipboard'></i>
                            <h5 class="card-title">Order Details</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="../orders/Admin/Index.php" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="background: rgb(228, 224, 224);">
                        <div class="card-body">
                          <i class='fas fa-boxes'></i>
                            <h5 class="card-title" >Suppliers</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="../Suppliers/Dashboard.php" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
                <div class="container" style ="background-color:rgb(195, 201, 194) ;">
                <div class="row" style="padding-top: 28px;">
                <div class="col-xl-6">
                    <div class="card" style="background: rgb(228, 224, 224);">
                        <div class="card-body">
                          <i class='fas fa-boxes'></i>
                            <h5 class="card-title" >Tasks</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="../task/index.php" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card" style="background: rgb(228, 224, 224);">
                        <div class="card-body">
                          <i class='fas fa-boxes'></i>
                            <h5 class="card-title" >Shipping Details</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="../Shipping/Dashboard.php" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
          <!-- </span> -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php
} else {
    header("Location: ../login/login.php"); // Redirect to the login page if not logged in or not an Admin
    exit();
}
?>