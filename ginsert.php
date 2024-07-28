<?php
$servername = "database-1.cn4cayms2aon.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "mysql-123"; // replace with your password
$dbname = "agms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// SQL to create table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS gallery (
    GID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LOCATION VARCHAR(30) NOT NULL,
    GNAME VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";
if ($conn->query($createTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}
if (isset($_POST['gallery_ID']) && isset($_POST['Gallery_name']) && isset($_POST['Gallery_location'])) {
    $gallery_ID = $_POST['gallery_ID'];
    $Gallery_name = $_POST['Gallery_name'];
    $Gallery_location = $_POST['Gallery_location'];

    $sql = "INSERT INTO gallery (GID, LOCATION, GNAME) VALUES ('$gallery_ID', '$Gallery_location', '$Gallery_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>