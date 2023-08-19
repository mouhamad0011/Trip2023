<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TRIPS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>OLD TRIPS</title>
</head>
<body>
<header>
  <?php
    require_once"connection.php";
    session_start();
    $currentDate = date('Y-m-d'); 
    $query1="SELECT * FROM book";
    $result1=mysqli_query($con,$query1);
    $nbr1=mysqli_num_rows($result1);
    for($i=0;$i<$nbr1;$i++){
      $row1=mysqli_fetch_array($result1);
      $query2="SELECT * FROM upcomingtrips where num=".$row1['num']." and date<'".$currentDate."'";
      $result2=mysqli_query($con,$query2);
      $nbr2=mysqli_num_rows($result2);
        $row2=mysqli_fetch_array($result2);
        if($nbr2>0){
        $query3="INSERT INTO oldtrips VALUES(".$row2['num'].",'".$row2['place']."','".$row2['date']."',".$row2['cost'].",'".$row2['restoname']."','".$_SESSION['name']."')";
        $result3=mysqli_query($con,$query3);
        $query="DELETE FROM book where num=".$row1['num']."";
        $result=mysqli_query($con,$query);
        }
    }
  ?>
        
        <div class="container1">
        <div class="first">
            ADVENTURE&nbsp;AWAITS
        </div>
        <div class="second">
            <ul class="nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="aboutus.php">ABOUT</a></li>
                <li><a href="trips.php">TRIPS</a></li>
                <?php
                error_reporting(0);
                if($_SESSION['isloggedin']==1){
                  echo "<li><a href='oldtrips.php'>OLDTRIPS</a></li>";
                }
                else echo"";
                ?>
                <li><a href="contactus.php">CONTACT US</a></li>
            </ul>
        </div>
        <div class="third">
          <?php
          error_reporting(0);
           if($_SESSION['isloggedin']!=1)
           echo" <input type='submit' onclick="."window.open('signup.php')"." value='register/sign in'".">";
           else 
           echo" <input type='submit' onclick="."window.open('logout.php')"." value='logout'".">";
          ?>
        </div>
        </div>
    </header>
<main>
  
    <div style="margin-bottom:50px; margin-left:33%; background-color:#3498db; width:500px; height:50px;
    display:flex; justify-content:center; align-items:center;">
        <h1  style="color:#ffffff;">TRIPS YOU WENT WITH US!</h1>
    </div>
    <?php
    require_once 'connection.php';
    $query4="SELECT * FROM oldtrips WHERE clientusername='".$_SESSION['name']."'";
    $result4=mysqli_query($con,$query4);
    $nbr4=mysqli_num_rows($result4);
    for($i=0;$i<$nbr4;$i++){
        $row4=mysqli_fetch_array($result4);
        $query5="SELECT * FROM images WHERE place='".$row4['place']."'";
        $result5=mysqli_query($con,$query5);
        $row5=mysqli_fetch_assoc($result5);
        $place=substr($row5['img'],0,strpos($row5['img'],','));
        $query6="SELECT * FROM favorites where date='".$row4['date']."'";
        $result6=mysqli_query($con,$query6);
        $row6=mysqli_fetch_assoc($result6);
    echo"
    <div class='trip'>
    <img src='pictures/".$place."' alt=''>
    <div class='trip-content'>
      <h2>Trip ".$row4['num'].": ".$row4['place']."</h2>
      <p>Date: ".$row4['date']."</p>";
     if($row6['date']!=$row4['date'])
      echo"<a href='fav.php?date=$row4[date] && place=$row4[place]'><i class='fa-regular fa-heart'></i></a>";
      else echo" <i class='fa-solid fa-heart' style='color:red;'></i>";
      
    echo "</div>
  </div>
    ";
    }
    ?>
</main>
<footer class="footer">
        <div class="social-icons">
            <i class="fa-solid fa-mobile-screen"><span>71/836343</span></i>
            <i class="fa-sharp fa-solid fa-location-dot"><span>Bekaa, Rayyak</span></i>
            <i class="fa-solid fa-clock"><span>Open 24/7</span></i>
        </div>
        <div class="social-media">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter" style="color: #ffffff;"></i>
        
        </div>
        <div>
       <p> Copyright © 2023 ADVENTURE AWAITS. All rights reserved.</p>
        </div>
    </footer>
<script>
  const elements = document.querySelectorAll(".trip-content i");
  elements.forEach(element => {
    element.addEventListener("click", function () {
      element.removeAttribute("class");
      element.setAttribute("class",'fa-solid fa-heart');
      element.style.color="red";
    });
  });


   
</script>
</body>
</html>