<?php
define('TITLE','Submit Request');
define('PAGE','SubmitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail = $_SESSION['rEmail'];
} else{
	echo "<script>location.href='RequesterLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])){
	//Checking for empty feilds
	if(($_REQUEST['requestinfo']) == "" || ($_REQUEST['requestdesc']) == "" || ($_REQUEST['requestername']) == "" || 
		($_REQUEST['requesteradd1']) == "" || ($_REQUEST['requesteradd2']) == "" || ($_REQUEST['requestercity']) == "" 
		|| ($_REQUEST['requesterregion']) == "" || ($_REQUEST['requesterzip']) == "" || ($_REQUEST['requesteremail']) == "" || 
		($_REQUEST['requestermobile']) == "" || ($_REQUEST['requestdate']) == ""){
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">All Feilds are Required</div>' ;
	} else{
		$rinfo = $_REQUEST['requestinfo'];
		$rdesc = $_REQUEST['requestdesc'];
		$rname = $_REQUEST['requestername'];
		$radd1 = $_REQUEST['requesteradd1'];
		$radd2 = $_REQUEST['requesteradd2'];
		$rcity = $_REQUEST['requestercity'];
		$rregion = $_REQUEST['requesterregion'];
		$rzip = $_REQUEST['requesterzip'];
		$remail = $_REQUEST['requesteremail'];
		$rmobile = $_REQUEST['requestermobile'];
		$rdate = $_REQUEST['requestdate'];

		$sql = "INSERT INTO submitrequest_tb (request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city,
    						requester_region, requester_zip, requester_email, requester_mobile, request_date)
    						VALUES('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rregion', '$rzip',
    						'$remail', '$rmobile', '$rdate' ) ";
    	if($connection->query($sql) == TRUE){
    		$genid = mysqli_insert_id($connection);
    		$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Request Submitted Successfully</div>' ;
    		$_SESSION['myid'] = $genid;
    		echo "<script>location.href='submitrequestsuccess.php'</script>";
    	} else{
    		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Request Failed</div>' ;
    	}
	}
}
?>


<div class="col-sm-9 col-md-10 mt-5"> <!--Start Service Request Form 2nd column-->
    			<form action="" method="POST" class="mx-5" >
    				<div class="form-group">
    					<label for="inputRequestInfo">Request Info</label>
    					<input type="text" class="form-control" name="requestinfo" id="inputRequestInfo" placeholder="Request Info"> 
    				</div>
    				<div class="form-group">
    					<label for="inputRequestDescription">Description</label>
    					<input type="text" class="form-control" name="requestdesc" id="inputRequestDescription" placeholder="Write Description"> 
    				</div>
    				<div class="form-group">
    					<label for="inputName">Name</label>
    					<input type="text" class="form-control" name="requestername" id="inputName" placeholder="Name"> 
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="inputAddress">Address Line 1</label>
    						<input type="text" class="form-control" name="requesteradd1" id="inputAddress" placeholder="House no."> 
    					</div>
    					<div class="form-group col-md-6">
    						<label for="inputAddress2">Address Line 2</label>
    						<input type="text" class="form-control" name="requesteradd2" id="inputAddress2" placeholder="Road No."> 
    					</div>
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="inputAddress">City</label>
    						<input type="text" class="form-control" name="requestercity" id="inputCity" placeholder="City"> 
    					</div>
    					<div class="form-group col-md-4">
    						<label for="inputAddress2">Region</label>
    						<input type="text" class="form-control" name="requesterregion" id="inputRegion" placeholder="Region"> 
    					</div>
    					<div class="form-group col-md-2">
    						<label for="inputAddress2">Zip/Postal Code</label>
    						<input type="text" class="form-control" name="requesterzip" id="inputZip" onkeypress="isInputNumber(event)"> 
    					</div>
    				</div>

    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="inputAddress">Email</label>
    						<input type="text" class="form-control" name="requesteremail" id="inputEmail" placeholder="Email"> 
    					</div>
    					<div class="form-group col-md-2">
    						<label for="inputAddress2">Mobile</label>
    						<input type="text" class="form-control" name="requestermobile" id="inputMobile" onkeypress="isInputNumber(event)"> 
    					</div>
    					<div class="form-group col-md-4">
    						<label for="inputAddress2">Date</label>
    						<input type="date" class="form-control" name="requestdate" id="inputDate" > 
    					</div>
    				</div>

    				
    				<button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    				<button type="reset" class="btn btn-secondary">Reset</button>
    			</form>
    			<?php if(isset($msg)) {echo $msg;} ?>
    		</div> <!--End Service Request Form 2nd column-->

    		<!--Only Number for Input Feilds -->
    		<script>
    			function isInputNumber(evt){
    				var ch = String.fromCharCode(evt.which);
    				if(!(/[0-9]/.test(ch))){
    					evt.preventDefault();
    				}
    			}
    		</script>

<?php
include('includes/footer.php');
?>