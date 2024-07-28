<!DOCTYPE html>
<html>
<head>
    <title>Exhibitions by Gallery</title>
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
            margin:auto;
        }

        h1 {
            text-align: center;
            color: #3366cc;
            font-size: 37px; /* Decreased font size by 1 pixel */
            border-bottom: 2px solid #3366cc;
            padding-bottom: 15px;
            margin-bottom: 30px;
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

        input[type=text] {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 19px; /* Decreased font size by 1 pixel */
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background for text fields */
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 8px;
            font-size: 21px; /* Decreased font size by 1 pixel */
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .registerbtn {
            background-color: #3366cc;
            color: white;
        }

        .registerbtn:hover {
            background-color: #254e7f;
        }

        .registerbtn1 {
            background-color: red;
            color: white;
        }
        .registerbtn1:hover {
            background-color: #cc0000;
        }
        /* Add styles for the table */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-family: 'Times New Roman', serif;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="content">
    <form action="" method="POST" class="container">
        <label for="galleryid">Gallery ID</label>
        <input type="text" placeholder="Enter Gallery ID" name="galleryid" required>

        <hr>

        <div class="btn-container">
            <button type="submit" class="btn registerbtn">SUBMIT</button>
            <button type="reset" class="btn registerbtn1">RESET</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $galleryid = $_POST["galleryid"];

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

        // Call stored procedure
        $result = $conn->query("CALL getexhibitionsbygallery($galleryid)");
        if ($result->num_rows > 0) {
            echo "<table><tr><th>EID</th><th>START_DATE</th><th>END_DATE</th><th>GID</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["EID"]."</td><td>".$row["START_DATE"]."</td><td>".$row["END_DATE"]."</td><td>".$row["GID"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<table><tr><td colspan='4'>No results found</td></tr></table>";
        }
        $conn->close();
    }
    ?>
</div>

</body>
</html>