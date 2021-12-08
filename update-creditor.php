<?php 
	
	include("includes/db_conn.php");

	$cred_id     = mysqli_real_escape_string($db, $_POST['cred_id']);
	$cust_name 	 = mysqli_real_escape_string($db, $_POST['cust_name']);
    $cust_loc 	 = mysqli_real_escape_string($db, $_POST['cust_loc']);
    $cust_no 	 = mysqli_real_escape_string($db, $_POST['cust_no']);
    $cust_qty 	 = mysqli_real_escape_string($db, $_POST['cust_qty']);
    $total_amt 	 = mysqli_real_escape_string($db, $_POST['total_amt']);
    $amt_paid 	 = mysqli_real_escape_string($db, $_POST['amt_paid']);
    $pymt_period = mysqli_real_escape_string($db, $_POST['payment_period']);


	$update_cred  = "UPDATE tbl_creditors SET cust_name = '$cust_name', location = '$cust_loc', phone_number = '$cust_no', qty = '$cust_qty', total_amount = '$total_amt', amount_paid = '$amt_paid', payment_period = '$pymt_period' WHERE creditor_id = '$cred_id'";
	$run_cred    = mysqli_query($db, $update_cred);

	if($run_cred)
	{
		echo "<script>alert('Creditor details updated successfully!')</script>";
		echo "<script>document.location='creditors.php'</script>";
	}

?>