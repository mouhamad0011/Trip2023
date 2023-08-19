<?php
    require_once 'connection.php';
    session_start();
    $query="INSERT INTO favorites VALUES('".$_SESSION['name']."','".$_GET['place']."','".$_GET['date']."')";
    $result=mysqli_query($con,$query);
    header('Location:oldtrips.php');
?>