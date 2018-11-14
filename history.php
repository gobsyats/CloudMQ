<meta http-equiv="refresh" content="30" />

<?php
session_start();
require 'includes/db_connection.php';
$rowcount;
if($_SESSION["vin"] != ''){

	$vin = $_SESSION['vin'];
	$sql_sensor_data = "select * from sensedata where vin = '$vin' order by datetime desc limit 50";
	$result_data = $conn->query($sql_sensor_data);
	if(mysqli_num_rows($result_data)){
		$rowcount = 1;
	}else{
		$rowcount = 0;
	}
}
?>
<!doctype html>
<html lang="en">

<style>
.foo {
  float: left;
  width: 20px;
  height: 20px;
  margin: 5px;
  border: 1px solid rgba(0, 0, 0, .2);
}

.blue {
  background: #13b4ff;
}

.purple {
  background: #ab3fdd;
}

.wine {
  background: #ae163e;
}

.red{
  background: #ff1313;
}

.green{
	background: #13ff5d;
}
</style>



<div >
    
    <img src="images/iot_3.jpg">
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
										CAR MONITORING & CONTROLLING SYSTEM
										</b></h3>
										<div class="col-md-10">
										
										<?php 
											if($rowcount>0){
										?>
										
										<script>
										var timeleft = 60;
										var downloadTimer = setInterval(function(){
										  document.getElementById("progressBar").value = 60 - --timeleft;
										  if(timeleft <= 0)
											clearInterval(downloadTimer);
										},1000);
										</script>
										<h5><b>Fetching The Latest 50 Records of LPG, CO and Smoke.
										(Page Refresh in 60 Secs):  <progress value="0" max="60" id="progressBar"></progress> </b></h5>
										
										<h5><div class = "foo green "></div><b>Good Condition</b></h5> 
										<h5><div class = "foo red "></div><b>In Monitory Condition</b></h5> 
										<br>
										
										
                        <div class="card">
                            <div class="header">
						
                                <h5 class="title"><b>LPG, CO & SMOKE LEVELS &nbsp;
							 <div class="content table-responsive table-full-width">
										<table class="table table-hover">
										<thead>
											<th>Sr No</th>
											<th>LPG</th>
											<th>CO</th>
											<th>SMOKE</th>
											<th>Date & Time</th>
											
										 </thead>
										<tbody>
                                        <tr>
									<?php	
									$counter = 0;
									while($row = $result_data->fetch_assoc()) {
										$counter++;

										?>
											<td><?php echo $counter ?></td>
                                        	<td><?php echo $row['lpg'];
											if($row['lpg']<0.001){ ?>
												<div class = "foo red"> </div>
											<?php }else{ ?>
											<div class = "foo green"> </div>
											<?php } ?>
											</td>
											<td><?php echo $row['co'];
											if($row['co']<0.001){ ?>
												<div class = "foo red"> </div>
											<?php }else{ ?>
											<div class = "foo green"> </div>
											<?php } ?>
											</td>
											
											<td><?php echo $row['smoke'];
											if($row['smoke']<0.01){ ?>
												<div class = "foo red"> </div>
											<?php }else{ ?>
											<div class = "foo green"> </div>
											<?php } ?>
											</td>
											
											
											<td><?php echo $row['datetime'] ?></td>
							            </tr>
										
										<?php 
									}
										?>
								  </tbody>
                                </table>
                            </div>
						</div>
                    </div>
					
															<?php 
															} else {
															?>
															<div class="card">
										<div class="header">
									<h5 class="title"><b>Your Device Needs To Set-Up. <br><br><br> No Data Found. <br><br> 
										</div>
									</div>
															<?php 
															}
															?>
					
					
									</form>
									</div>
									</div>
									</div>
									</div>
									</div>
									

									
									
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