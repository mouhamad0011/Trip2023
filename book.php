<?php
require_once 'connection.php';
session_start();
if($_SESSION['isloggedin']!=1)header("Location:signup.php");
$query="INSERT INTO book VALUES('".$_SESSION['num']."','".$_SESSION['name']."')";
$result=mysqli_query($con,$query);
$query2="UPDATE upcomingtrips SET ticketsleft=ticketsleft-1 where num='".$_SESSION['num']."'";
$result2=mysqli_query($con,$query2);
header("Location:trips.php");
?>