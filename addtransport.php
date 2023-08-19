<?php
require_once "connection.php";
$num=$_POST['num'];
$location=$_POST['location'];
$time=$_POST['time'];
$drivernumber=$_POST['nb'];
$query="INSERT INTO transport VALUES($num,'$location','$time','$drivernumber')";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>