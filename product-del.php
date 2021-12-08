<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['prod_id']);

		$delete     = "DELETE FROM product_tbl WHERE prod_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Product deleted successfully')</script>";
			echo "<script>document.location='view-product.php'</script>";
		}
	}	


?>