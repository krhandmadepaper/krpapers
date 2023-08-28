
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
    
    <!-- Additional CSS -->
    <style>
        .details-column {
            word-wrap: break-word;
        }
    </style>
  </head>
  <body style="background-color: rgba(242, 177, 153, .9);">
    <div class="container" style="padding-top: 50px;">
      <div class="table-responsive">
        <table class="table table-hover table-light">

          <thead>
            <a class="btn btn-danger" href="javascript:history.back()">Previous</a>
            <tr>
              <th scope="col">Heading</th>
              <th scope="col">Details</th>
              <th scope="col">Assignment Date</th>
              <th scope="col">Completion Date</th>
              <th scope="col">Total Working Days</th>
              <th scope="col">Status</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $session = $_SESSION['user_id'];
              include "../Home/database/conn.php";
              if ($con) {
                $sql = "SELECT * FROM `tasks` where assigned_to = '$session'";
                $result = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_assoc($result)) {
            ?>
                  <tr>
                    <td><?php echo ($data["heading"]); ?></td>
                    <td>
                      <div class="details-column"><?php echo ($data["detail"]); ?></div>
                    </td>
                    <td><?php echo date('d-m-Y', strtotime($data["assigned_date"])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($data["exp_comp_date"])); ?></td>
                    <td><?php
                            // Convert the date strings to DateTime objects
                            $expCompDate = new DateTime($data["exp_comp_date"]);
                            $assignedDate = new DateTime($data["assigned_date"]);

                            // Calculate the difference between the two dates
                            $interval = $expCompDate->diff($assignedDate);

                            // Get the difference in days
                            $daysDifference = $interval->days;

                            // Output the difference
                            echo $daysDifference;
                        ?>
                    </td>
                    <td>
                        <?php $status=$data["completion_status"]; 
                            if ($status){
                            echo "completed";
                            }
                            else{
                            echo "In Progress";
                            }
                        ?>
                    </td>
                  </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

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