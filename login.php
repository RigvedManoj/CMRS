<?php
$servername = "localhost:3307";
$username = "root";// Enter mysql username
$password = "";// Enter mysql password
$dbname = "hospital";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$pass=$_POST['password'];
$name=$_POST["userName"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$sql = "SELECT name,pass FROM USERS";
$result = $conn->query($sql);
$k=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $stored_name=$row["name"];
      $stored_pass=$row['pass'];
      if($name==$stored_name && password_verify($pass,$stored_pass))
    {
      $k=0;
      $_SESSION['user'] = $name;
      echo "Success";
      exit();
    }
    }
}
if($k==1)
{
  echo "fail";
  exit();
}
}
?>
