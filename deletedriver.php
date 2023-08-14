<?php
require_once "connection.php";
$name=$_GET['name'];
$query="DELETE FROM driver WHERE name='".$name."'";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>