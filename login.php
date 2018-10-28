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

$password = $_GET["token"];
$email_id = $_GET["email_id"];
$sql = "select * from registration where email_id = '$email_id' and password = '$password'";
$result = $conn->query($sql);
$no = mysqli_num_rows($result); 
if($no > 0){
	echo("OK");
}else{
	echo("Error");
}

?>