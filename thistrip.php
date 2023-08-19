<!DOCTYPE html>
<?php
  require_once 'connection.php';
  session_start();
  if($_SESSION['isloggedin']!=1)header("Location:signup.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Travel Booking</title>
    <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="thattrip.css">
</head>
<body>
<?php
          
          $_SESSION['num']=$_GET['num'];
          $query1="SELECT * FROM upcomingtrips WHERE num=".$_SESSION['num']."";
          $result1=mysqli_query($con,$query1);
          $row1=mysqli_fetch_array($result1);
          $_SESSION['tick']=$row1['ticketsleft'];
          $query2="SELECT * FROM images WHERE place='".$_GET['place']."'";
          $result2=mysqli_query($con,$query2);
          $row2=mysqli_fetch_array($result2);
          $query3="SELECT * FROM activities WHERE num=".$_GET['num']."";
          $result3=mysqli_query($con,$query3);
          $row3=mysqli_fetch_array($result3);
          $query4="SELECT * FROM driver WHERE id=".$row1['driverid']."";
          $result4=mysqli_query($con,$query4);
          $row4=mysqli_fetch_array($result4);
          $query5="SELECT * FROM transport WHERE num=".$row1['num']."";
          $result5=mysqli_query($con,$query5);
          $row5=mysqli_fetch_array($result5);
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
    <section class="slider-booking">
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
    <div class="description">
                <table style="border-spacing:50px 0;">
            <tr><th colspan="2"><h2>Trip Details</h2></th></tr>
           <tr> <td><p><strong>Trip:</strong> Summer Vacation</p></td>
           <td> <p><strong>Destination:</strong> <?php echo $_GET['place']; ?></p></td>
           </tr>
           <tr><td> <p><strong>Date:</strong> <?php echo $row1['date']; ?></p></td>
           <td> <p><strong>Restaurant:</strong> <?php echo $row1['restoname']; ?></p></td>
           </tr>
           <tr><td> <p><strong>Meeting location:</strong> <?php echo $row5['location']; ?></p></td>
           <td> <p><strong>Time:</strong> <?php echo $row5['time']; ?></p></td>
           </tr>
           <tr><td> <p><strong>Driver number:</strong> <?php echo $row4['phonenumber']; ?></p></td>
            <td><p><strong>Cost:</strong> <?php echo $row1['cost']."$"; ?></p></td>
           </tr>
            </table>
            </div>
   
        </section>
        <section class="trip-activities">
            <section class="trip-details">
            <section class="booking">
            <h2>Booking Status</h2>
            <?php
              $query4="SELECT * FROM book where num=".$_SESSION['num']." and username='".$_SESSION['name']."'";
              $result4=mysqli_query($con,$query4);
              if(mysqli_num_rows($result4)==0)
              echo "<p id='book'>Status: Not Booked</p>";
              else
              echo "<p id='book'>Status: Booked</p>";
            ?>
            <p class="tickets-hidden">Tickets left: <?php echo $row1['ticketsleft'];?></p>
            <button id="book-button">Book Now</button>
        </section>
           
    <div class="act">
        <p><strong>Activities:</strong> <?php echo $row3['act']; ?></p>
    </div>
        </section>
        </section>
        
        
        <div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <h2>Booking Confirmation</h2>
        <p>How would you like to pay?</p>
        <button id="cashButton"  onclick="window.open('book.php')">Cash</button>
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
                <button type="submit" onclick="window.open('book.php')"> Confirm Payment</button>
            </form>
        </div>
        <button id="cancelButton">Cancel</button>
    </div>
</div>
<div class="popup" id="noTicketsPopup">
    <div class="popup-content">
        <p>Sorry, there are no tickets left for this trip.</p>
        <button id="closePopup">Close</button>
    </div>
</div>
   </p>
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
const book=document.getElementById("book");
cancelButton.addEventListener('click', function() {
    modalOverlay.style.display = 'none';
    creditCardInfo.style.display = 'none';
    book.innerHTML="Status: Not Booked";
});

function handlePayment(paymentMethod) {
    const statusElement = document.querySelector('.booking p');
    statusElement.textContent = `Status: Booked (${paymentMethod})`;
    bookButton.disabled = true;
    modalOverlay.style.display = 'none';
}

if(book.innerHTML=="Status: Booked")
bookButton.setAttribute("disabled","disabled");

const noTicketsPopup = document.getElementById('noTicketsPopup');
const closePopupButton = document.getElementById('closePopup');
const ticketshidden=document.querySelector(".tickets-hidden");
bookButton.addEventListener('click', function() {
    if (ticketshidden.innerHTML=="Tickets left: 0") {
        noTicketsPopup.style.display = 'flex';
        modalOverlay.style.display='none';
    } 
});

closePopupButton.addEventListener('click', function() {
    noTicketsPopup.style.display = 'none';
    
});
    </script>
</body>
</html>
