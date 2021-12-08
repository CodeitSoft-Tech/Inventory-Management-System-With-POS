<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['admin_id']);

		$delete     = "DELETE FROM tbl_employees WHERE emp_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Employee deleted successfully')</script>";
			echo "<script>document.location='employees.php'</script>";
		}
	}	


?>