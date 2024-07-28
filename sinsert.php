<?php
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

if (isset($_POST['city']) && isset($_POST['state'])) {
    $city = $_POST['city'];
    $state = $_POST['state'];

    $sql = "INSERT INTO STATE (CITY, STATE) VALUES ('$city', '$state')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>