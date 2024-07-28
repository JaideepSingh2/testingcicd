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

if (isset($_POST['exhibitionid']) && isset($_POST['galleryid']) && isset($_POST['startdate']) && isset($_POST['enddate'])) {
    $exhibitionid = $_POST['exhibitionid'];
    $galleryid = $_POST['galleryid'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $sql = "INSERT INTO exhibition (EID, START_DATE, END_DATE, GID) VALUES ('$exhibitionid', '$startdate', '$enddate', '$galleryid')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>