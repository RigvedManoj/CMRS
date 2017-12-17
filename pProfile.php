<?php
session_start();
if(empty(  $_SESSION['patient']))
{
header("Location:index.html");
}
else {
$name=$_SESSION['patient'];
}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href=profile.css>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<style>
#card2{
  position: absolute;
left:35%;
right:50%;

width:30%;

}
.card{
  position: absolute;
  left:50%;
  right:50%;
  height:25%;
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
  top:55%;
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
      <div class="col s12 m6">
        <div class="card" id="card2">
          <form method="post" id="search_form" action="/search">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix" >search</i>
                     <label for="search_doc" class="active">search for doctors</label>
                    <input name="search_doc" id="search_doc" class="validate" required="true" aria-required="true" type="text">
                </div>
              </div>
              <div class="row">
                  <div class="input-field col s6 m4 offset-m4 offset-s3">
                      <input class="btn" value="search" type="button" onclick="search();">
                  </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col m4 s12" onclick="window.location='patient.php';">
        <div class="card profile-card teal lighten-2">
          <div class="card-content">
            <span class="card-title black-text" style="text-align: center;">view your record</span>
          <img class="image-circle" src="download.png" height="150" width="150" alt=""/>
          <h3 style="margin: 0 auto;"><?php echo $name?></h3>

        </div>
      </div>
    </div>
  </div>
</body>
<script>
function search(){

  console.log($('#search_doc').val());
  var doc=$('#search_doc').val();
  $.ajax({
      type: "POST",
      url: "searchDoc.php",
      data: {doc:doc},
      success: function(data) {
          console.log(data);

if(data=='success')
{
                var url = window.location.href;
                url = url.replace(/\/[^\/]*$/, '/doc.php');
                window.location.href = url;
              }
        },


      fail: function(data) {
          console.log('There is an error!');
      }
  });

}
</script>
</html>
