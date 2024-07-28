<!DOCTYPE html>
<html>
<head>
 <title>Exhibition</title>
 <style>
  body {
    font-family: 'Georgia', serif;
    background: url('display.jpg') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin: 0;
    padding: 0;
  }

  h1 {
    text-align: center;
    padding: 20px;
    color: #fff;
    text-shadow: 2px 2px 4px #000000;
  }

  table {
    width: 80%;
    margin: 0 auto;
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
  <h1>Contents of Exhibition Table</h1>
 <table>
 <tr>
  <th>Exhibition ID</th> 
  <th>Start Date</th> 
  <th>End Date</th>
  <th>Gallery ID</th>
 </tr>
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

$sql = "SELECT * from exhibition";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["EID"]. "</td><td>" . $row["START_DATE"]. "</td><td>". $row["END_DATE"]. "</td><td>". $row["GID"]. "</td></tr>";
   }
} else { 
   echo "<tr><td colspan='4'>No results found</td></tr>"; 
}

$conn->close();
?>
</table>
</body>
</html>