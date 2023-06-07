 <?php
include "connection.php";
$id=$_GET['id'];
$sql="DELETE FROM cars Where id='$id'";
$query=mysqli_query($con,$sql);
header('location: ../HTML/admin_panel.php');

?> 