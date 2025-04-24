<!DOCTYPE html>
<html>
<head>
    <title>Travel Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <style>
        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Container for the form */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form header styling */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Label styling */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Select input styling */
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        /* Submit button styling */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Disabled select styling */
        select:disabled {
            background-color: #f2f2f2;
            cursor: not-allowed;
        }

        /* Placeholder text in disabled select styling */
        select:disabled option {
            color: #666;
        }
    </style>
</head>
<body>
    <h1 style="margin-top:25vh;">Travel Details</h1>
    <form action="process.php" method="POST" style="width: 70vw;margin: 0 auto;">
        <label for="region">Select a region:</label>
        <select name="region" id="region">
            <option value="">Select Region</option>
            <?php
            $con = new mysqli("localhost", "root", "", "voyagevista");
            $qr = "SELECT * FROM regions";
            $qr1 = $con->query($qr);

            while ($data1 = $qr1->fetch_row()) {
                echo "<option value='{$data1[1]}'>{$data1[1]}</option>";
            }
            ?>
        </select><br>

        <label for="state">Select a state:</label>
        <select name="state" id="state" disabled>
            <option value="">Select State</option>
        </select><br>

        <label for="city">Select a city:</label>
        <select name="city" id="city" disabled>
            <option value="">Select City</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>

    <script>
        // JavaScript to fetch and populate the state dropdown based on the selected region
        $('#region').change(function () {
            var selectedRegion = $(this).val();

            // Enable the state dropdown
            $('#state').prop('disabled', false);

            // Use AJAX to fetch states based on the selected region
            $.ajax({
                url: 'get_states.php', // PHP script to fetch states
                type: 'POST',
                data: { selectedRegion: selectedRegion },
                success: function (data) {
                    $('#state').html(data);
                }
            });
        });

        // JavaScript to fetch and populate the city dropdown based on the selected state
        $('#state').change(function () {
            var selectedState = $(this).val();

            // Enable the city dropdown
            $('#city').prop('disabled', false);

            // Use AJAX to fetch cities based on the selected state
            $.ajax({
                url: 'get_cities.php', // PHP script to fetch cities
                type: 'POST',
                data: { selectedState: selectedState },
                success: function (data) {
                    $('#city').html(data);
                }
            });
        });
    </script>
</body>
</html>
