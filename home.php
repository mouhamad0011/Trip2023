<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>ADVENTURE AWAITS</title>
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
                  echo "<li><a href='fav.php'>FAVORITES</a></li>";
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
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <div class="description">
            <h2> Explore the Wonders of Lebanon with us</h2>
            <p>
            Welcome to the portal of discovery and wonder! Unveil the treasures of Lebanon and immerse yourself in a land of rich history, captivating culture, and breathtaking landscapes. From the ancient ruins of Baalbek to the bustling streets of Beirut, our curated journeys will take you on an unforgettable expedition through this jewel of the Middle East. Savor the flavors of Lebanese cuisine, indulge in the warmth of its people, and witness the seamless blend of tradition and modernity. Whether you seek adventure in the lush mountains or tranquility on the sun-kissed shores of the Mediterranean, our expertly tailored itineraries promise to create memories that will linger in your heart forever. Join us as we uncover the hidden gems of Lebanon and let your senses come alive in this extraordinary destination. Let the adventure begin!
            </p>
        </div>
        <div class="container2">
            <div class="img">
                <img src="people1.jpg" alt=""><br>
            </div>
            <div class="img">
                <img src="people2.jpg" alt=""><br>
            </div>
            <div class="img">
                <img src="people3.jpg" alt=""><br>
            </div>
            <div class="img">
                <img src="people4.jpg" alt=""><br>
            </div>
            <div class="img">
                <img src="people5.jpg" alt=""><br>
            </div>
            <div class="img">
                <img src="people6.jpg" alt=""><br>
            </div>
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
</body>
</html>