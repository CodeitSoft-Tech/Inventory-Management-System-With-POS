<?php 
	
	include("includes/db_conn.php");

	$cat_id   = mysqli_real_escape_string($db, $_POST['cat_id']);
	$cat_name = mysqli_real_escape_string($db, $_POST['expense_cat_name']);


	$update_cat = "UPDATE tbl_expense_cat SET expense_cat_name = '$cat_name' WHERE expense_cat_id = '$cat_id'";
	$run_cat    = mysqli_query($db, $update_cat);

	if($run_cat)
	{
		echo "<script>alert('Category updated successfully!')</script>";
		echo "<script>document.location='expenses-category.php'</script>";
	}

?>