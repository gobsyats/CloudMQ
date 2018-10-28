<?php

/*
Hosted Server Name: 50.62.160.155
Username: test_acc
Passs: Test@123
Port: 21
*/

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




?> 