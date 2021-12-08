<?php 

	include("includes/db_conn.php");

	if(isset($_POST['update-profile']))
	{

		$emp_id   = mysqli_real_escape_string($db, $_POST['admin_id']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		
		$update_pro = "UPDATE tbl_employees SET emp_username = '$username', emp_password = '$password' WHERE emp_id = '$emp_id'";
		$run_pro    = mysqli_query($db, $update_pro);

		if($run_pro)
		{
			echo "<script>alert('Account updated successfully. Please login to confirm changes!')</script>";
			echo "<script>document.location='login.php'</script>";
		}
		
   }

 ?>