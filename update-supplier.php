<?php 
	
	include("includes/db_conn.php");

	$sup_id     = mysqli_real_escape_string($db, $_POST['sup_id']);
	$sup_name 	= mysqli_real_escape_string($db, $_POST['sup_name']);
	$sup_loc 	= mysqli_real_escape_string($db, $_POST['sup_loc']);
	$sup_phone 	= mysqli_real_escape_string($db, $_POST['sup_phone']);
	$sup_email 	= mysqli_real_escape_string($db, $_POST['sup_email']);

	$update_sup = "UPDATE tbl_suppliers SET sup_name = '$sup_name', sup_loc = '$sup_loc', sup_phone = '$sup_phone', sup_email = '$sup_email' WHERE sup_id = '$sup_id'";
	$run_sup    = mysqli_query($db, $update_sup);

	if($run_sup)
	{
		echo "<script>alert('Supplier updated successfully!')</script>";
		echo "<script>document.location='supplier.php'</script>";
	}

?>