<?php
    $date = $_POST['date'];
    $hoisery = $_POST['hoisery'];
    $ntbt = $_POST['ntbt'];
    $bleech = $_POST['bleech'];
    $reciever = $_POST['reciever'];
    include "../database/conn.php";
    if($con)
{
    $sql = "INSERT INTO `add_stock`(`as_id`, `date`, `hoisery`, `ntbt`, `bleech`, `reciever`)
     VALUES ('','$date','$hoisery','$ntbt','$bleech','$reciever')";
    $result = mysqli_query($con,$sql);
    //echo $sql;
    if($result)
    {
        $sql = "UPDATE `available_items` SET `hoisery`=hoisery+$hoisery, `ntbt`=ntbt+$ntbt, `bleech`=bleech+$bleech";
        $result1 = mysqli_query($con,$sql);
        if($result1)
        {
            ?>
            <script>
            window.alert("Data Added Successfully");
            window.location.href = "../index.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
            window.alert("Updating Available Stock failed");
            window.location.href = "../add_stock.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
            <script>
            window.alert("Adding Stock failed");
            window.location.href = "../add_stock.php";
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