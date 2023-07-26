<!DOCTYPE html>
<html>
<head>
<?php include"navbar.php" ?>

    <title>Color Mixing Calculator</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .color-grid {
            width: 100%;
            height: 150px;
            border: 1px solid #ccc;
            background-color: #f8f9fa; /* New background color */
        }

        .selected-color {
            width: 40px;
            height: 40px;
            border: 1px solid #000;
            margin: 5px;
            float: left;
        }

        /* Custom CSS for output section */
        .output-section {
            background-color: #f0f0f0;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }

        /* Additional CSS for mobile responsiveness */
        @media (max-width: 768px) {
            .color-grid {
                height: 120px;
            }

            .output-section {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Color Mixing Calculator</h1>
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="colorPicker">Color:</label>
                        <input type="color" id="colorPicker" name="colorPicker" class="form-control" onchange="updateColor('colorPicker')">
                    </div>
                    <div class="form-group">
                        <label for="red">Red:</label>
                        <input type="range" id="redSlider" name="redSlider" min="0" max="255" class="form-control-range" oninput="updateSlider('redSlider', 'redText')" <?php if (isset($_POST["redSlider"])) { echo 'value="' . $_POST["redSlider"] . '"'; } ?>>
                        <input type="text" id="redText" name="redText" placeholder="0" class="form-control" oninput="updateInput('redSlider', 'redText')" <?php if (isset($_POST["redText"])) { echo 'value="' . $_POST["redText"] . '"'; } ?>>
                    </div>
                    <div class="form-group">
                        <label for="green">Green:</label>
                        <input type="range" id="greenSlider" name="greenSlider" min="0" max="255" class="form-control-range" oninput="updateSlider('greenSlider', 'greenText')" <?php if (isset($_POST["greenSlider"])) { echo 'value="' . $_POST["greenSlider"] . '"'; } ?>>
                        <input type="text" id="greenText" name="greenText" placeholder="0" class="form-control" oninput="updateInput('greenSlider', 'greenText')" <?php if (isset($_POST["greenText"])) { echo 'value="' . $_POST["greenText"] . '"'; } ?>>
                    </div>
                    <div class="form-group">
                        <label for="blue">Blue:</label>
                        <input type="range" id="blueSlider" name="blueSlider" min="0" max="255" class="form-control-range" oninput="updateSlider('blueSlider', 'blueText')" <?php if (isset($_POST["blueSlider"])) { echo 'value="' . $_POST["blueSlider"] . '"'; } ?>>
                        <input type="text" id="blueText" name="blueText" placeholder="0" class="form-control" oninput="updateInput('blueSlider', 'blueText')" <?php if (isset($_POST["blueText"])) { echo 'value="' . $_POST["blueText"] . '"'; } ?>>
                    </div>
                    <div class="form-group">
                        <label for="pulpWeight">Pulp Weight (in kg):</label>
                        <input type="number" id="pulpWeight" name="pulpWeight" min="0" step="0.01" class="form-control" <?php if (isset($_POST["pulpWeight"])) { echo 'value="' . $_POST["pulpWeight"] . '"'; } ?>>
                    </div>
                    <div class="form-group">
                        <label for="concentration">Concentration (%):</label>
                        <input type="number" id="concentration" name="concentration" min="0" max="100" step="0.01" value="100" class="form-control" <?php if (isset($_POST["concentration"])) { echo 'value="' . $_POST["concentration"] . '"'; } ?>>
                    </div>
                    <button type="submit" class="btn btn-primary">Calculate</button>
                </form>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="output-section">
                    <!-- Output will be displayed here -->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $red = isset($_POST["redSlider"]) ? (int)$_POST["redSlider"] : (isset($_POST["redText"]) ? (int)$_POST["redText"] : 0);
                        $green = isset($_POST["greenSlider"]) ? (int)$_POST["greenSlider"] : (isset($_POST["greenText"]) ? (int)$_POST["greenText"] : 0);
                        $blue = isset($_POST["blueSlider"]) ? (int)$_POST["blueSlider"] : (isset($_POST["blueText"]) ? (int)$_POST["blueText"] : 0);
                        $pulpWeight = isset($_POST["pulpWeight"]) ? (float)$_POST["pulpWeight"] : 0;
                        $concentration = isset($_POST["concentration"]) ? (float)$_POST["concentration"] : 100;

                        $C = 0;
                        $M = 0;
                        $Y = 0;
                        $K = 0;

                        if ($red + $green + $blue > 0) {
                            $R = $red / 255;
                            $G = $green / 255;
                            $B = $blue / 255;

                            $K = 1 - max($R, $G, $B);
                            $C = ($K == 1) ? 0 : (1 - $R - $K) / (1 - $K);
                            $M = ($K == 1) ? 0 : (1 - $G - $K) / (1 - $K);
                            $Y = ($K == 1) ? 0 : (1 - $B - $K) / (1 - $K);
                        }

                        $totalColorWeight = $pulpWeight * 1000; // Convert pulp weight to grams
                        $cyanWeight = $C * $totalColorWeight;
                        $magentaWeight = $M * $totalColorWeight;
                        $yellowWeight = $Y * $totalColorWeight;
                        $blackWeight = $K * $totalColorWeight;

                        // Calculate the weight of color for the specified concentration
                        $concentrationFactor = $concentration / 100;
                        $cyanWeight_concentration = $cyanWeight * $concentrationFactor;
                        $magentaWeight_concentration = $magentaWeight * $concentrationFactor;
                        $yellowWeight_concentration = $yellowWeight * $concentrationFactor;
                        $blackWeight_concentration = $blackWeight * $concentrationFactor;
                    ?>
                    <h2>CMYK Values:</h2>
                    <p>C: <?php echo ($C * 100); ?>%</p>
                    <p>M: <?php echo ($M * 100); ?>%</p>
                    <p>Y: <?php echo ($Y * 100); ?>%</p>
                    <p>K: <?php echo ($K * 100); ?>%</p>

                    <h2>Color Quantity Required for 100% Concentration (in grams):</h2>
                    <p>Cyan: <?php echo number_format($cyanWeight, 2); ?> g</p>
                    <p>Magenta: <?php echo number_format($magentaWeight, 2); ?> g</p>
                    <p>Yellow: <?php echo number_format($yellowWeight, 2); ?> g</p>
                    <p>Black: <?php echo number_format($blackWeight, 2); ?> g</p>

                    <h2>Color Quantity Required for <?php echo $concentration; ?>% Concentration (in grams):</h2>
                    <p>Cyan: <?php echo number_format($cyanWeight_concentration, 2); ?> g</p>
                    <p>Magenta: <?php echo number_format($magentaWeight_concentration, 2); ?> g</p>
                    <p>Yellow: <?php echo number_format($yellowWeight_concentration, 2); ?> g</p>
                    <p>Black: <?php echo number_format($blackWeight_concentration, 2); ?> g</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="color-grid mt-4" id="colorGrid">
            <!-- Color grid will be dynamically generated here -->
        </div>
        <div style="clear: both;"></div>
    </div>

    <script>
        function updateSlider(sliderId, inputId) {
            const slider = document.getElementById(sliderId);
            const input = document.getElementById(inputId);
            input.value = slider.value;
        }

        function updateInput(sliderId, inputId) {
            const slider = document.getElementById(sliderId);
            const input = document.getElementById(inputId);
            slider.value = input.value;
        }
        function updateColor(source) {
            let red, green, blue;

            if (source === 'colorPicker') {
                const colorPicker = document.getElementById('colorPicker');
                red = parseInt(colorPicker.value.substring(1, 3), 16);
                green = parseInt(colorPicker.value.substring(3, 5), 16);
                blue = parseInt(colorPicker.value.substring(5, 7), 16);
            } else if (source === 'redSlider' || source === 'redText') {
                red = document.getElementById('redSlider').value;
                document.getElementById('redText').value = red;
            } else if (source === 'greenSlider' || source === 'greenText') {
                green = document.getElementById('greenSlider').value;
                document.getElementById('greenText').value = green;
            } else if (source === 'blueSlider' || source === 'blueText') {
                blue = document.getElementById('blueSlider').value;
                document.getElementById('blueText').value = blue;
            }

            const colorGrid = document.getElementById('colorGrid');
            colorGrid.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>