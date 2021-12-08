<?php 

	include("includes/db_conn.php");


	if(isset($_POST['add_brand']))
	{

		$brand_name = mysqli_real_escape_string($db, $_POST['brand_name']);

		$insert_brand = "INSERT INTO tbl_brand(brand_name)VALUES('$brand_name')";
		$run_brand    = mysqli_query($db, $insert_brand);

		if($run_brand)
		{
			echo "<script>alert('Brand added successfully!')</script>";
			echo "<script>document.location='brand.php'</script>";
		}


	}



?>