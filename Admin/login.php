<?php 
include ('../dbConnection.php');

session_start();
if(!isset($_SESSION['is_adminlogin'])){
 if(isset($_REQUEST['aEmail']))
 {
	$aEmail = mysqli_real_escape_string($connection, trim($_REQUEST['aEmail'])) ;
	$aPassword = mysqli_real_escape_string($connection, trim($_REQUEST['aPassword']));
	$sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '".$aEmail."' AND a_password = '".$aPassword."' limit 1 ";
	$result = $connection->query($sql);
	if($result->num_rows == 1){
		$_SESSION['is_adminlogin'] = true;
		$_SESSION['aEmail'] = $aEmail; 
		echo "<script>location.href = 'dashboard.php';</script>";
		exit;
	}else{
		$msg = '<div class="alert alert-warning mt-2" >Enter valid Email and Password</div>';
	}
 }
} else{
	echo "<script>location.href = 'dashboard.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <!--Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../css/all.min.css">

    <title>Login</title>
</head>
<body>
    <div class="mt-5 text-center" style="font-size: 30px">
    	<i class="fas fa-stethoscope"></i>
    	<span>Online Service Management System</span>
    	<h4>Admin Login Form</h4>
    </div>
	</br>
	<div class="container-fluid">
		<div class="row justify-content-center mt-3">

			<div class="col-sm-6 col-md-4">
				<form action="" class="shadow-lg p-4" method="POST">

					<div class="form-group">
						<i class="fas fa-user"></i>
						<label for="email" class="font-weight-bold pl-2">Email</label>
						<input type="email" class="form-control" placeholder="Enter Email" name="aEmail">
						
					</div>
			
					<div class="form-group">
						<i class="fas fa-key"></i>
						<label for="pass" class="font-weight-bold pl-2">Password</label>
						<input type="password" class="form-control" placeholder="Enter Password" name="aPassword">		
					</div>

					<button type="submit" class="btn btn-outline-danger mt-4 font-weight-bold btn-block shadow-sm">Login</button>
					<?php if(isset($msg)) {echo $msg ;} ?>
				</form>
				<div class="text-center">
					<a href="../index.php" class="btn btn-info mt-2 font-weight-bold shadow-sm">Back to Home page</a>
				</div>


			</div>
		</div>
		
	</div>



<!--JavaScript Files-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>