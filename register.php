<?php
require_once "connection.php";
if(isset($_GET['username']) && $_GET['username']!="" && $_GET['password'] && $_GET['password'] 
&& isset($_GET['email']) && $_GET['email']!="" && isset($_GET['number']) && $_GET['number']!=""){
    $name=$_GET['username'];
    $pass=$_GET['password'];
    $email=$_GET['email'];
    $number=$_GET['number'];
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM client WHERE username='".$name."'"))!=0){
        setcookie("msg1","username already taken!");
        header("Location:signup.php");
    }
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM client WHERE email='".$email."'"))!=0){
        setcookie("msg2","email already taken!");
        header("Location:signup.php");
    }
    $query2="INSERT INTO client VALUES('$name','$email','$number','$pass')";
    $result2=mysqli_query($con,$query2);
    if(mysqli_affected_rows($con)!=0){
        header("Location:index1.php");
    }
}
?>