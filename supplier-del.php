<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['sup_id']);

		$delete     = "DELETE FROM tbl_suppliers WHERE sup_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Supplier deleted successfully')</script>";
			echo "<script>document.location='supplier.php'</script>";
		}
	}	


?>