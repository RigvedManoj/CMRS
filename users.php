<?php
$servername = "localhost";
$username = "root";
$password = "AthlonY2";
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
$username = "root";
$password = "AthlonY2";
$dbname = "hospital";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "CREATE TABLE PATIENTS(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
pass VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo  "Table SIGNUP created successfully  ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$conn->close();
?>
