<?php   
	
	include("includes/db_conn.php");

	if(isset($_POST['add_exp']))
	{
		$admin_id    = mysqli_real_escape_string($db, $_POST['admin_id']);
		$expense_cat = mysqli_real_escape_string($db, $_POST['expense_cat']);
		$expense_amt = mysqli_real_escape_string($db, $_POST['expense_amount']);

		$insert_exp = "INSERT INTO tbl_expenses(expense_cat_id, admin_id, emp_id, expense_amount, expense_date)VALUES('$expense_cat', '0', '$admin_id', '$expense_amt', NOW())";
		$run_exp    = mysqli_query($db, $insert_exp);


		if($run_exp)
		{
			echo "<script>alert('Expenses added successfully!')</script>";
			echo "<script>document.location='expenses.php'</script>";
		}

	}


?>