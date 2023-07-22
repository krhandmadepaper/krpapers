<?php
$supplier = $_POST['supplier'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$rate = $_POST['rate'];
$citytrans = $_POST['citytrans'];
$localtrans = $_POST['localtrans'];
$gst = $_POST['gst'];
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "../image/" . $filename;
include "../database/conn.php";

if ($con) {
    $sql = "INSERT INTO `stock_fulfilment_history`(`new_id`, `sup_id`, `item`, `quantity`, `rate`, `transport_city`, `transport_local`, `gst`, `total`, `image`) 
            VALUES ('','$supplier','$item','$quantity','$rate','$citytrans','$localtrans','$gst',($quantity*$rate)+$localtrans+$gst,'$filename')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (move_uploaded_file($tempname, $folder)) {
            // Use double equals for comparison, and enclose the statements within curly braces
            if ($item == 'hoisery') { //this will update value of hoisery in available data
                $sql1 = "UPDATE `available_items` SET `hoisery`=`hoisery`+$quantity";
                $result1 = mysqli_query($con, $sql1);
                if ($result1) {
                    ?>
                    <script>
                        window.alert("Data updation Successfull for Hoisery in Available stock");
                        window.location.href = "../add_incoming_raw_material.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        window.alert("Data updation failed in Available stock");
                        window.location.href = "../add_incoming_raw_material.php";
                    </script>
                    <?php
                }
            } elseif ($item == 'ntbt') {  //this will update vaue in available stocks
                $sql1 = "UPDATE `available_items` SET `ntbt`=`ntbt`+$quantity";
                $result1 = mysqli_query($con, $sql1);
                if ($result1) {
                    ?>
                    <script>
                        window.alert("Data updation Successfull for NTBT in Available stock");
                        window.location.href = "../add_incoming_raw_material.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        window.alert("Data updation failed in Available stock");
                        window.location.href = "../add_incoming_raw_material.php";
                    </script>
                    <?php
                }
            }
        } elseif ($item == 'bleech') {  //this will update vaule of bleech in available stocks
            $sql1 = "UPDATE `available_items` SET `bleech`=`bleech`+$quantity";
            $result1 = mysqli_query($con, $sql1);
            if ($result1) {
                ?>
                <script>
                    window.alert("Data updation Successfull for Bleech in Available stock");
                    window.location.href = "../add_incoming_raw_material.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    window.alert("Data updation failed in Available stock");
                    window.location.href = "../add_incoming_raw_material.php";
                </script>
                <?php
            }
        }

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
    } else {
        echo $sql;
        ?>
        <script>
            // window.alert("Adding data failed");
            // window.location.href = "../add_incoming_raw_material.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.alert("Database Connection failed");
        window.location.href = "../index.php";
    </script>
    <?php
}
?>
