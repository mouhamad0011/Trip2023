<?php
require_once 'connection.php';
$num=$_GET['num'];
$query="DELETE FROM upcomingtrips WHERE num='".$num."'";
$result=mysqli_query($con,$query);
$query2="DELETE FROM activities WHERE num='".$num."'";
$result2=mysqli_query($con,$query2);
header("Location:admin.php");
?>