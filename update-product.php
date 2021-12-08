<?php 

		include("includes/db_conn.php");

		$prod_id	= mysqli_real_escape_string($db, $_POST['prod_id']);
	    $prod_name  = mysqli_real_escape_string($db, $_POST['prod_name']);
		$prod_cat   = mysqli_real_escape_string($db, $_POST['prod_cat']);
		$prod_sup   = mysqli_real_escape_string($db, $_POST['prod_sup']);
		$prod_brand = mysqli_real_escape_string($db, $_POST['prod_brand']);
		$prod_price = mysqli_real_escape_string($db, $_POST['prod_price']);
		$reorder    = mysqli_real_escape_string($db, $_POST['reorder']);
		$status     = mysqli_real_escape_string($db, $_POST['prod_status']);
		$expiry_date = mysqli_real_escape_string($db, $_POST['expiry_date']);


		$update_prod = "UPDATE product_tbl SET cat_id = '$prod_cat', supplier_id = '$prod_sup', brand_id = '$prod_brand', prod_name = '$prod_name', prod_price = '$prod_price', expiry_date = '$expiry_date', reorder = '$reorder', prod_status = '$status' WHERE prod_id = '$prod_id'";
		$run_prod  = mysqli_query($db, $update_prod);


		if($run_prod)
		{
			echo "<script>alert('Product updated successfully!')</script>";
			echo "<script>document.location='view-product.php'</script>";
		}




?>