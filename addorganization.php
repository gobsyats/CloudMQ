<?php	

require 'includes/db_connection.php';
		$org_name = $_GET['orgname'];
		$sql_check = "select * from organization where orgname = '$org_name'";
		$result = $conn->query($sql_check);
		if(mysqli_num_rows($result) > 0){
		
		$msg = "Organization With the Same Name Exists. Please Try A New Name";
		header('Location:registration.php?msg='.$msg);
		
		}else{
		
			$sql = "insert into organization (orgname) values ('$org_name')";
	
			if($conn->query($sql) === TRUE){
				$msg = "Organization Added.";
				header('Location:registration.php?msg='.$msg);
			}else{
				$msg =  "OOPS Something Went Wrong.Please Try Again.";
				}
		}
	mysqli_close($conn);
?>