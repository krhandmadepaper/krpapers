<?php
include "database/conn.php";
if($con)
{
    $sql = "SELECT * FROM `available_items`"; 
    $result = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($result))
    {
    
?>
<!doctype html>
<html lang="en">

<head>
    <title>Available raw Material</title>
    


</head>

    <body>
    <div class="row">                                                                             
            <div class="col-md-4">
                <div class="form-group">
                    <label style="font-size:x-large;color:pink">Hoisery</label><br>
                        <label style="font-size:large;color:grey" ><?php echo $data['hoisery'];?>     KG</label>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="form-group">
                    <label style="font-size:x-large;color:pink">NTBT</label><br>
                        <label style="font-size:large;color:grey" ><?php echo $data['ntbt'];?>     KG</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label style="font-size:x-large;color:pink">Bleech</label><br>
                        <label style="font-size:large;color:grey" ><?php echo $data['bleech'];?>     KG</label>
                </div>
            </div>                                            
        </div>
    </body>

</html>
<?php }
    
}
?>