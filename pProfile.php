<?php
session_start();
if(empty($_SESSION['user']))
{
header("Location:index.html");
}
else {
$name=$_SESSION['user'];
}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href=profile.css>
</head>
  <body id="body">
   <ul>
   <h2>PROFILE</h2>
      <li>
         <a><?php echo $name?></a>
          <ul class="dropdown">
              <li><a href="index.html">Log out</a></li>
          </ul>
      </li>
   </ul>
