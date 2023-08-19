<?php
  require_once 'connection.php';
  $num=$_GET['num'];
$query="DELETE FROM transport WHERE num='".$num."'";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>