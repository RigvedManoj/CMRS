<?php
$servername = "localhost";
$username = "root";// Enter mysql username
$password = "AthlonY2";// Enter mysql password
$dbname = "hospital";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,mail FROM USERS"; ?>
