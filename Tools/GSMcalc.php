<!DOCTYPE html>
<html>
<head>
<?php include "navbar.php"; ?>

    <title>GSM Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">GSM Calculator</h2>
        <form method="post" action="">
            <div class="form-row">
                <div class="col">
                    <label for="length">Length:</label>
                    <input type="text" name="length" id="length" class="form-control" required>
                </div>
                <div class="col">
                    <label for="width">Width:</label>
                    <input type="text" name="width" id="width" class="form-control" required>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="unit">Unit:</label>
                <select name="unit" id="unit" class="form-control">
                    <option value="cm">cm</option>
                    <option value="inch">inch</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="weight_grams">Weight (grams):</label>
                <input type="text" name="weight_grams" id="weight_grams" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-3">Calculate GSM</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $length = $_POST['length'];
            $width = $_POST['width'];
            $unit = $_POST['unit'];
            $weight_grams = $_POST['weight_grams'];

            // Convert length and width to cm
            if ($unit === 'inch') {
                $length = ($length != '') ? floatval($length) * 2.54 : 0; // 1 inch = 2.54 cm
                $width = ($width != '') ? floatval($width) * 2.54 : 0; // 1 inch = 2.54 cm
            } else {
                $length = ($length != '') ? floatval($length) : 0;
                $width = ($width != '') ? floatval($width) : 0;
            }

            $weight_grams = ($weight_grams != '') ? floatval($weight_grams) : 0;

            // Calculate total area in square meters
            $total_area_m2 = ($length / 100) * ($width / 100);

            // Calculate GSM
            if ($total_area_m2 > 0) {
                $gsm = $weight_grams / $total_area_m2;
                echo "<p class='mt-3'><strong>GSM: " . round($gsm, 2) . " grams/square meter</strong></p>";
            } else {
                echo "<p class='mt-3'><strong>Error: Please enter valid length and width values.</strong></p>";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
