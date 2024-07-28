<!DOCTYPE html>
<html>
<head>
    <title>Delete from Exhibition</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
body {
    font-family: 'Georgia', serif;
    background: url('delete.jpg') no-repeat center center fixed; 
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
    color: #000;
    font-size: 1.2em;
}

button {
    width: 100%;
    height: 50px;
    background: #800080;
    border: none;
    color: #fff;
    font-size: 1.2em;
    cursor: pointer;
    transition: 0.3s ease;
    margin-bottom: 10px;
}

button:hover {
    background: #9932CC;
    color: #000;
}

#message {
    text-align: center;
    margin-top: 20px;
    font-size: 1.2em;
}
</style>
<body>
    <h1>Delete from Exhibition Table</h1>
    <form id="deleteForm" method="post">
        <div><label for="EID">Enter Exhibition ID:</label><input type="text" id="EID" name="EID" placeholder="EID"></div>
        <button type="submit" id="deleteButton">DELETE</button>
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

            $a=$_POST['EID'];

            if($a!="")
            {
                $sql1 = "SELECT * from exhibition where EID='$a'";
                $result = mysqli_query($con,$sql1);

                if(mysqli_num_rows($result)>0)
                {
                    $sql3="DELETE from exhibition where EID='$a'"; 
                    mysqli_query($con,$sql3);
                    echo "<b>Record with EID = $a is deleted successfully.<b>";
                }
                else
                {
                    echo "<b><br> Record '$a' was not found in database.<b>" ;
                }
            }else{
                echo "<b>EID Field is Empty</b>";
            }
            $con->close();
        }
        ?>
    </div>
</body>
</html>