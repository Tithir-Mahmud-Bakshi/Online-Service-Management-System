<?php
define('TITLE','Password');
define('PAGE','Requesterchangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail = $_SESSION['rEmail'];
} else{
	//echo "<script>location.href='RequesterLogin.php'</script>";
} 
//$rEmail = $_SESSION['rEmail'];
if(isset($_REQUEST['passupdate'])){
	if($_REQUEST['rPassword']== ""){
		$passmsg = '<div class= "alert alert-warning col-sm-6 ml-5 mt-2">Fill the required Feild</div>';
	} else{
    $rPass = $_REQUEST['rPassword'];
    $sql = "UPDATE requesterlogin_tb SET r_password = '$rPass' WHERE r_email = '$rEmail' ";
    if($connection->query($sql) == true){
        $passmsg = '<div class= "alert alert-success col-sm-6 ml-5 mt-2">Password updated successfully</div>';
    } else{
        $passmsg = '<div class= "alert alert-warning col-sm-6 ml-5 mt-2">Cannot Update</div>';
    }
}

}


?>

<div class="col-sm-9 col-md-10 mt-5"> <!-- Start 2nd Column-->
	<form class="mx-5" action="" method="POST">
		<div class="form-group">
    		<label for="inputEmail">Email</label>
    		<input type="email" class="form-control" id="inputemail"  readonly> <!--value="<?php echo $rEmail ?>" -->
    	</div>
    	<div class="form-group">
    		<label for="inputnewpassword">New Password</label>
    		<input type="password" class="form-control" id="inputnewpassword" placeholder="New password" name="rPassword"> <!--value="<?php echo $rName ?>"-->
    		</div>
    		<button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
    		<button type="reset" class="btn btn-secondary mt-4">Reset</button>
    		<?php if(isset($passmsg)) echo $passmsg; ?>
	</form>
</div>  <!-- End 2nd Column-->

<?php
include('includes/footer.php');
?>