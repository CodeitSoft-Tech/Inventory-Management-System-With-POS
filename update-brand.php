<?php 
	
	include("includes/db_conn.php");

	$brand_id   = mysqli_real_escape_string($db, $_POST['brand_id']);
	$brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);


	$update_brand = "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE brand_id = '$brand_id'";
	$run_brand    = mysqli_query($db, $update_brand);

	if($run_brand)
	{
		echo "<script>alert('Brand updated successfully!')</script>";
		echo "<script>document.location='brand.php'</script>";
	}

?>