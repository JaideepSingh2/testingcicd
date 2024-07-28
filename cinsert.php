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

if (isset($_POST['custid']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dob']) && isset($_POST['street']) && isset($_POST['city']) && isset($_POST['G_ID'])) {
    $custid = $_POST['custid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $G_ID = $_POST['G_ID'];

    $sql = "INSERT INTO customer (CUSTID, FNAME1, LNAME1, DOB, STREET_ADDRESS, CITY, GID) VALUES ('$custid', '$fname', '$lname', '$dob', '$street', '$city', '$G_ID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>