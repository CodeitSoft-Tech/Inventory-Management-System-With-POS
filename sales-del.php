<?php  

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['temp_id']);

		$delete     = "DELETE FROM temp_trans WHERE temp_trans_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>document.location='pos.php'</script>";
		}
	}	


?>