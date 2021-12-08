<?php 


	include("includes/db_conn.php");

	
	$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
	$role     = mysqli_real_escape_string($db, $_POST['role']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$status   = mysqli_real_escape_string($db, $_POST['status']);

	$insert_user = "INSERT INTO tbl_employees(fullname, role, emp_username, emp_password, status)VALUES('$fullname', '$role', '$username', '$password', '$status')";
	$run_user = mysqli_query($db, $insert_user);

	if($run_user)
	{
		echo "<script>alert('New Employee added successfully!')</script>";
		echo "<script>document.location='employees.php'</script>";
	}


?>