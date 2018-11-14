<?php
require 'includes/db_connection.php';
if(isset($_POST['email'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$token = $_POST['password'];
	$tokensl1 = crypt($token, "shaprago");
	$vin = $_POST['vin'];
	$phone = $_POST['phone'];
	$datetime = date('Y-m-d H:i:s');
	
	$sql = "insert into registration (name, email, password, phone, datetime, vin) values ('$name','$email','$tokensl1', '$phone', '$datetime', '$vin')";
	
	if($conn->query($sql) === TRUE){
		$msg = "Registration Successful. Please Login to Access the System.";
		header('Location:index.php?msg='.$msg);
	}else{
		$msg =  "OOPS Something Went Wrong.Please Try Again.";
	}
	
	mysqli_close($conn);
}
?>


<!doctype html>

<html lang="en">
<div >
    
    <img src="images/iot_1.jpg">
</div>



 <head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="styles/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="styles/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="styles/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="styles/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="styles/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="../../maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="styles/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="styles/css/body_style.css" rel="stylesheet" />

</head>
<body class="my-container">

<div class="wrapper">
<div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                  <div class="row">
                                    <p style="color:blue" >
									<b><?php if(isset($msg)) {echo $msg;} ?> </b> 
									</p>
									
									<p style="color:blue" >
									<b><?php if(isset($_GET['msg'])) {echo $_GET['msg'];} ?> </b> 
									</p>
									
								   <form method="post" onsubmit = "return formValidation()" >
                                    
										<h3><b>
										CAR MONITORING AND CONTROLLING SYSTEM
										</b></h3>
											
										<i><b>A Cloud Based Car Monitoring System.</b></i><br>	
											
										<h4><b>
										REGISTRATION
										</b></h4>
										
										
										<br>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="name" placeholder="username" id = "name" required oninvalid="this.setCustomValidity('Please Enter a Valid Username.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										
										
									
									<div class="clearfix"></div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="abc@marshall.edu" id = "email" required oninvalid="this.setCustomValidity('Please Enter a Valid Email-id.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										
										<div class="clearfix"></div>
										
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control" name="phone" placeholder="17625617627" id = "phone" 
												 maxlength="10" size="10" required pattern = "^\d{10}$" title = "Please Enter a 10 digit Valid Mobile Number." oninvalid="this.setCustomValidity('Please Enter a 10 digit Valid Mobile Number.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										
										<div class="clearfix"></div>
										
											<div class="col-md-4">
                                            <div class="form-group">
                                                <label>VIN</label>
                                                <input type="text" class="form-control" name="vin" placeholder="AJJDJ19291" id = "vin" 
												 maxlength="17" size="17" required title = "Please Enter a 16 Aplhanumercic Valid Vehicle Identification Number." oninvalid="this.setCustomValidity('Please Enter a 16 Aplhanumercic Valid Vehicle Identification Number.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										
										<div class="clearfix"></div>
										
										
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="*****" id = "password" required maxlength="8" size="8"
												oninvalid="this.setCustomValidity('Please Enter a Valid Password.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										<div class="clearfix"></div>
										
										 <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									
                              <button type="submit" class="btn btn-info btn-fill pull-left" >Sign Up</button>
                                            </div>
                                    </div>
									<div class="clearfix"></div>
									
                                     <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
												<a href = "index.php">
									<button type="button" class="btn btn-info btn-fill pull-left" >Login</button>
									</a>
                                            </div>
                                    </div>
									<div class="clearfix"></div>
								
									
									
									
									 <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									<a href="../forget_password.php">
                              <button type="button" class="btn btn-info btn-fill pull-left" >Forgot Passoword</button>
                            </a>
                                            </div>
                                    </div>
									
                  </form>
				  
				  <script>
				  function isValidEmailAddress(emailAddress) {
					var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
					return pattern.test(emailAddress);
				  }
							
					function formValidation(){									
						if( !isValidEmailAddress( $("#email").val() ) ) {
							alert("Please Enter A Valid Email. Example: abc@xyz.edu");
							return false
						}else if( $("#password").val() == '' )  {
							alert("Please Enter A Valid Password.");
							return false;
						}
						
						
							
						}
				   
				   
				  </script>
							
				              </div>
                    </div>
                </div>
              </div>
            </div>

