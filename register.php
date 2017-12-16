<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$error=0;
$name=$_POST['userName'];
$pass1=$_POST["password"];
$pass=password_hash($pass1,PASSWORD_BCRYPT);
$servername = "localhost:3307";
$username = "root";// Enter mysql username
$password = "";// Enter mysql password
$dbname = "hospital";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name FROM PATIENTS";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $exist_name=$row["name"];
    if($name==$exist_name)
    {
      $error=1;
      echo "This username is already taken";
    }
}
}
// prepare and bind
if($error==0)
{
$stmt = $conn->prepare("INSERT INTO PATIENTS (name, pass) VALUES (?, ?)");
$stmt->bind_param("ss", $new_name, $new_pass);
// set parameters and execute
$new_name = $name;
$new_pass = $pass;
$stmt->execute();
//$_SESSION['username']=$name;
$stmt->close();
$conn->close();
echo "registered succesfully";
}
}
?>
