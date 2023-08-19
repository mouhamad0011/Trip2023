<?php
require_once "connection.php";
$name=$_POST['namedriver'];
$phonenumber=$_POST['phonenumber'];
$id=$_POST['driverid'];
$query="INSERT INTO driver VALUES('$name','$phonenumber',$id)";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>