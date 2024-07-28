<!DOCTYPE html>
<html>
<head>
    <title>Total Artworks Value</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('artinsert1.jpg'); /* Add your background image path here */
            background-size: cover;
            background-position: center;
        }

        .container {
            padding: 25px; /* Adjusted padding to maintain proportions */
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 81%; /* Reduced width from 90% to 81% */
            max-width: 540px; /* Reduced from 600px by 10% */
            box-sizing: border-box;
            font-size: 19px; /* Decreased font size by 1 pixel */
        }

        hr {
            border: none;
            border-top: 2px solid #3366cc;
            margin: 30px 0;
        }

        label {
            font-weight: bold;
            font-size: 21px; /* Decreased font size by 1 pixel */
            font-family: 'Verdana', sans-serif;
            margin-bottom: 8px;
            display: block;
        }

        .value-container {
            text-align: center;
            margin: 20px 0;
        }

        .value {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <hr>

    <div class="value-container">
        <label for="total-value">Total Value of All Artworks:</label>
        <div class="value"><?php
        // Database credentials
        $servername = "database-1.clusesm8k1pc.ap-south-1.rds.amazonaws.com";
$username = "root";
$password = "mysql-123"; // replace with your password
$dbname = "agms";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Call function
        $result = $conn->query("SELECT totalartworkprice() as Total_Value_of_All_the_Artwork");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Total_Value_of_All_the_Artwork"];
            }
        } else {
            echo "No results found";
        }
        $conn->close();
        ?></div> <!-- Replace $total_value with the PHP variable that holds the total value -->
    </div>

    <hr>
</div>

</body>
</html>
