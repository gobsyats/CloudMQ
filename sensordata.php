<?php
session_start();
require 'includes/db_connection.php';

if($_SESSION["cradle"] != ''){
	
	$cradle = $_SESSION["cradle"];
	$sql_cradle = "select organization_orgid from registration where regid = '$cradle'";
	$result_cradle = $conn->query($sql_cradle);
	$row_org = $result_cradle->fetch_assoc();
	$org_id = $row_org['organization_orgid'];
	echo($org_id);
	
	$sql_sensor_data = "select * from sensedata where organization_orgid = '$org_id' limit 1";
	$result_data = $conn->query($sql_sensor_data);
	$row = $result_data->fetch_assoc();
	echo($row['lpg']);
	echo($row['co']);
	echo($row['smoke']);
	echo($row['datetime']);
	echo($row['organization_orgid']);
	
	
	
	
	mysqli_close($conn);
}
?>


<div class="main-panel">
   <nav class="navbar navbar-default navbar-fixed">
          <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <a class="navbar-brand">Your Home Environment Quality</a>
              </div>
              <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <?php include 'logged_in_as.php';?>
					<li>
                          <a href="logout.php">
                              Log out
                          </a>
                      </li>
                  </ul>
              </div>

      </nav>

      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
      <div class="header">
                              <h4 class="title"><p style="color:red" ><?php if(isset($_GET['msg'])) {
                echo $_GET['msg'];
              }?>
              <?php if(isset($msg)) {
                echo $msg;
              }?>
              </p></h4>
                          </div>
             
              <div class="col-md-14">
			  <div class="card">
            
                         <div class="header">
                               <h4 class="title">RESEARCH SUMMARY</h4>
               
                           </div>
                          
       		
						<?php  $rows = $results->fetch_assoc(); ?>
                          <div class="content table-responsive table-full-width">
                                           <table class="table table-hover">
                                               <thead>
                                                
                                                <th>
												
												<div class="content">
                                <form method="post" onsubmit="return validateForm();">
                                    <div class="row">

                                         <div class="col-md-12">
                                            <div class="form-group">
                                               <label>Research Interest Summary</label>
												
                                                <textarea rows="5" name="summary" id="summary" class="form-control" placeholder="Please enter research summary upto a limit of 500 words." ><?php echo $rows['summary']?></textarea>
                                            </div>
                                        </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right""> SAVE </button>
                                    <div class="clearfix"></div>
                                </form>
                    </div>
												
												</th>
												
                                                
                                                </thead>
												 <?php  } ?>
                          
                                           </table>
                                       </div> </div>
									   </div>

</div>
</div>

					
                       <div class="col-md-14">
			  <div class="card">
                            <div class="collapse navbar-collapse">

                                                   
                         <div class="header">
                          <h4 class="title"> PUBLICATIONS  </h4><br>
						   <h5 class="title">(Please add top 10 Publications) &nbsp; <a href="add_data.php">Create New </a></h5>
						  </div>
                       

          </ul>
          </div>
             <div class="content table-responsive table-full-width">
                              <table class="table table-hover">
                                  <thead>

                                    <th>publication title</th>
                  <th>publication author(s)</th>
                  <th>genre/ conference/ publisher</th>
                                    <th>Other Information</th>
									<th>year</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                   </thead>
                                  <tbody>
              <?php  while($row = $result->fetch_assoc()) { ?>
                                      <tr>

                                        <td><?php echo $row['publication_title'];?></td>
                    <td><?php echo $row['publication_author'];?></td>

                    <td><?php echo $row['genre_type'];?></td>
                                        <td><?php echo $row['data'];?></td>
										<td><?php echo $row['publication_year'];?></td>
                                        <td><a href="edit_data.php?id=<?php echo $row['id'];?>">Edit</a></td>
                                        <td><a href="selected_publications.php?delete=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete the selected record?');"  >Delete</a></td>
                                      </tr>

			  <?php } }  ?>

                </tbody>
                              </table>

                          </div>
                       
						  </div>
            </div>
                                                  
									 
									  
  </div>
                      </div>
                  </div>

      

  </div>



</body>

  <!--   Core JS Files   -->
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<!--  Sharrre plugin	 -->
  <script src="assets/js/jquery.sharrre.js"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46172202-1', 'auto');
    ga('send', 'pageview');

	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46172202-1', 'auto');
      ga('send', 'pageview');

	 function validateForm(){
	  if($("#summary").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#summary").val() == ''){
      alert("Please enter a valid research summary up to 500 characters.");
      return false;
		  }else if($("#summary").val().replace(/\s{2,}/g, ' ').split(" ").length>500  || $("#summary").val() == ''){
			  alert("Please enter a valid research summary up to 500 characters.");
			  return false;
		  }
	  }
  </script>



<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard/user by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Mar 2017 07:54:52 GMT -->
</html>
<?php
} else {
header('Location:index.php');
exit();
}

?>
