<?php 
	
	include("includes/db_conn.php");


	$id = mysqli_real_escape_string($db, $_POST['temp_id']);
	$qty = mysqli_real_escape_string($db, $_POST['qty']);
	//$size = mysqli_real_escape_string($db, $_POST['size']);

	$update_tmp = "UPDATE temp_trans SET qty = '$qty' WHERE temp_trans_id = '$id'";
	$run_tmp    = mysqli_query($db, $update_tmp);

	if($run_tmp)
	{
		echo "<script>document.location='pos.php'</script>";
	}


?>