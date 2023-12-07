<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?>


<?php
// Initialize the product count
$productCount = 0;

// Check if the count cookie exists
if (isset($_COOKIE['product_count'])) {
    $productCount = (int)$_COOKIE['product_count'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $clientId = $_POST['cid'];
    $productName = $_POST['pname'];
    $quantity = $_POST['quant'];
    $gsm = $_POST['gsm'];
    $color = $_POST['color'];
    $unit = $_POST['unit'];
    $length = $_POST['length'];
    $breadth = $_POST['breadth'];
    $shipping = $_POST['shipping'];
    $instructions = $_POST['instructions'];

    // Create an array to store the current product entry
    $productEntry = [
        'client_id' => $clientId,
        'product_name' => $productName,
        'quantity' => $quantity,
        'gsm' => $gsm,
        'color' => $color,
        'unit' => $unit,
        'length' => $length,
        'breadth' => $breadth,
        'shipping' => $shipping,
        'instructions' => $instructions,
    ];

    // Generate a unique cookie name based on the product count
    $cookieName = 'product_' . ($productCount + 1);

    // Encode the current product entry as JSON and set it as a cookie
    setcookie($cookieName, json_encode($productEntry), time() + 3600, '/');

    // Increment the product count and update the count cookie
    $productCount++;
    setcookie('product_count', $productCount, time() + 3600, '/');
}

// Display the form
?>



    <!doctype html>
<html lang="en">

<head>
    <title>Daily update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
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
        var count = 0;
        
        function TDate() {
            var UserDate = document.getElementById("userdate").value;
            var ToDate = new Date();

            if (new Date(UserDate).getTime() <= ToDate.getTime()) {
                alert("The Date must be Bigger or Equal to today date");
                return false;
            }
            return true;
        }

        // function enableRadio(radioId) {
        //     // Disable the other radio button
        //     const otherRadio = document.getElementById(radioId);
        //     otherRadio.disabled = true;

        //     // Enable the clicked radio button
        //     const clickedRadio = document.getElementById(event.target.id);
        //     clickedRadio.disabled = false;
        // }

        // function setCookie(cname, cvalue, time) {
        //     var d = new Date();
        //     d.setTime(d.getTime() + (time*24*60*60*1000));
        //     var expires = "expires="+ d.toUTCString();
        //     document.cookie = cname + "=" + cvalue + "; " + expires;
        // }

        // function makeAllCookies() {
        
        //     count+=1;

        //     var key = "product" + count.toString();
            
        //     var value = document.getElementById('cid').value +
        //                 document.getElementById('pname').value +
        //                 document.getElementById('quant').value +
        //                 document.getElementById('gsm').value +
        //                 document.getElementById('color').value +
        //                 document.getElementById('sinch').value +
        //                 document.getElementById('scm').value +
        //                 document.getElementById('length').value +
        //                 document.getElementById('breadth').value +
        //                 document.getElementById('instructions').value;
            
        //     setCookie(key, value, 365);
            
        //     // setCookie("client_id2", document.getElementById('cid').value, 365);
        //     // setCookie("product_name2", document.getElementById('pname').value, 365);
        //     // setCookie("quantity2", document.getElementById('quant').value, 365);
        //     // setCookie("gsm2", document.getElementById('gsm').value, 365);
        //     // setCookie("color2", document.getElementById('color').value, 365);
        //     // setCookie("inch2", document.getElementById('sinch').value, 365);
        //     // setCookie("cm2", document.getElementById('scm').value, 365);
        //     // setCookie("length2", document.getElementById('length').value, 365);
        //     // setCookie("breadth2", document.getElementById('breadth').value, 365);
        //     // setCookie("other_instructions2", document.getElementById('instructions').value, 365);
        // }

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
                                    <h1 class="mb-12 text-center" style="font-family:">Add an Order</h1>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                                    <div id="form-message-success" class="mb-4 w-100 text-center"></div>


                                    


                                    <form method="post" enctype="multipart/form-data" class="contactForm" >
                                        <div class="row" >
                                            <div class="col-md-12 lab">
                                                <div class="form-group">
                                                    <label  style="font-size:x-large;">Client Id</label>
                                                    <input type="text" name="cid" id="cid" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="client id">
                                                </div>
                                            </div>
                                        <!-- <div class = "product-entry-section">   -->
                                            <div class="col-md-4 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Product Name</label>
                                                    <!-- <select name='Item'  class="form-control" style="font-color:black;" >
                                                    <option style = "font-color:white;background-color:black" value="" selected disabled>Select Item</option>
                                                    </select> -->
                                                    <input type="text" name="pname" id="pname" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="product name">
                                                </div>
                                            </div> 

                                            <div class="col-md-4 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Quantity</label>
                                                    <input type="text" name="quant" id="quant" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="quantity">
                                                </div>
                                            </div>   
                                                                        
                                            <div class="col-md-4 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">GSM</label>
                                                    <select name='gsm' id="gsm" class="form-control" style="font-color:black;background-color:RGB(190, 157, 147 )" >
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
                                                    <!-- <input type="text" name="rate" class="form-control" placeholder="Rate per Kg"> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Color</label>
                                                    <input type="text" name="color" id="color" class="form-control"style="background-color:RGB(190, 157, 147 )" placeholder="Color">
                                                </div>
                                            </div>
                                            <div class="col-md-6 lab ">
                                                <div class="form-group">
                                                   <label style="font-size:x-large;">Size</label>

                                                   <br>

                                                   <select name='unit' id="unit" class="form-control" style="background-color:RGB(190, 157, 147 ); height: 40%; " >
                                                    <option style = "font-color:white;background-color:black" value="" selected disabled>Select Unit</option>
                                                    <option style = "font-color:white;background-color:black" value="cm">cm</option>
                                                    <option style = "font-color:white;background-color:black" value="inch">inch</option>
                                                   <!-- <input type="radio" onclick="enableRadio('scm')" name="unit" id="sinch" style="background-color:RGB(190, 157, 147 );  height: 40%;  display: inline;">inch
                                                   <input type="radio" onclick="enableRadio('sinch')" name="unit" id="scm" style="background-color:RGB(190, 157, 147 );  height: 40%;  display: inline;">cm -->
                                                   
                                                   
                                                   <br>

                                                   <input type="text" name="length" id="length" class="form-control" style="background-color:RGB(190, 157, 147 ); width: 30%; height: 40%;  display: inline;" placeholder="length" >

                                                   <input type="text" name="breadth" id="breadth" class="form-control" style="background-color:RGB(190, 157, 147 ); width: 30%; height: 40%; display: inline;" placeholder="breadth" >

                                                </div>
                                            </div>
                                            <div class="col-md-12 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Shipping Details</label>
                                                    <input type="text" name="shipping" id="shipping" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 lab ">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Some other Instructions</label>
                                                    <input type="text" name="instructions" id="instructions" class="form-control" style="background-color:RGB(190, 157, 147 )" placeholder="instructions"></textarea>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 lab " id="product-entry-container">
                                                <div class="form-group">
                                                    <a href = "#" onclick = "addAnotherProduct()">Add another Product </a>
                                                    <br>
                                                    <input type="file" id="image" accept="image/*" capture="camera" name="image" class="  custom-file-upload" placeholder="image">
                                                </div>
                                            </div> -->

                                            <!-- </div>   -->

                                            <div class="container " style ="background-color:rgb(248, 223, 171) ;">
                                            <div class="row " style="padding-top: 28px;">

                                        </div>    


                                            <div style="text-align: center;" class="col-md-12">
                                                <div class="form-group">
                                                    <button type = "submit" class="btn btn-dark">Add to Cart</button>
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