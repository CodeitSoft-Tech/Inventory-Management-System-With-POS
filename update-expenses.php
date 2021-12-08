<?php 

		include("includes/db_conn.php");

		$expense_id	   = mysqli_real_escape_string($db, $_POST['expense_id']);
	    $cat_name      = mysqli_real_escape_string($db, $_POST['cat_name']);
		$expense_amt   = mysqli_real_escape_string($db, $_POST['expense_amt']);
		

		$update_exp = "UPDATE tbl_expenses SET expense_cat_id = '$cat_name', expense_amount = '$expense_amt', expense_date = NOW() WHERE expense_id = '$expense_id'";
		$run_exp   = mysqli_query($db, $update_exp);


		if($run_exp)
		{
			echo "<script>alert('Expenses updated successfully!')</script>";
			echo "<script>document.location='expenses.php'</script>";
		}




?>