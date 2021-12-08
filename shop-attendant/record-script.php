<?php

	
	include('includes/db_conn.php');

	
	function ShowDiscountAmt()
	{
			 global $db;

			 $username = $_SESSION['emp_username'];
	         $get_ad   = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
	         $run_ad   = mysqli_query($db, $get_ad);
	         $row_ad   = mysqli_fetch_array($run_ad);
	         $admin_id = $row_ad['emp_id'];
    

			 // Total Amount
		     $tot_dis   = "SELECT * FROM tbl_sales WHERE emp_id = '$admin_id'";
		     $run_dis   = mysqli_query($db, $tot_dis);

		     $dis_amt = 0;

		     while($row_dis   = mysqli_fetch_array($run_dis))
		     {
		        $dis_amt += $row_dis['discount'];

		     }

		     $count_dis_amt = number_format($dis_amt, 2);
		     echo $count_dis_amt;            
	}

	
	function ShowSalesAmt()
	{
			 global $db;

			 $username = $_SESSION['emp_username'];
	         $get_ad   = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
	         $run_ad   = mysqli_query($db, $get_ad);
	         $row_ad   = mysqli_fetch_array($run_ad);
	         $admin_id = $row_ad['emp_id'];
    
            
             // Total Amount
		     $sales_amt = 0;
		     $total_sales     = "SELECT * FROM tbl_sales WHERE emp_id = '$admin_id'";
		     $run_sales       = mysqli_query($db, $total_sales);
		     while($row_sales = mysqli_fetch_array($run_sales))
		     {
		        $sales_amt += $row_sales['amount_due'];
		     }
		     $count_sales_amt = number_format($sales_amt, 2);
             echo $count_sales_amt;
   
	}

	function ShowProduct()
	{
			global $db;

			// Total Upcoming Event
		    $tot_product   = "SELECT * FROM product_tbl";

		    $run_prod    = mysqli_query($db, $tot_product);

		    $count_prod = mysqli_num_rows($run_prod);

		    echo $count_prod;
	}

	

	function ShowOverallAmt()
	{
		global $db;

		$query   = "SELECT * FROM income_tbl";
		$run_inc = mysqli_query($db, $query);

		$inc_amt = 0;
        $tax_amt = 0;
		while($row_inc = mysqli_fetch_array($run_inc))
        {
            $inc_amt += $row_inc['income_amt'];
            $tax_amt += $row_inc['income_tax'];
         }

        $overall_inc_amt = number_format(($inc_amt - $tax_amt), 2);
        echo $overall_inc_amt; 

	}


	
	function ShowExpenses()
	{
		 global $db;

		  $username = $_SESSION['emp_username'];
	      $get_ad   = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
	      $run_ad   = mysqli_query($db, $get_ad);
	      $row_ad   = mysqli_fetch_array($run_ad);
	      $admin_id = $row_ad['emp_id'];

		 // Total Expenses 
	     $tot_exp   = "SELECT * FROM tbl_expenses WHERE emp_id = '$admin_id'";
	     $run_exp   = mysqli_query($db, $tot_exp);
	     $exp_amt = 0;
	     while($row_exp = mysqli_fetch_array($run_exp))
	     {
	        $exp_amt += $row_exp['expense_amount'];
	     }
	     
	     $count_exp_amt = number_format($exp_amt, 2);
	     echo $count_exp_amt;

	}




?>