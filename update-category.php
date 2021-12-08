<?php 
	
	include("includes/db_conn.php");

	$cat_id   = mysqli_real_escape_string($db, $_POST['cat_id']);
	$cat_name = mysqli_real_escape_string($db, $_POST['cat_name']);


	$update_cat = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
	$run_cat    = mysqli_query($db, $update_cat);

	if($run_cat)
	{
		echo "<script>alert('Category updated successfully!')</script>";
		echo "<script>document.location='product-category.php'</script>";
	}

?>