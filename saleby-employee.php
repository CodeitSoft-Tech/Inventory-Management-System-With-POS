<?php 

	include("includes/header.php");


		if(!isset($_SESSION['admin_username']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {


?>

<style type="text/css">
	
      @media print {
          .btn-print {
            display:none !important;
		  }

		  .main-footer	{
			display:none !important;
		  }

		  .box.box-primary {
			  border-top:none !important;
		  }

		  .angel{
			  display:none !important;
		  }
      
</style>

      <!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header btn-print">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Sales Report</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Sales Report By Employee</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Row -->
						<div class="row row-sm">
							
							<div class="col-md-12 btn-print">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Sales Report By Employee
									</div>
									<div class="card-body">
											<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12 col-md-12">
											<div class="card custom-card">
												<div class="card-body">

												<form method="post"> 
													<div>
												    <h6 class="main-content-label mb-1">Select Date Range to display Sales</h6>
													</div>
													<div class="row row-sm">
														<div class="col-lg-9">
															<div class="input-group">
																<div class="input-group-prepend">
																	<div class="input-group-text">
																		<i class="fe fe-calendar  lh--9 op-6"></i>
																	</div>
																</div>
															<input type="text" name="date" class="form-control pull-right" id="reservation">
															</div>
														</div>

												 <div class="form-group col-lg-9 mt-4">
												 <label class=""><b>Employee Name</b></label>
													<select name="emp_name" class="form-control select select2" required>
													<option label="Date"></option>
													<?php 
														$get_emp = "SELECT * FROM tbl_employees";
														$run_emp = mysqli_query($db, $get_emp);
														while($row_emp = mysqli_fetch_array($run_emp))
														{
															$emp_id   = $row_emp['emp_id'];
															$emp_name = $row_emp['fullname'];

															echo "<option value='$emp_id'>$emp_name</option>";
														}

													?>
													</select>
													</div>
													
													</div> <br>
													  <div class="form-group">
										           <button type="submit" class="btn btn-primary" name="display">Display</button>
										         </div>
												  </form>
												  <?php

									                 if(isset($_POST['display']))
									                 {
									                    $date       = $_POST['date'];
									                    $emp_name   = $_POST['emp_name'];
									                    $date       = explode('-',$date);
									                    $start      = date("Y/m/d",strtotime($date[0]));
									                    $end        = date("Y/m/d",strtotime($date[1]));

									                 ?>


									                 <?php 

									                 		$sel_em = "SELECT * FROM tbl_employees WHERE emp_id = '$emp_name'";
									                 		$run_em = mysqli_query($db, $sel_em);
									                 		$row_em = mysqli_fetch_array($run_em);
									                 		$emply_id = $row_em['emp_id'];
									                 		$fullname = $row_em['fullname'];

									                 ?>

												</div>
											</div>
										</div>
									</div>
									<!-- End Row -->
									</div>
								</div>
							</div>



							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Sales Report
									</div>
									<div class="card-body">
										         <?php
                  
						                      $query  = mysqli_query($db,"select * from tbl_shop_details")or die(mysqli_error());  
						                      $row    = mysqli_fetch_array($query);
						                  ?>

						                  <h5 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    <b><?php echo $row['shop_name']; ?></b> 
						                  </h5>  
						                  <h6 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    Address: <?php echo $row['address']; ?>
						                  </h6>
						                  <h6 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    Contact: <?php echo $row['phone_number']; ?>
						                  </h6>

						                   <h5 style="font-size: 20px; text-align: center; color: #6259CA; margin-bottom: 20px; ">
								            <b>

								              Sales Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?> by <?php echo $fullname; ?> 
								            </b>
								          </h5>
								          <hr>


								       <table id="example2" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
											<thead>
											 <tr>
											    <th>Transaction #</th>
						              <th>Product</th>
						              <th>Qty</th>
						            	<th>Price</th>
						              <th>Total Amount</th>
						  						<th>Payment Mode</th>
						              <th>Date Paid</th>
						              <th colspan="9">OverAll Total</th>     						  
											</tr>
											 </thead>
											 <tbody>
											  <?php
						                    	
							                 $sum2 = 0;  
							                 $grand = 0;
							                 $due  = 0;
							                 $gs = 0;


							                 $query = mysqli_query($db,"select * from tbl_sales natural join tbl_sales_details natural join product_tbl where date(date_added)>='$start' and date(date_added)<='$end' and emp_id = '$emply_id' order by date_added")or die(mysqli_error($db));
							                           		  
							                  while($row = mysqli_fetch_array($query))
							                  {
							                     $prod_id    = $row['prod_id'];
							                     $total      = $row['qty'] * $row['price'];
							                     $grand      = $grand + $total;
							                     $sum2       += $row['discount'];
							                     $prod_price = $row['prod_price'];
							                     $gs  			 += $row['price'];
							                     $pymt_mode   = $row['modeofpayment'];

							                     $all_grand = $grand - $sum2;

							                          
							                  ?>
							                <tr>
								                <td><?php echo $row['sales_id'];;?></td>
								                
								                <td><?php echo $row['prod_name'];?></td>
								                
								                <td><?php echo $row['qty'];?></td>
								    						
								                <td>₵<?php echo $row['price'];?></td>
								                
								                <td style="text-align:right">
								                   ₵<?php echo number_format($row['qty'] * $row['price'],2);?>
								                </td>
								                <td><?php echo $pymt_mode; ?></td>
								                <td><?php echo date("M d, Y",strtotime($row['date_added']));?></td> 
								                <td colspan="9"></td>   
							    		                      
							                </tr>

							              <?php } }  ?>	
							            </tbody>
							            <tfoot>
							          <tr>
							          </tr>

							          <tr>
							          <th colspan="9">Total Cost of goods Sold</th>
							          <th style="text-align:right;"><h4><b>₵<?php echo number_format($gs,2);?></b></h4></th>
							          </tr>

							          <tr>
							          <th colspan="9">Total Cash Sales</th>
							          <th style="text-align:right;"><h4><b>₵<?php echo number_format($grand,2);?></b></h4></th>
							          </tr>

											  <tr>
							            <th colspan="9">Total Discount</th>
							            <th style="text-align:right;"><h4><b>₵<?php echo number_format($sum2,2);?></b></h4></th>
							          </tr>  


											  <tr>
							            <th colspan="9">Overall Cash Sales</th>
							            <th style="text-align:right;"><h4><b>₵<?php echo number_format($all_grand,2);?></b></h4></th>
							          </tr>   

							            
							          <tr>
							            <th>Prepared by:</th>
							            <th>Signature:</th>
							          </tr> 
							                <?php
							                    
							                $username = $_SESSION['admin_username'];
										          $get_ad   = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
										          $run_ad   = mysqli_query($db, $get_ad);
										          $row_ad   = mysqli_fetch_array($run_ad);
										          $admin_id = $row_ad['admin_id'];

										          $query    = mysqli_query($db,"select * from admin_tbl where admin_id='$admin_id'")or die(mysqli_error($db));
										          $row      = mysqli_fetch_array($query);
							                ?>                      
							            <tr>
							              <th><?php echo $row['fullname']; ?></th>
							              <th></th> 
							            </tr> 

                                   
									</tfoot>
								   </table>

								     <div style="margin-top: 20px; margin-bottom: 70px;">
				            <a class = "btn btn-primary btn-print" href = "" onclick = "window.print()">
				              <i class ="fa fa-print"></i>
				              Print
				            </a>
				            <a class = "btn btn-primary btn-print" href="index.php">
				              <i class ="fa fa-arrow-left"></i>
				              Back to Homepage
				            </a>  
				            </div> 


									</div>
								</div>
							</div>
						</div>
					</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
					</div>
				</div>
			</div>
			<!-- End Main Content-->



<?php 
  
  include("includes/footer.php"); 

?>
<?php } ?>