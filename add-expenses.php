<?php   
	
	include("includes/db_conn.php");

	if(isset($_POST['add_exp']))
	{
		$expense_cat = mysqli_real_escape_string($db, $_POST['expense_cat']);
		$expense_amt = mysqli_real_escape_string($db, $_POST['expense_amount']);

		$insert_exp = "INSERT INTO tbl_expenses(expense_cat_id, expense_amount, expense_date)VALUES('$expense_cat', '$expense_amt', NOW())";
		$run_exp    = mysqli_query($db, $insert_exp);


		if($run_exp)
		{
			echo "<script>alert('Expenses added successfully!')</script>";
			echo "<script>document.location='expenses.php'</script>";
		}

	}


?>