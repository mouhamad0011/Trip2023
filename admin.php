<html>
    <head>
        <link rel="stylesheet">
        <style>
            body{
                display: grid;
                grid-template-columns: repeat(2);
            }
            .trips{
                height: 70vh;
            }
            .driver{
                
                height: 29vh;
            }
            img{
                width: 30px;
                height: 30px;
                border-radius: 50%;
            }
            
        </style>
    </head>
    <body>
<?php
require_once "connection.php";
    session_start();
    if($_SESSION['adminloggedin']!=1)header("Location:index1.php");
$query="SELECT * FROM upcomingtrips";
$result=mysqli_query($con,$query);
echo "<table border='border' class='trips'>"."<tr><th colspan='7'>UPCOMING TRIPS</th><tr> <th>Num</th>
 <th>Place</th> <th>Date</th> <th>Tickets</th> <th>Restaurent</th> <th>Cost</th> <th>Remove</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['num']."</td><td>".$row['place']."</td><td>".$row['date']."</td><td>"
    .$row['ticketsleft']."</td><td>".$row['restoname']."</td><td>".$row['cost']."$</td><th><a href='deletetrip.php?num=$row[num]'><img src='x.jpg'></a></th></tr>";
}
echo"<tr><form action='addtrip.php' method='post'><td><input name='num'></td><td><input name='place'></td><td><input name='date'></td><td><input name='tickets'></td>
<td><input name='restaurant'></td><td><input name='cost'></td><td><input type='submit' value='add'></td></form></tr></table>";
if($_SESSION['done']=="yes"){
    echo"<form action='addact.php' method='post'>
         Add activity for the trip <br>
         Num<input name='numact'><br>
         Activity<input name='activity'><br>
         <input type='submit' value='add'>
         </form>";
}
else {
    echo"";
}
$query3="SELECT * FROM driver";
$result3=mysqli_query($con,$query3);
echo "<table border='border' class='driver'>"."<tr><th colspan='3'>DRIVERS</th><tr> <th>Name</th> <th>Phone number</th> <th>Remove</th></tr>";
while($row3=mysqli_fetch_assoc($result3)){
    echo "<tr><td>".$row3['name']."</td><td>".$row3['phonenumber']."</td><th><a href='deletedriver.php?name=$row3[name]'><img src='x.jpg'></a></th></tr>";
}
echo"<tr><form action='adddriver.php' method='post'><td><input name='namedriver'></td><td><input name='phonenumber'></td><td><input type='submit' value='add'></td></form></tr></table>";

?>
    </body>
</html>