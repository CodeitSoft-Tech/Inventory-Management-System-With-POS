<?php  

		session_start();

		include("includes/db_conn.php");

		$prod_name    = mysqli_real_escape_string($db,  $_POST['prod_name']);
		$prod_qty  	  = mysqli_real_escape_string($db,  $_POST['prod_qty']);
		$expiry_date  = mysqli_real_escape_string($db,  $_POST['expiry_date']);
	
		$username     = $_SESSION['admin_username'];
		$get_admin    = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
		$run_ad       = mysqli_query($db, $get_admin);
		$row_ad       = mysqli_fetch_array($run_ad);
		$admin_id     = $row_ad['admin_id']; 

		$query        = mysqli_query($db,"select prod_name from product_tbl where prod_id = '$prod_name'")or die(mysqli_error());
    	$row          = mysqli_fetch_array($query);
		$product      = $row['prod_name'];
		$remarks      = "added $prod_qty quantities of $product into the warehouse";  

		mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));

		$insert_prod  = "INSERT INTO tbl_warehouse(prod_id, prod_qty, expiry_date, warehse_date)VALUES('$prod_name', '$prod_qty', '$expiry_date', NOW())";
		$run_prod     = mysqli_query($db, $insert_prod);

		if($run_prod)
		{
			echo "<script>alert('Product added to warehouse successfully!')</script>";
			echo "<script>document.location='add-prod-warehouse.php'</script>";
		}


?>