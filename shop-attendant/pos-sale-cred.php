<?php 


	session_start();
	include('includes/db_conn.php');


	$discount   = $_POST['discount'];
	//$payment  = $_POST['payment'];
	$amount_due = $_POST['amount_due'];
	date_default_timezone_set("Africa/Accra"); 
	//$date     = date("Y-m-d H:i:s");
	$total      = $amount_due - $discount;
	$tendered   = $_POST['tendered'];
	$change     = $_POST['change'];
	$paymt_type = mysqli_real_escape_string($db, $_POST['paymt_type']);

	$username  = $_SESSION['emp_username'];
	$get_admin = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
	$run_admin = mysqli_query($db, $get_admin);
	$row_admin = mysqli_fetch_array($run_admin);
	$emp_id    = $row_admin['emp_id'];

	// Put Sales summary into sales table 
	// Get the sales id and put it into thw sales_details table to linkup with temp_trans data
	// Reduce the product's qty purchased from qty on the product table
	// Select Order no

	mysqli_query($db, "INSERT INTO tbl_cred_sales(emp_id, discount, amount_due, total, date_added, modeofpayment, cash_tendered, cash_change) 
	VALUES('$emp_id','$discount','$amount_due','$total', NOW(), '$paymt_type', '$tendered', '$change')")or die(mysqli_error($db));
	
	// Get Last Inserted Sale ID	
	$sales_id = mysqli_insert_id($db);
	$_SESSION['sid'] = $sales_id;

	$query = mysqli_query($db,"select * from temp_trans_cred")or die(mysqli_error($db));

		while($row = mysqli_fetch_array($query))
		{
			$pid   = $row['prod_id'];	
 			$qty   = $row['qty'];
			$price = $row['price'];
		
			mysqli_query($db, "INSERT INTO tbl_sales_details_cred(prod_id, qty, price, sales_id)VALUES('$pid','$qty','$price', '$sales_id')")or die(mysqli_error($db));
			mysqli_query($db, "UPDATE product_tbl SET prod_qty = prod_qty - '$qty' where prod_id = '$pid'") or die(mysqli_error($db)); 
		}

	$qry     = mysqli_query($db,"select * from product_tbl where prod_id = '$pid'")or die(mysqli_error());
    $row_q   = mysqli_fetch_array($qry);
	$product = $row_q['prod_name'];
	$remarks = "has credited $qty quantities of $product amounted GHC $amount_due";  
	
	mysqli_query($db, "INSERT INTO credit_log(emp_id, action, log_date)VALUES('$emp_id','$remarks', NOW())")or die(mysqli_error($db));
			
	mysqli_query($db,"INSERT INTO tbl_cred_payment(emp_id, payment, payment_date, payment_for, due ,status, sales_id) 
						VALUES('$emp_id','$total',NOW(), NOW(), '$total','paid','$sales_id')")or die(mysqli_error($db));
	echo "<script>document.location ='receipt-creditor.php'</script>";  	
		
	$result = mysqli_query($db, "DELETE FROM temp_trans_cred")or die(mysqli_error($db));	
	
?>