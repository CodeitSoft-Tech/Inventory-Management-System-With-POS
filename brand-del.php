<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['brand_id']);

		$delete     = "DELETE FROM tbl_brand WHERE brand_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Brand deleted successfully')</script>";
			echo "<script>document.location='brand.php'</script>";
		}
	}	


?>