
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <?php include "navbar.php"; ?>

</head>
<body>
  
    <div class="container mt-5">
    <a class="btn btn-danger"  href="javascript:history.back()">Previous</a>

        <h2>Create Task</h2>
        <form action="taskentryresponse.php" method="post">
        <div class="row">
            <div class="form-group col-xl-12">  
                <label for="heading">Heading:</label>
                <input type="text" class="form-control" name="heading" required>
            </div>
        </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea class="form-control" name="details" required></textarea>
            </div>
          <div class="row">
            <div class="form-group col-xl-4">
                <label for="assignedDate">Assigned Date:</label>
                <input type="date" class="form-control" name="assignedDate" required>
            </div>
            <div class="form-group col-xl-4">
                <label for="assignedTo">Assigned To:</label>
                <select class="form-control" name="assignedTo" style="font-color:black;" required>
                <?php 
                  include "../Home/database/conn.php" ;
                  $qry = "SELECT ID,Username FROM `login` where `Type` ='Admin'";
                  $result = mysqli_query($con,$qry);
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                  <option value="" selected disabled>Select Assigned To</option>
                  <option value="<?php echo $row['ID']; ?>" ><?php echo $row['Username'] ?></option>
                  <?php 
                  }
                ?> 
                </select> 
            </div>
            <div class="form-group col-xl-4">
                <label for="expCompletionDate">Expected Completion Date:</label>
                <input type="date" class="form-control" name="expCompletionDate" required>
            </div>
          </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
           
        </form>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
   =
</body>
</html>
