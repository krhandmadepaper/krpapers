
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="container">
      <div style="padding-top:50px;">

  <table class="table table-hover table-dark">

            <thead>
                <tr>
                <th scope="col">ID</th>
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
                
                <td><?php echo $data["d_id"] ?></td>
                <td><?php echo $data["date"] ?></td>
                <td><?php echo $data["time"] ?></td>
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

