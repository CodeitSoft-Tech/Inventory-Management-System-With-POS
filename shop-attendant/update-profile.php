<?php 

	include("includes/db_conn.php");

	if(isset($_POST['update-profile']))
	{

		$emp_id   = mysqli_real_escape_string($db, $_POST['admin_id']);
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);

		// image processing
		$admin_img    = $_FILES['user_img']['name'];
		$temp_name    = $_FILES['user_img']['tmp_name'];
		move_uploaded_file($temp_name,"user_images/$admin_img");

		if($admin_img == "")
		{
			$update_pro = "UPDATE tbl_employees SET fullname = '$fullname' WHERE emp_id = '$emp_id'";
			$run_pro    = mysqli_query($db, $update_pro);

			if($run_pro)
			{
				echo "<script>alert('Profile updated successfully!')</script>";
				echo "<script>document.location='profile.php'</script>";
			}
		}
		else
		{
			$update_pro = "UPDATE tbl_employees SET fullname = '$fullname', emp_img = '$admin_img' WHERE emp_id = '$emp_id'";
			$run_pro    = mysqli_query($db, $update_pro);

			if($run_pro)
			{
				echo "<script>alert('Profile updated successfully!')</script>";
				echo "<script>document.location='profile.php'</script>";
			}
		}
   }

 ?>