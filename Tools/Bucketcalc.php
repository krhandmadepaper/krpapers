<!DOCTYPE html>
<html>
<head>
<?php include "navbar.php"; ?>

    <title>Wet Pulp Weight Calculator</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Wet Pulp Weight Calculator</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border p-4 rounded bg-light">
            <div class="form-group">
                <label for="wet_weight">Wet Pulp Weight (in gm):</label>
                <input type="number" class="form-control" id="wet_weight" name="wet_weight" value="<?php echo isset($_POST['wet_weight']) ? $_POST['wet_weight'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="gsm">GSM:</label>
                <select class="form-control" id="gsm" name="gsm" required>
                    <option value="100">100 GSM</option>
                    <option value="120">120 GSM</option>
                    <option value="150">150 GSM</option>
                    <option value="180">180 GSM</option>
                    <option value="200">200 GSM</option>
                    <option value="250">250 GSM</option>
                    <option value="300">300 GSM</option>
                    <option value="350">350 GSM</option>
                    <option value="400">400 GSM</option>
                    <option value="450">450 GSM</option>
                    <option value="500">500 GSM</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
        <?php
        // Function to calculate dry weight based on GSM
        function calculate_dry_weight($gsm) {
            // Calculate dry weight in grams
            $dry_weight = $gsm * (34 * 0.0254) * (26 * 0.0254);

            return $dry_weight;
        }

        // Function to calculate the number of buckets required
        function calculate_bucket_count($dry_weight, $wet_weight) {
            // Calculate bucket count
            $bucket_count = $dry_weight / ($wet_weight * 0.35);

            return $bucket_count;
        }

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $wet_weight = floatval($_POST["wet_weight"]);
            $gsm = intval($_POST["gsm"]);

            // Calculate dry weight
            $dry_weight = calculate_dry_weight($gsm);

            // Calculate bucket count
            $bucket_count = calculate_bucket_count($dry_weight, $wet_weight);

            // Display the results
            echo '<div class="border p-4 mt-4 rounded bg-light">';
            echo '<h5 class="mb-4">Results</h5>';
            echo '<p class="mb-2">Wet Pulp Weight: ' . $wet_weight . ' gm</p>';
            echo '<p class="mb-2">GSM: ' . $gsm . '</p>';
            echo '<p class="mb-2">Dry Weight: ' . number_format($dry_weight, 2) . ' gm</p>';
            echo '<p>Number of Buckets Required: ' . number_format($bucket_count, 2) . '</p>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
