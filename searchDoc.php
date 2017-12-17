<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

session_start();
$doc=$_POST['doc'];
$servername = "localhost";
$username = "root";// Enter mysql username
$password = "AthlonY2";// Enter mysql password
$dbname = "hospital";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,type FROM USERS";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $exist_name=$row["name"];
      $exist_type=$row["type"];
    if($doc==$exist_name && $exist_type=='doctor')
    {
      echo 'success';
      $_SESSION['doctor'] = $doc;
      exit();
    }
}
}
$conn->close();
}
