<?php
$servername = "localhost";
$username = "root";//enter mysql username
$password = "AthlonY2";//enter mysql password
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE hospital";
if ($conn->query($sql) === TRUE) {
} else {
}
$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";//enter mysql username
$password = "AthlonY2";//enter mysql password
$dbname = "hospital";
// Create connection


$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql="DROP TABLE USERS";
mysqli_query($conn, $sql);
$sql = "CREATE TABLE USERS(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(100) NOT NULL,
mail VARCHAR(70) NOT NULL,
dob VARCHAR(20) NOT NULL,
type VARCHAR(10) NOT NULL,
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo  "Table USERS created successfully  ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$conn->close();
?>
