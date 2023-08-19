<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="aboutus.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
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
                 session_start();
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
    <div class="container">
    <div class="about-content">
      <img src="logp.jpg" alt="Lebanon Adventures Logo" class="about-image">
      <h2>Discover Lebanon with Us</h2>
      <p>Welcome to Adventure AWAITS, your gateway to exploring the breathtaking beauty and rich culture of Lebanon.</p>
      <p>Our passionate team is composed of local experts who are deeply connected to the heart and soul of this enchanting country...</p>
      <p>Join us on a journey through Lebanon's hidden gems, picturesque landscapes, and vibrant cities. Whether you're interested in cultural immersion, outdoor adventures, or culinary delights, we have the perfect itinerary for you.</p>
      <p>Contact us at <a href="contactus.php">adventureawaits.com</a></p>
    </div>
  </div>
  <div class="slider">
    <i class="fa-sharp fa-solid fa-arrow-left" onclick="back()"></i>
    <img class="sliderimg" src="images/image1.jpg" alt="">
    <i class="fa-sharp fa-solid fa-arrow-right" onclick="next()"></i>
  </div>
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
    var i=1;
    var img=document.querySelector(".sliderimg");
    function back(){
        if(i==1)i=10;
        else i--;
          img.src="images/image"+(i)+".jpg";
    }
    function next(){
        if(i==10)i=1;
        else i++;
          img.src="images/image"+(i)+".jpg";
    }
  </script>
</body>
</html>
