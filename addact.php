<?php
require_once "connection.php";
$num=$_POST['numact'];
$activity=$_POST['activity'];
$query="INSERT INTO activities VALUES($num,'$activity')";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>