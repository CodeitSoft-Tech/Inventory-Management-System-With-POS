<?php  

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['expense_id']);

		$delete     = "DELETE FROM tbl_expenses WHERE expense_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>document.location='expenses.php'</script>";
		}
	}	


?>