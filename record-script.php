<?php

	include('includes/db_conn.php');


    
	function ShowDiscountAmt()
	{
			 global $db;

			 // Total Amount
		     $tot_dis   = "SELECT * FROM tbl_sales";
		     $run_dis   = mysqli_query($db, $tot_dis);

		     $dis_amt = 0;

		     while($row_dis   = mysqli_fetch_array($run_dis))
		     {
		        $dis_amt += $row_dis['discount'];

		     }

		     $count_dis_amt = number_format($dis_amt, 2);
		     echo $count_dis_amt;            
	}



	function ShowCreditAmt()
	{
			 global $db;

			 // Total Amount
		     $tot_cred   = "SELECT * FROM tbl_creditors";
		     $run_cred   = mysqli_query($db, $tot_cred);

		     $cred_amt = 0;

		     while($row_cred = mysqli_fetch_array($run_cred))
		     {
		        $cred_amt += $row_cred['total_amount'];

		     }

		     $count_cred_amt = number_format($cred_amt, 2);
		     echo $count_cred_amt;            
	}


	function ShowStoreStock()
	{
			 global $db;

			 // Total Amount
		     $tot_stk   = "SELECT * FROM tbl_stockin";
		     $run_stk   = mysqli_query($db, $tot_stk);

		     $stk_qty = 0;

		     while($row_stk = mysqli_fetch_array($run_stk))
		     {
		        $stk_qty += $row_stk['qty'];

		     }

		    echo $stk_qty;            
	}



	function ShowWhseStock()
	{
			 global $db;

			 // Total Amount
		     $tot_wh   = "SELECT * FROM tbl_warehouse";
		     $run_wh   = mysqli_query($db, $tot_wh);

		     $wh_qty = 0;

		     while($row_wh = mysqli_fetch_array($run_wh))
		     {
		        $wh_qty += $row_wh['prod_qty'];

		     }

		    echo $wh_qty;            
	}

	function ShowSalesAmt()
	{
			 global $db;
            
             // Total sales for the last 30 days
		     $sales_amt = 0;
		     $total_sales = "SELECT * FROM tbl_sales WHERE date_added > NOW() - INTERVAL 30 DAY";
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

		 // Total Expenses 
	     $tot_exp   = "SELECT * FROM tbl_expenses";
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