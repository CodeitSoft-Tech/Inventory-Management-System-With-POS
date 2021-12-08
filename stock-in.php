<?php 
	
	session_start();
	include('includes/db_conn.php');
	
	$name 	= mysqli_real_escape_string($db, $_POST['prod_name']);
	$qty 	= mysqli_real_escape_string($db, $_POST['qty']);
	$cp 	= mysqli_real_escape_string($db, $_POST['cost_price']);
	
	
	date_default_timezone_set('Africa/Accra');

	$username   = $_SESSION['admin_username'];
	$get_ademin = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
	$run_ad     = mysqli_query($db, $get_ademin);
	$row_ad     = mysqli_fetch_array($run_ad);
	$admin_id   = $row_ad['admin_id']; 
	
	$query = mysqli_query($db,"select prod_name from product_tbl where prod_id = '$name'")or die(mysqli_error());
    $row     = mysqli_fetch_array($query);
	$product = $row['prod_name'];
	$remarks = "added $qty quantities of $product to store";  
	
	mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));
		

	mysqli_query($db, "UPDATE product_tbl SET prod_qty = prod_qty + '$qty' where prod_id = '$name'") or die(mysqli_error($db)); 	
			
	mysqli_query($db, "INSERT INTO tbl_stockin(prod_id, qty, cost_price, stockin_date)VALUES('$name', '$qty', '$cp', NOW())")or die(mysqli_error($db));

	echo "<script>alert('New stock added successfully!');</script>";
	echo "<script>document.location='add-stock.php'</script>";  
	
?>