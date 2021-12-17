<?php 

	include("includes/db_conn.php");


	if(isset($_POST['btn-cred']))
	{
		$emp_id      = mysqli_real_escape_string($db, $_POST['emp_id']);
		$cust_name 	 = mysqli_real_escape_string($db, $_POST['cust_name']);
		$cust_loc 	 = mysqli_real_escape_string($db, $_POST['cust_loc']);
		$cust_no 	 = mysqli_real_escape_string($db, $_POST['cust_no']);
		$cust_qty 	 = mysqli_real_escape_string($db, $_POST['cust_qty']);
		$total_amt 	 = mysqli_real_escape_string($db, $_POST['total_amt']);
		$amt_paid 	 = mysqli_real_escape_string($db, $_POST['amt_paid']);
		$pymt_period = mysqli_real_escape_string($db, $_POST['payment_period']);
		$date_taken  = mysqli_real_escape_string($db, $_POST['date_taken']);

		$insert_cred = "INSERT INTO tbl_creditors(cust_name, location, phone_number, qty, total_amount,	amount_paid, payment_period, date_taken, emp_id)VALUES('$cust_name', '$cust_loc', '$cust_no', '$cust_qty', '$total_amt', '$amt_paid', '$pymt_period', NOW(), '$emp_id')";
		$run_cred   = mysqli_query($db, $insert_cred);

		if($run_cred)
		{
			echo "<script>alert('Creditor added successfully!')</script>";
			echo "<script>document.location='creditor-details.php'</script>";
		}


	}



?>