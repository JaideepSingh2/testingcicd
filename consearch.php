<!DOCTYPE html>
<html>
<head>
    <title>Search Contact</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
body {
    font-family: 'Georgia', serif;
    background: url('search.jpg') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin: 0;
    padding: 0;
    color: #fff;
}

h1 {
    text-align: center;
    padding: 20px;
    font-size: 2.5em;
    text-shadow: 2px 2px 4px #000;
    color:cyan;
}

form {
    width: 300px;
    margin: 0 auto;
    background: rgba(0, 0, 0, 0.7);
    padding: 20px;
    border-radius: 15px;
}

div {
    margin-bottom: 20px;
    position: relative;
}

div label {
    font-size: 1.5em;
    margin-bottom: 10px;
    display: block;
}

input[type=text] {
    width: 100%;
    height: 40px;
    padding: 10px;
    box-sizing: border-box;
    background: rgba(255, 255, 255, 0.7);
    outline: none;
    border: none;
    color:darkslategray;
    font-size: 1.2em;
}

button {
    width: 100%;
    height: 50px;
    background: cyan;
    border: none;
    color: #fff;
    font-size: 1.2em;
    cursor: pointer;
    transition: 0.3s ease;
    margin-bottom: 10px;
}

button:hover {
    background: #008080;
    color: #000;
}

#message {
    text-align: center;
    margin-top: 20px;
    font-size: 1.2em;
}

table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.75);
    border-radius: 10px;
    color: black;
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

.error-message {
    color: brown;
}
</style>
<body>
    <h1>Search from Contacts Table</h1>
    <form id="searchForm" method="post">
        <div><label for="CUSTID">Enter Customer ID:</label><input type="text" id="CUSTID" name="CUSTID" placeholder="CUSTID"></div>
        <button type="submit" id="searchButton">SEARCH</button>
        <button type="reset">RESET</button>
    </form>
    <div id="message">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $servername = "database-1.clusesm8k1pc.ap-south-1.rds.amazonaws.com";
$username = "root";
$password = "mysql-123"; // replace with your password
$dbname = "agms";

            $con = new mysqli($servername, $username, $password, $dbname);

            $a=$_POST['CUSTID'];

            if($a!="")
            {
                $sql1 = "SELECT * from contacts where CUSTID='$a'";
                $result = mysqli_query($con,$sql1);

                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_assoc($result);
                    echo "<table>";
                    echo "<tr><th>CUSTID</th><th>PHONE</th></tr>";
                    echo "<tr><td>" . $row["CUSTID"] . "</td><td>" . $row["PHONE"] . "</td></tr>";
                    echo "</table>";
                }
                else
                {
                    echo "<b class='error-message'><br> Record not found.<b>" ;
                }
            }else{
                echo "<b class='error-message'>CUSTID Field is Empty</b>";
            }
            $con->close();
        }
        ?>
    </div>
</body>
</html>