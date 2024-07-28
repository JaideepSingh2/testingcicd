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

if (isset($_POST['artid']) && isset($_POST['title']) && isset($_POST['year']) && isset($_POST['price']) && isset($_POST['custid']) && isset($_POST['G_ID']) && isset($_POST['artistid']) && isset($_POST['E_ID'])) {
    $artid = $_POST['artid'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $custid = $_POST['custid'];
    $G_ID = $_POST['G_ID'];
    $artistid = $_POST['artistid'];
    $E_ID = $_POST['E_ID'];

    // Insert into artwork table
    $sql = "INSERT INTO artwork (ARTID, TITLE, YEAR, PRICE, CUSTID, GID) VALUES ('$artid', '$title', '$year', '$price', '$custid', '$G_ID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully in artwork table";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Insert into artwork_exhibition table
    $sql = "INSERT INTO artwork_exhibition (ARTID, ARTISTID, EID) VALUES ('$artid', '$artistid', '$E_ID')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully in artwork_exhibition table";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>