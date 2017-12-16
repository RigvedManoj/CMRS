<?php
session_start();
$username = mysql_real_escape_string($_POST['userName']);
$password = mysql_real_escape_string($_POST['password']);
$servername = "localhost:3307";
$username = "root";//enter mysql username
$password = "";//enter mysql password
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysql_select_db("hospital") or die("Cannot connect to database");
$query = mysql_query("SELECT * from users WHERE name='$username'");
$exists = mysql_num_rows($query);

$table_users = "";
$table_password = "";
if($exists > 0)
	{
		while($row = mysql_fetch_assoc($query))
		{
			$table_users = $row['name'];
			$table_password = $row['password'];

		}
		if(($username == $table_users) && ($password == $table_password))
			{	if($password == $table_password)
				{
					$_SESSION['user'] = $username;
					echo "Logged in succesfully";
				}

		    }
		 else
		 {
		Print '<script>alert("Incorrect Password!");</script>';
	    Print '<script>window.location.assign("dLogin.html");</script>';
		   }

	}

	else
	{
		Print '<script>alert("Incorrect Username!");</script>';
		Print '<script>window.location.assign("dLogin.html");</script>';
	}
?>
