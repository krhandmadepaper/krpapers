<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?>
    <!doctype html>
<html lang="en">

<head>
    <title>Daily update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
        .outlined-div {
    border: 2px solid black; /* Add a solid black outline with a width of 2px */
    padding: 5px; /* Add some padding to create space between the content and the outline */
}
        .lab{
            border: 0.5px solid grey;
            color
}
        </style>
    <script>
        function TDate() {
            var UserDate = document.getElementById("userdate").value;
            var ToDate = new Date();

            if (new Date(UserDate).getTime() <= ToDate.getTime()) {
                alert("The Date must be Bigger or Equal to today date");
                return false;
            }
            return true;
        }
    </script>
       <?php include "navbar.php" ?>

</head>

<body style="background-color:RGB(248, 223, 171 )">
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="wrapper">
                    <a class="btn btn-danger" href="javascript:history.back()">Previous</a>

                        <div class="row justify-content-center ">

                            <div class="col-lg-8 ">
                                <div class="contact-wrap">
                                    <h1 class="mb-12 text-center" style="font-family:">Update an Existing Product</h1>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                                    <div id="form-message-success" class="mb-4 w-100 text-center">
                                    Add a Product
                                    </div>
                                    <form method="POST" action="backend/add-product-reply.php" enctype="multipart/form-data" class="contactForm ">
                                        <div class="row">
                                            <div class="col-md-12 lab">
                                                <div class="form-group">
                                                    <label  style="font-size:x-large;">Product Name</label>
                                                    <input type="text" name="pname" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Cost</label>
                                                    <!-- <select name='Item'  class="form-control" style="font-color:black;" >
                                                    <option style = "font-color:white;background-color:black" value="" selected disabled>Select Item</option>
                                                    </select> -->
                                                    <input type="text" name="cost" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="Cost" required>
                                                </div>
                                            </div> 
                                            <div class="col-md-4 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Pack Of</label>
                                                    <input type="text" name="packof" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="" required>
                                                </div>
                                            </div>                                  
                                            <div class="col-md-4 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">GSM</label>
                                                    <select name='gsm'  class="form-control" style="font-color:black;background-color:RGB(190, 157, 147 )" >
                                                    <option style = "font-color:white;background-color:black" value="" selected disabled>Select GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="80">80 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="100">100 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="120">120 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="150">150 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="180">180 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="200">200 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="220">220 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="250">250 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="300">300 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="350">350 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="400">400 GSM</option>
                                                    <option style = "font-color:white;background-color:black" value="450">450 GSM</option>

                                                </select>
                                                    <!-- <input type="text" name="rate" class="form-control" placeholder="Rate per Kg" required> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Color</label>
                                                    <input type="text" name="color" class="form-control"style="background-color:RGB(190, 157, 147 )" placeholder="Color" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Size</label>
                                                    <input type="text" name="size" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="Enter Size in Inch" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 lab">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Description</label>
                                                    <textarea  name="description" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="Enter Description" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 lab">
                                                <div class="form-group">
                                                    <label for="Image"  style="font-size:x-large;">Upload Image</label>
                                                    <br>
                                                    <input type="file" id="image" accept="image/*" capture="camera" name="image" class="  custom-file-upload" placeholder="image" required>
                                                </div>
                                            </div>
                                            <div style="text-align: center;" class="col-md-12">
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