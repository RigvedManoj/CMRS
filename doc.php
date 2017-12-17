<?php
session_start();
if(empty(  $_SESSION['doctor']))
{
header("Location:pProfile.php");
}
else {
$doc=$_SESSION['doctor'];
$patient=$_SESSION['patient'];
}
?>
<a>hello <?php echo $patient?> you visited <?php echo $doc?></a>
