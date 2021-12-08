<?php 

		
	include("includes/db_conn.php");

	$admin_id   = mysqli_real_escape_string($db, $_POST['admin_id']);
	$fullname   = mysqli_real_escape_string($db, $_POST['fullname']);
	$role       = mysqli_real_escape_string($db, $_POST['role']);
	$status     = mysqli_real_escape_string($db, $_POST['status']);


	$update_admin = "UPDATE tbl_employees SET fullname = '$fullname', role = '$role', status = '$status' WHERE emp_id = '$admin_id'";
	$run_admin  = mysqli_query($db, $update_admin);

	if($run_admin)
	{
		echo "<script>alert('Employee's Details updated successfully!')</script>";
		echo "<script>document.location='employees.php'</script>";
	}



?>