<?php
define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
} else{
    echo "<script>location.href='login.php'</script>";
}
?>

<!--Start 2nd column-->
<div class="col-sm-4 mb-5">
	<?php
		$sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest_tb";
		$result = $connection->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo '<div class="card mt-5 mx-5">';
					echo '<div class="card-header">';
						echo 'Request ID: '.$row['request_id'];
					echo '</div>';
					echo '<div class="card-body">';
						echo '<h5 class="card-title">Request Info: '.$row['request_info'];
						echo '</h5>';
						echo '<p class="card-text">'.$row['request_desc'];	
						echo '</p>';
						echo '<p class="crd-text">Request Date: '.$row['request_date'];	
						echo '</p>';
						echo '<div class="float-right">';
							echo '<form action= "" method="POST">';
								echo '<input type="hidden" name="id" value=' .$row["request_id"].'>';
								echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view"></input>';
								echo '<input type="submit" class="btn btn-dark" value="Close" name="close"></input>';
							echo '</form>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}
	?>
</div> <!--End 2nd column-->


<?php
if(isset($_REQUEST['view'])){
	$sql = " SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']} ";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
}
/*if(isset($_REQUEST['close'])){
	$sql = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']} ";
	if($connection->query($sql) == TRUE){
		echo '<meta http-equiv="refresh" content= "0;URL=?close"/>';
	} else{
		//echo "Unable to delete";
	}
}*/
if(isset($_REQUEST['assign'])){
	if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") ||
		($_REQUEST['requesterregion'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || 
		($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "") ){
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All the Feilds</div>';
	} else{
		$rid = $_REQUEST['request_id'];
		$rinfo = $_REQUEST['request_info'];
		$rdesc = $_REQUEST['requestdesc'];
		$rname = $_REQUEST['requestername'];
		$radd1 = $_REQUEST['address1'];
		$radd2 = $_REQUEST['address2'];
		$rcity = $_REQUEST['requestercity'];
		$rregion = $_REQUEST['requesterregion'];
		$rzip = $_REQUEST['requesterzip'];
		$remail = $_REQUEST['requesteremail'];
		$rmobile = $_REQUEST['requestermobile'];
		$rassigntech = $_REQUEST['assigntech'];
		$rdate = $_REQUEST['inputdate'];

		$sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, 
									requester_city, requester_region, requester_zip, requester_email, requester_mobile,
									assign_tech, assign_date) VALUES ( '$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', 
									'$rcity', '$rregion', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate' )";
		if($connection->query($sql) == TRUE){
			$msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Successfully</div>';
		}else{
			$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Unable to Assign Work</div>';
		}
	}
}
?>

<!--Start 3rd column-->
<div class="col-sm-5 mt-5 jumbotron"> 
    			<form action="" method="POST">
    				<h5 class="text-center">Assign Work Order Request</h5>
    				<div class="form-group">
    					<label for="request_id">Request ID</label>
    					<input type="text" class="form-control" name="request_id" id="requestid" 
    					value="<?php if(isset($row['request_id']))echo $row['request_id']; ?>" readonly> 
    				</div>
    				<div class="form-group">
    					<label for="request_info">Request Info</label>
    					<input type="text" class="form-control" name="request_info" id="request_info" 
    					value="<?php if(isset($row['request_info']))echo $row['request_info']; ?>" > 
    				</div>
    				<div class="form-group">
    					<label for="requestdesc">Description</label>
    					<input type="text" class="form-control" name="requestdesc" id="requestdesc" 
    					value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>" > 
    				</div>
    				<div class="form-group">
    					<label for="requestername">Name</label>
    					<input type="text" class="form-control" name="requestername" id="requstername"
    					value="<?php if(isset($row['requester_name']))echo $row['requester_name']; ?>" > 
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="address1">Address Line 1</label>
    						<input type="text" class="form-control" name="address1" id="address1"
    						value="<?php if(isset($row['requester_add1']))echo $row['requester_add1']; ?>"> 	 
    					</div>
    					<div class="form-group col-md-6">
    						<label for="address2">Address Line 2</label>
    						<input type="text" class="form-control" name="address2" id="address2"
    						value="<?php if(isset($row['requester_add2']))echo $row['requester_add2']; ?>"> 	
    					</div>
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-4">
    						<label for="requestercity">City</label>
    						<input type="text" class="form-control" name="requestercity" id="requestercity"
    						value="<?php if(isset($row['requester_city']))echo $row['requester_city']; ?>">
    					</div>
    					<div class="form-group col-md-4">
    						<label for="requsterregion">Region</label>
    						<input type="text" class="form-control" name="requesterregion" id="requesterregion"
    						value="<?php if(isset($row['requester_region']))echo $row['requester_region']; ?>"> 
    					</div>
    					<div class="form-group col-md-4">
    						<label for="requesterzip">Zip Code</label>
    						<input type="text" class="form-control" name="requesterzip" id="requesterzip" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_zip']))echo $row['requester_zip']; ?>"> 
    					</div>
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="requesteremail">Email</label>
    						<input type="text" class="form-control" name="requesteremail" id="requesteremail"
    						value="<?php if(isset($row['requester_email']))echo $row['requester_email']; ?>"> 
    					</div>
    					<div class="form-group col-md-6">
    						<label for="requestermobile">Mobile</label>
    						<input type="text" class="form-control" name="requestermobile" id="requestermobile" onkeypress="isInputNumber(event)" value="<?php if(isset($row['requester_mobile']))echo $row['requester_mobile']; ?>"> 
    					</div>
    					
    				</div>
    				<div class="form-row">
    					<div class="form-group col-md-6">
    						<label for="assigntech">Assign Technician</label>
    						<input type="text" class="form-control" name="assigntech" id="assigntech"> 	 
    					</div>
    					<div class="form-group col-md-6">
    						<label for="inputAddress2">Date</label>
    						<input type="date" class="form-control" name="inputdate" id="inputdate" > 
    					</div>
    				</div>
    				<div class="float-right">
    					<button type="submit" class="btn btn-success" name="assign">Assign</button>
    					<button type="reset" class="btn btn-secondary">Reset</button>
    				</div>
    			</form>
    			<?php if(isset($msg)) {echo $msg;} ?>
    		</div> <!--End 3rd column-->

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