<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['stockin_id']);
		$qty = mysqli_real_escape_string($db, $_POST['qty']);
		$prod_id = mysqli_real_escape_string($db, $_POST['prod_id']);


		$delete     = "DELETE FROM tbl_stockin WHERE stockin_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));


		mysqli_query($db, "UPDATE product_tbl SET prod_qty = prod_qty - '$qty' where prod_id = '$prod_id'") or die(mysqli_error($db)); 

		if($run_delete)
		{
			echo "<script>alert('Stock deleted successfully')</script>";
			echo "<script>document.location='add-stock.php'</script>";
		}
	}	


?>