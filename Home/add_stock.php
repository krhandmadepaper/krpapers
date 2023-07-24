<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?><!doctype html>
<html lang="en">

<head>
    <title>Add Stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <script>
        function TDate() {
            var UserDate = document.getElementById("userdate").value;
            var ToDate = new Date();

            if (new Date(UserDate).getTime() < ToDate.getTime()) {
                alert("The Date must be Bigger ");
                return false;
            }
            return true;
        }
    </script>
       <?php include "navbar.php" ?>

</head>

<body >
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="wrapper">
                    <a class="btn btn-danger" href="javascript:history.back()">Previous</a>
                        <div class="row justify-content-center">

                            <div class="col-lg-8" >
                                <div class="contact-wrap" >
                                    <h3 class="mb-4 text-center">Add Stock</h3>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                                    <div id="form-message-success" class="mb-4 w-100 text-center">
                                        Update Daily Usage
                                    </div>
                                    <form method="POST" action="backend/add_stock_back.php" class="contactForm" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-color:black;font-size:x-large;">Date</label>
                                                    <input type="date" class="form-control" name="date" id="userdate" onchange="TDate()" >
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Hoisery</label>
                                                    <input type="text" name="hoisery" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">NTBT</label>
                                                    <input type="text" name="ntbt" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Bleech</label>
                                                    <input type="text" name="bleech" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Reciever</label>
                                                    <input type="text" name="reciever" class="form-control" placeholder="name" required>
                                                </div>
                                            </div>
                                            <div style="text-align: center;" class="col-md-4">
                                                <div class="form-group">
                                                    <button type="submit"  class="btn btn-dark"> Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
<?php
} else {
    header("Location: ../login/login.php"); // Redirect to the login page if not logged in or not an Admin
    exit();
}
?>