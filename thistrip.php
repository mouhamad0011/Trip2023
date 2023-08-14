<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Travel Booking</title>
    <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Thistrip.css">
</head>
<body>
<?php
     session_start();
          require_once "connection.php";
          $query1="SELECT * FROM upcomingtrips WHERE num=".$_GET['num']."";
          $result1=mysqli_query($con,$query1);
          $row1=mysqli_fetch_array($result1);
          $query2="SELECT * FROM images WHERE place='".$_GET['place']."'";
          $result2=mysqli_query($con,$query2);
          $row2=mysqli_fetch_array($result2);
          $query3="SELECT * FROM activities WHERE num=".$_GET['num']."";
          $result3=mysqli_query($con,$query3);
          $row3=mysqli_fetch_array($result3);
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
        
        <section class="trip-details">
            <div class="description">
            <h2>Trip Details</h2>
            <p><strong>Trip:</strong> Summer Vacation</p>
            <p><strong>Destination:</strong> <?php echo $_GET['place']; ?></p>
            <p><strong>Date:</strong> <?php echo $row1['date']; ?></p>
            <p><strong>Restaurant:</strong> <?php echo $row1['restoname']; ?></p>
            <p><strong>Cost:</strong> <?php echo $row1['cost']."$"; ?></p>
            </div>
            <div class="slider">
        <div class="slider-container">
        <?php
            $imageFile =explode(',',$row2['img']);
            for($i=0;$i<count($imageFile);$i++){
                echo '<div class="slide">';
                echo '<img src="pictures/' . $imageFile[$i] . '" alt="' . $imageFile[$i] . '">';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="act">
        <p><strong>Activities:</strong> <?php echo $row3['act']; ?></p>
    </div>
        </section>
        
        <section class="booking">
            <h2>Booking Status</h2>
            <p>Status: Not Booked</p>
            <button id="book-button">Book Now</button>
        </section>
        <div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <h2>Booking Confirmation</h2>
        <p>How would you like to pay?</p>
        <button id="cashButton">Cash</button>
        <button id="creditCardButton">Credit Card</button>
        <div id="creditCardInfo" style="display: none;">
            <h3>Enter Credit Card Information</h3>
            <form id="creditCardForm">
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" required>
                <label for="expiration">Expiration Date:</label>
                <input type="text" id="expiration" required>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" required>
                <button type="submit">Confirm Payment</button>
            </form>
        </div>
        <button id="cancelButton">Cancel</button>
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
    <script>
        
const bookButton = document.getElementById('book-button');
bookButton.addEventListener('click', function() {
    const statusElement = document.querySelector('.booking p');
    statusElement.textContent = 'Status: Booked';
    bookButton.disabled = true;
});

// Add this JavaScript code after your existing script

const modalOverlay = document.getElementById('modalOverlay');
const cashButton = document.getElementById('cashButton');
const creditCardButton = document.getElementById('creditCardButton');
const creditCardInfo = document.getElementById('creditCardInfo');
const creditCardForm = document.getElementById('creditCardForm');
const cancelButton = document.getElementById('cancelButton');

bookButton.addEventListener('click', function() {
    modalOverlay.style.display = 'flex';
});

cashButton.addEventListener('click', function() {
    handlePayment('Cash');
});

creditCardButton.addEventListener('click', function() {
    creditCardInfo.style.display = 'block';
});

creditCardForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const cardNumber = document.getElementById('cardNumber').value;
    const expiration = document.getElementById('expiration').value;
    const cvv = document.getElementById('cvv').value;
    
    if (cardNumber && expiration && cvv) {
        handlePayment('Credit Card');
    }
});

cancelButton.addEventListener('click', function() {
    modalOverlay.style.display = 'none';
    creditCardInfo.style.display = 'none';
});

function handlePayment(paymentMethod) {
    const statusElement = document.querySelector('.booking p');
    statusElement.textContent = `Status: Booked (${paymentMethod})`;
    bookButton.disabled = true;
    modalOverlay.style.display = 'none';
}


    </script>
</body>
</html>
