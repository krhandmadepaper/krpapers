<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type'] === 'Admin') {
    // The user is logged in as an Admin, show the dashboard content for Admin
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <title>Daily Usage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php include "navbar.php"; ?>
  </head>
  <body style ="background-color:rgba(242, 177, 153, .9) ;" >
      <div class="container" style="padding-top:50px;">

  <table class="table table-hover table-light">

            <thead>
            <!-- <a style= "background-color:rgb(233,154,125);font-color:black" class="col-xl-2 nav-link previous " href="javascript:history.back()">Previous</a> -->
            <a class="btn btn-danger" href="javascript:history.back()">Previous</a>
 
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Hoisery</th>
                <th scope="col">Ntbt</th>
                <th scope="col">Bleech</th>

                </tr>
            </thead>
            <tbody>
            <?php
    include "database/conn.php";
        if($con)
    {
            $sql = "SELECT * FROM `daily_usage`"; 
            $result = mysqli_query($con,$sql);
            while($data = mysqli_fetch_assoc($result))
        { ?>
                <tr>
                
                <td><?php echo date('jS F, Y', strtotime($data["date"])); ?></td>
                <td><?php echo date('g:i A', strtotime($data["time"] )); ?></td>
                <td><?php echo $data["hoisery"] ?>   KG</td>
                <td><?php echo $data["ntbt"] ?>   KG</td>
                <td><?php echo $data["bleech"] ?>   KG</td>
                </tr>
            </tbody>
            <?php 
        } 
    }
?>
</div>

</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php
} else {
    header("Location: ../login/login.php"); // Redirect to the login page if not logged in or not an Admin
    exit();
}
?>