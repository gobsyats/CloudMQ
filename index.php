<?php
session_start();
 require 'includes/db_connection.php';
if(isset($_POST['email'])):
	$sql = 'SELECT * FROM registration where email = "'.$_POST['email'] .'" AND password = "'.crypt($_POST['password'], 'shaprago').'"' ;
	$result = $conn->query($sql);
	
	if (mysqli_num_rows($result) > 0 ) {
			  $row = $result->fetch_assoc();
			  $_SESSION["email"] = $row['email'];
			  $_SESSION["phone"] = $row['phone'];
			  $_SESSION["vin"] = $row['vin'];
			  $_SESSION["name"] = $row['name'];
			  header('Location:cloudsense.php ');
	}
	else {
  $msg = "The Following Combination of Email and Password Failed. Please Try Again.";
 	}
	mysqli_close($conn);
endif;
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
									
									<p style="color:blue" ><b><?php if(isset($msg)) {
									echo $msg;
									}?> </b> </p>
									
									<p style="color:blue" >
									<b><?php if(isset($_GET['msg'])) {echo $_GET['msg'];} ?> </b> 
									</p>
                                        
								   <form method="post" onsubmit = "return formValidation()" >
                                        
										<h3><b>
										CAR MONITORING AND CONTROLLING SYSTEM
										</b></h3>
										
										<i><b>A Cloud Based Car Monitoring System.</b></i><br><br>
										<br><br>
										<h5>
										<b>To access the system please enter your email and password provided and click on Login. </b>
										<br><br>
										<b>If you have forgotten the password, please click the "Forgot Password" button to reset the password.</b>
										<br><br>
										<b>If you are not a member to the system, plese click on "Sign Up".</b></h5>
										
										<br><br>
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
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="*****" id = "password" required
												oninvalid="this.setCustomValidity('Please Enter a Valid Password.')" oninput="this.setCustomValidity('')"
												>
                                            </div>
                                        </div>
										<div class="clearfix"></div>
                                     <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									<button type="submit" class="btn btn-info btn-fill pull-left" >Login</button>
                                            </div>
                                    </div>
									<div class="clearfix"></div>
								
									
									 <div class="col-md-4"> <br>
									     <div class="form-group">
                                                <label for="exampleInputEmail1"></label>
									<a href="registration.php">
                              <button type="button" class="btn btn-info btn-fill pull-left" >Sign Up</button>
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