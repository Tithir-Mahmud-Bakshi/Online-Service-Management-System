<?php 

include('dbConnection.php');
if(isset($_REQUEST['rSignup']))
{   //Checking for empty feilds
   if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']==""))
   {
    $regmsg = '<div class = "alert alert-warning mt-2" role ="alert">All Feilds are REQUIRED</div>';
   }else{ //assigning user's value to variables

    $rName = $_REQUEST['rName'];
    $rEmail = $_REQUEST['rEmail'];
    $rPassword = $_REQUEST['rPassword'];

    $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES ('$rName', '$rEmail', '$rPassword')";

    if ($connection->query($sql) == TRUE){
        $regmsg = '<div class = "alert alert-success mt-2" role ="alert">Account created successfully</div>';
    }else{ //email already exists
        $regmsg = '<div class = "alert alert-danger mt-2" role ="alert">Email already Registered.</div';
    }

   }
    
}

?>
    
    <!--Start Registration Form -->
    <div class="container pt-5" id="registration">
    	<h2 class="text-center">Create Account</h2>
    	<div class="row mt-4 mb-4">
    		<div class="col-md-6 offset-md-3">
    			<form action="" class="shadow-lg p-4" method="POST">
    				<div class="form-group">
    					<i class="fas fa-user"></i>
    					<label for="name" class="font-weight-bold pl-2">Name</label>
    					<input type="text" name="rName" class="form-control" placeholder="Enter your Name">
    				</div>
    				<div class="form-group">
    					<i class="fas fa-envelope"></i>
    					<label for="email" class="font-weight-bold pl-2">Email</label>
    					<input type="email" name="rEmail" class="form-control" placeholder="Enter your Email">
    				</div>
    				<div class="form-group">
    					<i class="fas fa-key"></i>
    					<label for="password" class="font-weight-bold pl-2">New Password</label>
    					<input type="password" name="rPassword" class="form-control" placeholder="Enter Password">
    				</div>
    				<button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
    				<em style="font-size: 12px">Note- By Clicking Sign Up, you agree to our Terms and Policy</em>
                    <?php if(isset($regmsg)) {echo $regmsg;} ?>
    			</form>
    		</div>
    	</div>
    </div>
    <!--End Registration Form -->
