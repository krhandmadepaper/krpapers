<?php
    $supplier = $_POST['supplier'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $citytrans = $_POST['citytrans'];
    $localtrans = $_POST['localtrans'];
    $gst = $_POST['gst'];
    $filename =$_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../image/" . $filename;
    include "../database/conn.php";
    if($con)
{
    $sql = "INSERT INTO `stock_fulfilment_history`(`new_id`, `sup_id`, `item`, `quantity`, `rate`, `transport_city`, `transport_local`, `gst`, `total`, `image`) 
    VALUES ('','$supplier','$item','$quantity','$rate','$citytrans','$localtrans','$gst',($quantity*$rate)+$citytrans+$localtrans+$gst,'$filename')";
    $result = mysqli_query($con,$sql);
    if($result)
    {    
        if (move_uploaded_file($tempname, $folder)) {
            ?>
            <script>
            window.alert("Data Added Successfully");
            window.location.href = "../index.php";
            </script>
            <?php
            } else {
                ?>
            <script>
            window.alert("Bill Uploading failed");
            window.location.href = "../add_incoming_raw_material.php";
            </script>
            <?php
            }
    }
    else
    {
        ?>
        <script>
        window.alert("Adding data failed");
        window.location.href = "../add_incoming_raw_material.php";
        </script>
        <?php
    }
}
else
{
    ?>
            <script>
            window.alert("Database Connection failed");
            window.location.href = "../index.php";
            </script>
            <?php
}?>