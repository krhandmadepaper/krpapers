<?php
    // $date = $_POST['date'];
    // $time = $_POST['time'];
    $hoisery = $_POST['hoisery'];
    $ntbt = $_POST['ntbt'];
    $bleech = $_POST['bleech'];
    include "../database/conn.php";
    if($con)
{
    $sql = "INSERT INTO `daily_usage`(`date`, `time`, `hoisery`, `ntbt`, `bleech`) VALUES (now(),now(),'$hoisery','$ntbt','$bleech')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        $sql = "UPDATE `available_items` SET `hoisery`=hoisery-$hoisery, `ntbt`=ntbt-$ntbt, `bleech`=bleech-$bleech";
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
            window.location.href = "../add_daily_data.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
            <script>
            window.alert("Adding Daily Stock failed");
            window.location.href = "../add_daily_data.php";
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