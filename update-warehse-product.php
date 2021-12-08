<?php 
		session_start();

		include("includes/db_conn.php");

		$warehse_id	  = mysqli_real_escape_string($db, $_POST['warehse_id']);
	    $prod_name    = mysqli_real_escape_string($db, $_POST['prod_name']);
		$prod_qty     = mysqli_real_escape_string($db, $_POST['prod_qty']);
		$expiry_date  = mysqli_real_escape_string($db, $_POST['expiry_date']);

		$username   = $_SESSION['admin_username'];
		$get_admin  = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
		$run_ad     = mysqli_query($db, $get_admin);
		$row_ad     = mysqli_fetch_array($run_ad);
		$admin_id   = $row_ad['admin_id']; 

		$query   = mysqli_query($db,"select prod_name from product_tbl where prod_id = '$prod_name'")or die(mysqli_error());
    	$row     = mysqli_fetch_array($query);
		$product = $row['prod_name'];
		$remarks = "added $prod_qty of $product";

		mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));  
		
		$update_hse = "UPDATE tbl_warehouse SET prod_id = '$prod_name', prod_qty = '$prod_qty', expiry_date = '$expiry_date', warehse_date = NOW() WHERE warehse_id = '$warehse_id'";
		$run_hse   = mysqli_query($db, $update_hse);

		if($run_hse)
		{
			echo "<script>alert('Warehouse product updated successfully!')</script>";
			echo "<script>document.location='view-prod-warehouse.php'</script>";
		}


?>