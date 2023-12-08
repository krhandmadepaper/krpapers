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
    
    <title>Cart</title>
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
 
            <div class="row" style="padding-top: 28px;padding-bottom: 10px;"></div>
            <tr>
                <th scope="col">Client Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">GSM</th>
                <th scope="col">Color</th>
                <th scope="col">Size Unit</th>
                <th scope="col">Length</th>
                <th scope="col">Breadth</th>
                <th scope="col">Shipping Details</th>
                <th scope="col">Other Instructions</th>

                </tr>
            </thead>
            <tbody>
            <?php
                                // Loop through each product cookie
                                $productCount = (int)$_COOKIE['product_count'];
                                for ($i = 1; $i <= $productCount; $i++) {
                                    $cookieName = 'product_' . $i;
                                    if (isset($_COOKIE[$cookieName])) {
                                        $productEntry = json_decode($_COOKIE[$cookieName], true);
                                        echo '<tr>';
                                        echo '<td>' . $productEntry['client_id'] . '</td>';
                                        echo '<td>' . $productEntry['product_name'] . '</td>';
                                        echo '<td>' . $productEntry['quantity'] . '</td>';
                                        echo '<td>' . $productEntry['gsm'] . '</td>';
                                        echo '<td>' . $productEntry['color'] . '</td>';
                                        echo '<td>' . $productEntry['unit'] . '</td>';
                                        echo '<td>' . $productEntry['length'] . '</td>';
                                        echo '<td>' . $productEntry['breadth'] . '</td>';
                                        echo '<td>' . $productEntry['shipping'] . '</td>';
                                        echo '<td>' . $productEntry['instructions'] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
            </div>

</table>


<div style="text-align: center;" class="col-md-12">
  <div class="form-group">
    <form method="post">
      <button type = "submit" class="btn btn-dark">Place Order</button>
    </form>
  </div>
</div>



<?php
  include "config.php";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if($con)
  {

    // Querying the database for the latest order id and increamenting it for the creation of next order id.
    $result = mysqli_query($con, "SELECT MAX(order_id) AS max_order_id FROM new_order_meta_data");
    $row = mysqli_fetch_assoc($result);
    $next_order_id = $row['max_order_id'] + 1;

    $sql1 = "INSERT INTO `new_order_meta_data`(`order_id`, `client_id`, `shipping_details`) VALUES ($next_order_id, '{$productEntry['client_id']}', '{$productEntry['shipping']}')";

    $result1 = mysqli_query($con,$sql1);

    $productCount = (int)$_COOKIE['product_count'];
    for ($j = 1; $j <= $productCount;) {
      $cookieName = 'product_' . $j;
      $productEntry = json_decode($_COOKIE[$cookieName], true);
      $sql2="INSERT INTO `new_order_details`(`order_id`, `product_name`, `colour`, `size_unit`, `length`, `breadth`, `quantity`, `gsm`, `instructions`) 
      VALUES ($next_order_id, '{$productEntry['product_name']}', '{$productEntry['color']}', '{$productEntry['unit']}', '{$productEntry['length']}', '{$productEntry['breadth']}', '{$productEntry['quantity']}', '{$productEntry['gsm']}', '{$productEntry['instructions']}')";
      $result2 = mysqli_query($con,$sql2);
      $j++;
    }
      if($result1 && $result2){

        for ($j = 1; $j <= $productCount; $j++) {
          $cookieName = 'product_' . $j;
          setcookie($cookieName, "", time() - 3600, '/');
        }
        setcookie('product_count', "", time() - 3600, '/');

          // echo "data entered";
          header("Location:submitted.php");
      }
      else{
          echo "fail";
      }
  
  }
}
?>




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