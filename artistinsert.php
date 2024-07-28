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

if (isset($_POST['style']) && isset($_POST['fname1']) && isset($_POST['lname1']) && isset($_POST['birthplace'])) {
    $style = $_POST['style'];
    $fname = $_POST['fname1'];
    $lname = $_POST['lname1'];
    $birthplace = $_POST['birthplace'];

    $sql = "INSERT INTO ARTIST (STYLE, FNAME, LNAME, BIRTH_PLACE) VALUES ('$style', '$fname', '$lname', '$birthplace')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>