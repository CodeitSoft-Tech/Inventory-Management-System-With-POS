<?php

	include('includes/db_conn.php');

	$total = "";
	if(isset($_POST['cal-profit'])) 
	{

		$net_sales      = mysqli_real_escape_string($db, $_POST['net_sales']);
		$cogs	    	= mysqli_real_escape_string($db, $_POST['goods_cost']);
		$expenses  		= mysqli_real_escape_string($db, $_POST['expenses']);
			
		$total = $net_sales - $cogs - $expenses;

	}


	// Send profit info to database
	if(isset($_POST['save-profit'])) 
	{
		$net_sales  	= mysqli_real_escape_string($db, $_POST['net_sales']);
		$cogs	    	= mysqli_real_escape_string($db, $_POST['goods_cost']);
		$expenses  		= mysqli_real_escape_string($db, $_POST['expenses']);
		$result 		= mysqli_real_escape_string($db, $_POST['result']);
		$profit_date  	= mysqli_real_escape_string($db, $_POST['profit_date']);

		$sql = "INSERT INTO tbl_profit(net_sales, cogs, expenses, gross_profit, profit_date) VALUES('$net_sales', '$cogs', '$expenses', '$result', '$profit_date')";
		$query = mysqli_query($db, $sql) or die("Error: ".mysqli_error($db));

		if($query)
		{
			echo "<script>alert('Profit saved successfully')</script>";
			echo "<script>document.location='profit-cal.php'</script>";
		}

	}





?>