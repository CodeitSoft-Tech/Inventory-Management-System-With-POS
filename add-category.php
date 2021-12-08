<?php 

	include("includes/db_conn.php");


	if(isset($_POST['add_prod']))
	{

		$cat_name = mysqli_real_escape_string($db, $_POST['cat_name']);

		$insert_cat = "INSERT INTO categories(cat_name)VALUES('$cat_name')";
		$run_cat    = mysqli_query($db, $insert_cat);

		if($run_cat)
		{
			echo "<script>alert('Category added successfully!')</script>";
			echo "<script>document.location='product-category.php'</script>";
		}


	}



?>