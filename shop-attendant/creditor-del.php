<?php  

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['cred_id']);

		$delete     = "DELETE FROM tbl_creditors WHERE creditor_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo"<script>alert('Creditor details deleted successfully!')</script>";
			echo "<script>document.location='creditor-details.php'</script>";
		}
	}	


?>