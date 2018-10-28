<?php
$servername = "127.0.0.1";
$username =  "root";
$password =  "Govind@123";


$dbname = "cloudmq";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$username = $_POST['name'];
$phone = $_POST['phone'];
$vin = $_POST['vin'];
$password = $_POST['password'];
$email = $_POST['email']
$datetime = new DateTime(); 

mysqli_query($connect, "insert into registration values ($email, $phone, $username, $vin, $datetime, $password");

?>
