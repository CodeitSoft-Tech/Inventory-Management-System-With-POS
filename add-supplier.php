<?php 

	include("includes/db_conn.php");


	if(isset($_POST['add_sup']))
	{

		$sup_name 	= mysqli_real_escape_string($db, $_POST['sup_name']);
		$sup_loc 	= mysqli_real_escape_string($db, $_POST['sup_loc']);
		$sup_phone 	= mysqli_real_escape_string($db, $_POST['sup_phone']);
		$sup_email 	= mysqli_real_escape_string($db, $_POST['sup_email']);


		$insert_sup = "INSERT INTO tbl_suppliers(sup_name, sup_loc, sup_phone, sup_email)VALUES('$sup_name', '$sup_loc', '$sup_phone', '$sup_email')";
		$run_sup    = mysqli_query($db, $insert_sup);

		if($run_sup)
		{
			echo "<script>alert('Supplier added successfully!')</script>";
			echo "<script>document.location='supplier.php'</script>";
		}


	}



?>