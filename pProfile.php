<?php
session_start();
if(empty(  $_SESSION['user']))
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<style>
.card{
  position: absolute;
  left:50%;
  right:50%;
  height:40%;
  width:20%;
}
h3 {
	display: table;
	margin: 0 auto;
}
.footer-company {
	font-size: 1.64rem;
  line-height: 110%;
	display: table;
	margin: 0 auto;
}
.image-circle {
	display: table;
	width:150px;
	height:150px;
	margin: 0 auto;
	border-radius: 50%;
}
.profile-card {
  position:absolute;
  left:35%;
  top:40%;
	width: 30%;
	padding: 12px;
	display: table;
	margin: 0 auto;
}
</style>
</head>
  <body id="body">

   <ul>
   <h2>PROFILE</h2>
      <li>
         <a><?php echo $name?></a>
          <ul class="dropdown">
              <li><a href="upload.php">Update records</a></li>
              <li><a href="index.html">Log out</a></li>
          </ul>
      </li>
   </ul>
   <div class="container">
    <div class="row">
      <div class="col m4 s12" onclick="window.location='patient.html';">
        <div class="card profile-card teal lighten-2">
          <img class="image-circle" src="download.png" height="150" width="150" alt=""/>
          <h3 style="margin: 0 auto;"><?php echo $name?></h3>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
