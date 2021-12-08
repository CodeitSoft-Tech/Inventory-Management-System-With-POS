<?php  

		session_start();

		include("includes/db_conn.php");

		$ErrorProduct = array();

		$prod_name = mysqli_real_escape_string($db,  $_POST['prod_name']);
		$prod_qty  = mysqli_real_escape_string($db,  $_POST['prod_qty']);

		// Check if product exist in warehouse
		$get_wh = "SELECT * FROM tbl_warehouse WHERE prod_id = '$prod_name'";
		$run_wh = mysqli_query($db, $get_wh);
		$row_wh = mysqli_fetch_array($run_wh);
		$qty    = $row_wh['prod_qty']; 
		if(mysqli_num_rows($run_wh) > 0)
		{	
			if($qty <= 0)
			{
				echo "<script>alert('Product selected is out of stock!')</script>";
			    echo "<script>document.location='move-prod-warehouse.php'</script>";
			}
			else
			{

			$username   = $_SESSION['admin_username'];
			$get_admin  = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
			$run_ad     = mysqli_query($db, $get_admin);
			$row_ad     = mysqli_fetch_array($run_ad);
			$admin_id   = $row_ad['admin_id']; 

			$query   = mysqli_query($db,"select prod_name from product_tbl where prod_id = '$prod_name'")or die(mysqli_error());  	
	    	$row     = mysqli_fetch_array($query);
			$product = $row['prod_name'];
			$remarks = "moved $prod_qty quantities of $product to store from warehouse";  

			mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));

			// Update product qty in store while reducing qty at the warehouse.
			mysqli_query($db, "UPDATE product_tbl SET prod_qty = prod_qty + '$prod_qty' where prod_id = '$prod_name'") or die(mysqli_error($db));
			mysqli_query($db, "UPDATE tbl_warehouse SET prod_qty = prod_qty - '$prod_qty' where prod_id = '$prod_name'") or die(mysqli_error($db));

			// Insert product to move product table.
			mysqli_query($db, "INSERT INTO tbl_warehse_prod_moved(admin_id, prod_id, product_qty, date_moved)VALUES('$admin_id', '$prod_name', '$prod_qty', NOW())")or die(mysqli_error($db)); 

			echo "<script>alert('Product moved to store successfully!')</script>";
			echo "<script>document.location='move-prod-warehouse.php'</script>";
			
		}
	  }
		else
		{	
			echo "<script>alert('Product selected not stocked at the warehouse!')</script>";
			echo "<script>document.location='move-prod-warehouse.php'</script>";		
		}
	
	



?>