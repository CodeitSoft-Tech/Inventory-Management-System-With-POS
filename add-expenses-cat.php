<<?php 

	include("includes/db_conn.php");


	if(isset($_POST['exp-btn']))
	{

		$expense_cat_name = mysqli_real_escape_string($db, $_POST['expense_cat_name']);

		$insert_cat = "INSERT INTO tbl_expense_cat(expense_cat_name)VALUES('$expense_cat_name')";
		$run_cat    = mysqli_query($db, $insert_cat);

		if($run_cat)
		{
			echo "<script>alert('Category added successfully!')</script>";
			echo "<script>document.location='expenses-category.php'</script>";
		}


	}



?>