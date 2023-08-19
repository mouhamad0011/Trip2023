<html>
    <head>
        <link rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                margin-bottom: 50px;
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
    $currentDate = date('Y-m-d'); 
    if($_SESSION['adminloggedin']!=1)header("Location:index1.php");
$query="SELECT * FROM upcomingtrips ORDER BY date DESC";
$result=mysqli_query($con,$query);
echo "<table border='border' class='trips'>"."<tr><th colspan='8'>UPCOMING TRIPS</th><tr> <th>Num</th>
 <th>Place</th> <th>Date</th> <th>Tickets</th> <th>Restaurent</th> <th>Cost</th><th>DriverId</th> <th>Remove</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row['num']."</td><td>".$row['place']."";
    if($row['date']<$currentDate)
    echo "</td><td style='color:red;'>".$row['date']."</td>";
    else echo "</td><td>".$row['date']."</td>";
    echo "<td>"
    .$row['ticketsleft']."</td><td>".$row['restoname']."</td><td>".$row['cost']."$</td><td>".$row['driverid']."</td><th><a href='deletetrip.php?num=$row[num]'><img src='x.jpg'></a></th></tr>";
}
error_reporting(0);
echo"<tr><form action='addtrip.php' method='post'><td><input name='num'></td><td><input name='place'></td><td><input name='date'></td><td><input name='tickets'></td>
<td><input name='restaurant'></td><td><input name='cost'></td><td><input name='driverid'></td><td><input type='submit' value='add'></td></form></tr></table>";
if($_SESSION['done']=="yes"){
    echo"<form action='addact.php' method='post'>
         Add activities for the trip <br>
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
echo "<table border='border' class='driver'>"."<tr><th colspan='4'>DRIVERS</th><tr> <th>Name</th> <th>Phone number</th><th>DriverId</th> <th>Remove</th></tr>";
while($row3=mysqli_fetch_assoc($result3)){
    echo "<tr><td>".$row3['name']."</td><td>".$row3['phonenumber']."</td><td>".$row3['id']."</td><th><a href='deletedriver.php?name=$row3[name]'><img src='x.jpg'></a></th></tr>";
}
echo"<tr><form action='adddriver.php' method='post'><td><input name='namedriver'></td><td><input name='phonenumber'></td><td><input name='driverid'></td><td><input type='submit' value='add'></td></form></tr></table>";

$query4="SELECT * FROM transport";
$result4=mysqli_query($con,$query4);
echo "<table border='border' class='transport'>"."<tr><th colspan='5'>TRANSPORT</th><tr> <th>Num</th> <th>Location</th><th>Time</th><th>DriverNumber</th> <th>Remove</th></tr>";
while($row4=mysqli_fetch_assoc($result4)){
    echo "<tr><td>".$row4['num']."</td><td>".$row4['location']."</td><td>".$row4['time']."<td>".$row4['drivernumber']."</td><th><a href='deletetransport.php?num=$row4[num]'><img src='x.jpg'></a></th></tr>";
}
echo"<tr><form action='addtransport.php' method='post'><td><input name='num'></td><td><input name='location'></td><td><input name='time'></td><td><input name='nb'></td><td><input type='submit' value='add'></td></form></tr></table>";

?>
    </body>
</html>