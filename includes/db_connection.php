<?php

#Hosted Server

$servername= "35.239.234.152";
$username= "root";
$password= "Govind@123";


#LocalHost
/*
$servername = "127.0.0.1";
$username =  "root";
$password =  "Govind@123";
*/

$dbname = "cloudmq";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 