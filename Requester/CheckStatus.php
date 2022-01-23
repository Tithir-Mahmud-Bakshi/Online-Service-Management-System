<?php
define('TITLE','Status');
define('PAGE','CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
	$rEmail = $_SESSION['rEmail'];
} else{
	echo "<script>location.href='RequesterLogin.php'</script>";
}
?>

<!--Start 2nd Column-->
<div class="col-sm-6 mx-5">
	<form action="" method="POST" class="form-inline mt-5">
		<div class="form-group mr-3">
			<label for="checkid" class="mr-3">Enter Request ID: </label>
			<input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
		</div>
		<button type="submit" class="btn btn-primary">Search</button>
	</form>

<?php 
if(isset($_REQUEST['checkid'])){
	if($_REQUEST['checkid']== ""){
		$msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2 ">Fill All The Feilds</div>';
	} else{
		$sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']} ";
	$result = $connection->query($sql);
	$row = $result->fetch_assoc();
	if(($row['request_id'] == $_REQUEST['checkid'])){ ?>
<h3 class="text-center mt-5">Assigned Work Details</h3>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Request ID</td>
			<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
		</tr>
		<tr>
			<td>Request Info</td>
			<td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
		</tr>
		<tr>
			<td>Request Description</td>
			<td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php if(isset($row['requester_name'])){echo $row['requester_name'];} ?></td>
		</tr>
		<tr>
			<td>Address Line 1</td>
			<td><?php if(isset($row['requester_add1'])){echo $row['requester_add1'];} ?></td>
		</tr>
		<tr>
			<td>Address Line 2</td>
			<td><?php if(isset($row['requester_add2'])){echo $row['requester_add2'];} ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php if(isset($row['requester_city'])){echo $row['requester_city'];} ?></td>
		</tr>
		<tr>
			<td>Region</td>
			<td><?php if(isset($row['requester_region'])){echo $row['requester_region'];} ?></td>
		</tr>
		<tr>
			<td>Zipcode</td>
			<td><?php if(isset($row['requester_zip'])){echo $row['requester_zip'];} ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php if(isset($row['requester_email'])){echo $row['requester_email'];} ?></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];} ?></td>
		</tr>
		<tr>
			<td>Assigned Technician</td>
			<td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
		</tr>
		<tr>
			<td>Assigned Date</td>
			<td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
		</tr>
	</tbody>
</table>
<?php } else{
	echo '<div class="alert alert-warninng mt-4">Your Request is still pending.</div>';
} 
	}
	
}?>

<?php if(isset($msg)) {echo $msg;} ?>

</div>
<!--End 2nd Column-->

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