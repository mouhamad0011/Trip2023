<?php
 require_once("connection.php");
 if(isset($_GET['username']) && $_GET['username']!="" && $_GET['password'] && $_GET['password']){
    $name=$_GET['username'];
    $pass=$_GET['password'];
    $query="SELECT * FROM client WHERE username='".$name."' and password='".$pass."'";
    $result=mysqli_query($con,$query);
    $query2="SELECT * FROM admin WHERE username='".$name."' and password='".$pass."'";
    $result2=mysqli_query($con,$query2);
    if(mysqli_num_rows($result2)!=0){
        session_start();
        $_SESSION['adminloggedin']=1;
        header("Location:admin.php");
    }  
    elseif(mysqli_num_rows($result)!=0){
    session_start();
    $_SESSION['isloggedin']=1;
    $_SESSION['name']=$name;
    header("Location:home.php");
 }
 else{
    header("Location:index1.php");
 }
 }
?>