<?php
session_start();
require 'includes/db_connection.php';
$row_count = 0;

if($_SESSION['vin'] != ''){
	$vin = $_SESSION['vin'];
	$sql_sensor_data = "select * from sensedata where vin = '$vin' order by datetime desc limit 1";
	$result_data = $conn->query($sql_sensor_data);
	if(mysqli_num_rows($result_data) > 0){
	$row_count = 1;
	$row = $result_data->fetch_assoc();
	$lpg = $row['lpg'];
	$co = $row['co'];
	$smoke = $row['smoke'];
	$datetime = $row['datetime'];
	}else{
	$row_count = 0;
	}
	mysqli_close($conn);
}
?>
<meta http-equiv="refresh" content="30" />
<!doctype html>
<html lang="en">
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
											if($row_count == 1){
										?>
										<script>
										var timeleft = 30;
										var downloadTimer = setInterval(function(){
										  document.getElementById("progressBar").value = 30 - --timeleft;
										  if(timeleft <= 0)
											clearInterval(downloadTimer);
										},1000);
										</script>
										<h4>Fetching Latest LPG, CO and Smoke Values in (Page Refresh in 30 Secs):  <progress value="0" max="30" id="progressBar"></progress> </h4>
										
										
										
                        <div class="card">
                            <div class="header">
						
                                <h5 class="title"><b>LPG &nbsp;
							 <div class="content table-responsive table-full-width">
										<table class="table table-hover">
										<thead>
											<th>Sr No</th>
											<th>Lpg</th>
											<th>Date & Time</th>
											<th>Description</th>
										 </thead>
										<tbody>
                                        <tr>
											<td><?php echo "1." ?></td>
                                        	<td><?php echo $lpg?></td>
											<td><?php echo $datetime ?></td>
											<td><?php echo "Current LPG Levels %" ?></td>
							            </tr>
								  </tbody>
                                </table>
                            </div>
						</div>
                    </div>
					
					<div class="card">
                            <div class="header">
						
                                <h5 class="title"><b>Carbon Di Oxide &nbsp;
							 <div class="content table-responsive table-full-width">
										<table class="table table-hover">
										<thead>
											<th>Sr No</th>
											<th>CO</th>
											<th>Date & Time</th>
											<th>Description</th>
										 </thead>
										<tbody>
                                        <tr>
											<td><?php echo "1." ?></td>
                                        	<td><?php echo $co ?></td>
											<td><?php echo $datetime ?></td>
											<td><?php echo "Current CO Levels %" ?></td>
							            </tr>
								  </tbody>
                                </table>
                            </div>
						</div>
                    </div>
					
							<div class="card">
                            <div class="header">
                                <h5 class="title"><b>Smoke &nbsp;
							 <div class="content table-responsive table-full-width">
										<table class="table table-hover">
										<thead>
											<th>Sr No</th>
											<th>Smoke</th>
											<th>Date & Time</th>
											<th>Description</th>
										 </thead>
										<tbody>
                                        <tr>
											<td><?php echo "1." ?></td>
                                        	<td><?php echo $smoke?></td>
											<td><?php echo $datetime ?></td>
											<td><?php echo "Current Smoke Levels %" ?></td>
							            </tr>
								  </tbody>
                                </table>
                            </div>
						</div>
                    </div>
					
											<?php }else{ ?>
												<div class="card">
										<div class="header">
									<h5 class="title"><b>Your Device Needs To Set-Up. <br><br><br> No Data Found. <br><br> 
										</div>
									</div>
											
											<?php } ?>
					
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