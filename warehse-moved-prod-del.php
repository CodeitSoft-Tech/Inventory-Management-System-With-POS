<?php  

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['moved_prod_id']);

		$username   = $_SESSION['admin_username'];
		$get_admin  = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
		$run_ad     = mysqli_query($db, $get_admin);
		$row_ad     = mysqli_fetch_array($run_ad);
		$admin_id   = $row_ad['admin_id']; 

		$query   = mysqli_query($db,"select prod_name from product_tbl where prod_id = '$prod_name'")or die(mysqli_error());
    	$row     = mysqli_fetch_array($query);
		$product = $row['prod_name'];
		$remarks = "$prod_qty quantities of $product has been deleted from product moved from warehouse records";

		mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));

		$delete     = "DELETE FROM tbl_warehse_prod_moved WHERE prod_moved_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Moved product removed successfully!')</script>";
			echo "<script>document.location='view-moved-prod.php'</script>";
		}
	}	


?>