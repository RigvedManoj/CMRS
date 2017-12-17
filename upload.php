<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();
$servername = "localhost";
$username = "root";// Enter mysql username
$password = "AthlonY2";// Enter mysql password
$dbname = "hospital";
// Create connection
$rec=$_POST['records'];
$name=$_SESSION['user'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE PAT_REC SET record='$rec' WHERE name='$name'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
}
else {
  $stmt = $conn->prepare("INSERT INTO PAT_REC (name, record) VALUES (?, ?)");
  $stmt->bind_param("ss", $new_name, $new_rec);
  // set parameters and execute
  $new_name = $name;
  $new_rec = $rec;
  $stmt->execute();

  $stmt->close();

}

  $conn->close();}

?>
<html>
<head>
    <title>UPLOAD RECORDS</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="text/javascript"
            src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <style>
    .card {position:absolute;
    left:25%;
    top:20%;
  	width: 50%;
    height:50%;
  	padding: 12px;
  	display: table;
  	margin: 0 auto;
    word-wrap: break-word;
       }

  .card-content {
           align-content: center;
       }

    </style>
</head>
<body background="background.png">

<div id="medrec">
  <div class="card col s12 m12">
    <div class="card-content">
      <form id="form" method="post" >
        <input type="file" id="files" name="files[]" multiple />
          <textarea id="r" name="records" class="active validate materialize-textarea"  onkeyup="textAreaAdjust(this)" style="overflow:hidden" >Upload records</textarea>
        <input type="submit" value="UPLOAD">
      </form>
    </div>
    <div class="card-action">
      <a href="pProfile.php">BACK</a>
    </div>
  </div>
</div>
</body>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files;
    f=files[0];
    var reader = new FileReader();
    reader.onload = (function(theFile) {
        return function(e) {
        jQuery('#r').val(e.target.result);
        };
      })(f);

      reader.readAsText(f);

  }
  function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
</html>
