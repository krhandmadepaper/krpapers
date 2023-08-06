<?php
$productname = $_POST['pname'];
$cost = $_POST['cost'];
$packof = $_POST['packof'];
$gsm = $_POST['gsm'];
$color = $_POST['color'];
$size   = $_POST['size'];
$description = $_POST['description'];
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "../../Main/assets/img/products/" . $filename;
include "../database/conn.php";
    if ($con) 
    {
        $sql = "INSERT INTO `products`(`product_name`, `description`, `cost`, `packof`, `gsm`, `color`, `size`, `image`) 
        VALUES ('$productname','$description','$cost','$packof','$gsm','$color','$size','$filename')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                if (move_uploaded_file($tempname, $folder)) {
                    ?>
                    <script>
                        window.alert("Adding data Succcessfull");
                        window.location.href = "../addproduct.php";
                    </script>
                    <?php
                }      
                else {
                    ?>
                   
                    <?php
                }      
            }
            else {
                ?>
                <script>
                    window.alert("Uploading data failed");
                    window.location.href = "../addproduct.php";
                </script>
                <?php
            }
    }
    ?>
    <script>
        window.alert("Connection failed");
        window.location.href = "../addproduct.php";
    </script>
    <?php
?>
