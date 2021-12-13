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


	$username  = $_SESSION['admin_username'];
	$get_admin = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
	$run_admin = mysqli_query($db, $get_admin);
	$row_admin = mysqli_fetch_array($run_admin);
	$admin_id  = $row_admin['admin_id'];

	// Put Sales summary into sales table 
	// Get the sales id and put it into thw sales_details table to linkup with temp_trans data
	// Reduce the product's qty purchased from qty on the product table
	// Select Order no

	mysqli_query($db, "INSERT INTO tbl_sales(admin_id, discount, amount_due, total, date_added, modeofpayment, cash_tendered, cash_change) 
	VALUES('$admin_id','$discount','$amount_due','$total', NOW(),'cash','$tendered','$change')")or die(mysqli_error($db));
	
	// Get Last Sale ID	
	$sales_id = mysqli_insert_id($db);
	$_SESSION['sid'] = $sales_id;

	$query = mysqli_query($db,"select * from temp_trans")or die(mysqli_error($db));

		while($row = mysqli_fetch_array($query))
		{
			$pid   = $row['prod_id'];	
 			$qty   = $row['qty'];
			$price = $row['price'];
		
			mysqli_query($db, "INSERT INTO tbl_sales_details(prod_id, qty, price, sales_id)VALUES('$pid','$qty','$price', '$sales_id')")or die(mysqli_error($db));
			mysqli_query($db, "UPDATE product_tbl SET prod_qty = prod_qty - '$qty' where prod_id = '$pid'") or die(mysqli_error($db)); 
		}
			
		mysqli_query($db,"INSERT INTO tbl_payment(admin_id, payment, payment_date, payment_for, due ,status, sales_id) 
						VALUES('$admin_id','$total',NOW(), NOW(), '$total','paid','$sales_id')")or die(mysqli_error($db));
		echo "<script>document.location ='receipt-creditor.php'</script>";  	
		
		$result = mysqli_query($db, "DELETE FROM temp_trans")or die(mysqli_error($db));	
	
?>