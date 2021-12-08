<?php  

	include("includes/db_conn.php");


	if(isset($_POST['btn-prod']))
	{
		$prod_name  = mysqli_real_escape_string($db, $_POST['prod_name']);
		$prod_cat   = mysqli_real_escape_string($db, $_POST['prod_cat']);
		$prod_sup   = mysqli_real_escape_string($db, $_POST['prod_sup']);
		$prod_brand = mysqli_real_escape_string($db, $_POST['prod_brand']);
		$prod_price = mysqli_real_escape_string($db, $_POST['prod_price']);
		$reorder    = mysqli_real_escape_string($db, $_POST['reorder']);
		$status     = mysqli_real_escape_string($db, $_POST['prod_status']);
		$expiry_date = mysqli_real_escape_string($db, $_POST['expiry_date']);


		$insert_prod = "INSERT INTO product_tbl(cat_id, supplier_id, brand_id, prod_name, prod_price, expiry_date, reorder, prod_status)VALUES('$prod_cat', '$prod_sup', '$prod_brand', '$prod_name', '$prod_price', '$expiry_date', '$reorder', '$status')";
		$run_prod   = mysqli_query($db, $insert_prod)or die(mysqli_error($db));


		if($run_prod)
		{
			echo "<script>alert('Product added successfully!')</script>";
			echo "<script>document.location='add-product.php'</script>";
		}


	}


?>