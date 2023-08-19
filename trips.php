<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="TRIPS.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<title>Trips Around Lebanon</title>
</head>
<body>
  <?php
     session_start();
  ?>
<header>
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
                require_once 'connection.php';
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
  <?php
   require_once 'connection.php';
   $currentDate = date('Y-m-d'); 
   $query="SELECT * FROM upcomingtrips where date>'".$currentDate."'";
   $result=mysqli_query($con,$query);
   $nbr=mysqli_num_rows($result);
   for($i=0;$i<$nbr;$i++){
    $row=mysqli_fetch_assoc($result);
    $query2="SELECT * FROM images WHERE place='".$row['place']."'";
    $result2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_assoc($result2);
    $place=substr($row2['img'],0,strpos($row2['img'],','));
    echo"
    <div class='trip'>
    <a href='thistrip.php?num=$row[num] && place=$row[place]'><img src='pictures/".$place."' alt=''></a>
    <div class='trip-content'>
      <h2>Trip ".$row['num'].": ".$row['place']."</h2>
      <p>Date: ".$row['date']."</p>
      <p>To see more photos and know about activities to do there</p>
      <a class='btn' href='thistrip.php?num=$row[num] && place=$row[place]' >See More</a>
    </div>
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
</body>
</html>
