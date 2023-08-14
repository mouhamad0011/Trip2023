<?php
require_once "connection.php";
$name=$_POST['namedriver'];
$phonenumber=$_POST['phonenumber'];
$query="INSERT INTO driver VALUES('$name','$phonenumber')";
$result=mysqli_query($con,$query);
header("Location:admin.php");
?>