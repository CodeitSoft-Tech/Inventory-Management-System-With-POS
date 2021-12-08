<?php  

	include("includes/db_conn.php");

	$prod_name 	= mysqli_real_escape_string($db, $_POST['prod_name']);
	$qty       	= mysqli_real_escape_string($db, $_POST['qty']);

	$query 		= "SELECT prod_price, prod_id FROM product_tbl WHERE prod_id = '$prod_name'";
	$run_query 	= mysqli_query($db, $query);
	$row 		= mysqli_fetch_array($run_query);
	$price 		= $row['prod_price'];

	$sel_temp 	= "SELECT * FROM temp_trans WHERE prod_id = '$prod_name'";
	$run_temp	= mysqli_query($db, $sel_temp);
	$count		= mysqli_num_rows($run_temp);
	//$total      = $price * $qty;

	if($count > 0)
	{
		$update_temp = "UPDATE temp_trans SET qty = qty + '$qty', price = '$price' WHERE prod_id = '$prod_name'";
		$run_update  = mysqli_query($db, $update_temp);
	}
	else
	{
		$insert_temp = "INSERT INTO temp_trans(prod_id, price, qty)VALUES('$prod_name', '$price', '$qty')";
		$run_insert  = mysqli_query($db, $insert_temp);
	}

	echo "<script>document.location='pos.php'</script>"; 


?>