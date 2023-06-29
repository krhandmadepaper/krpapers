<!doctype html>
<html lang="en">

<head>
    <title>Daily update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
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

<body>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="wrapper">
                        <div class="row justify-content-center">

                            <div class="col-lg-8">
                                <div class="contact-wrap">
                                    <h3 class="mb-4 text-center">Add Incoming Raw Material</h3>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div>
                                    <div id="form-message-success" class="mb-4 w-100 text-center">
                                    Add Incoming Raw Material
                                    </div>
                                    <form method="POST" action="backend/incoming_raw_back.php" enctype="multipart/form-data" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Supplier</label>
                                                    <select name='supplier'  class="form-control" style="font-color:black;" >
                                                        <?php 
                                                            include "database/conn.php" ;
                                                            $qry = "SELECT sup_id,supplier_name FROM `supplier`";
                                                            $result = mysqli_query($con,$qry);
                                                            while($row = mysqli_fetch_assoc($result))
                                                            {
                                                                ?>
                                                                <option value="<?php echo $row['sup_id'] ?>" selected><?php echo $row['supplier_name'] ?></option>
                                                                <?php 
                                                            }
                                                        ?>
                                                    </select>
                                                    <!-- <input type="text" name="supplier" class="form-control" placeholder="kg" required> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Item</label>
                                                    <input type="text" name="item" class="form-control" placeholder="Item" required>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Quantity</label>
                                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
                                                </div>
                                            </div>                                  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Rate</label>
                                                    <input type="text" name="rate" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Transport City</label>
                                                    <input type="text" name="citytrans" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">Transport Local</label>
                                                    <input type="text" name="localtrans" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label style="font-size:x-large;">GST</label>
                                                    <input type="text" name="gst" class="form-control" placeholder="kg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="files"  style="font-size:x-large;">Upload Bill</label>
                                                    <br>
                                                    <input type="file" id="files" accept="image/*" capture="camera" name="image" class="  custom-file-upload" placeholder="image" required>
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