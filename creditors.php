<?php 

	include("includes/header.php");


	  if(!isset($_SESSION['admin_username']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {


?>



          <!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Finances</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Creditors</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-gray-800">
									  Creditor Details
									</div>
									<div class="card-body">
										<form method="post" action="add-creditor.php">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class=""> Customer Name</label>
														<input class="form-control" required="" name="cust_name" type="text">
													</div>
													
													<div class="form-group col-md-9">
														<label class="">Location</label>
														<input class="form-control" required="" name="cust_loc" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class="">Phone Number</label>
														<input class="form-control" required="" name="cust_no" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Quantity of goods</label>
														<input class="form-control" required="" name="cust_qty" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Total Amount </label>
														<input class="form-control" required="" name="total_amt" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Amount Paid </label>
														<input class="form-control" required="" name="amt_paid" type="text">
													</div>

													<div class="form-group col-md-9">
													<label class="">Payment Period</label>
													 <select name="payment_period" class="form-control select select2" required>
														<option label="year"></option>
														<option value="2 weeks">2 weeks</option>
													</select>
												   </div>
													
													<div class="form-group col-md-9">
													<button type="submit" name="btn-cred" class="btn ripple btn-main-primary">
														Add Creditor
													</button>
												  </div>
												</div>
											</div>
										</div>
										</form>
											
									 </div>
									</div>
								</div>
							</div>

							<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-gray-800">
									 List of Creditors
									</div>
									<div class="card-body">
										<table class="table" id="example2">
												<thead>
													<tr>
														<th class="wd-20p">No.</th>
														<th class="wd-20p">Customer Name</th>
														<th class="wd-15p">Location</th>	
														<th class="wd-20p">Phone Number</th>
														<th class="wd-20p">Quantity of goods</th>
														<th class="wd-20p">Total Amount</th>
														<th class="wd-20p">Amount Paid</th>
														<th class="wd-20p">Amount Left</th>
														<th class="wd-15p">Payment Period</th>
														<th class="wd-15p">End Date</th>
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

														$i = 0;
														$get_cred = "SELECT * FROM tbl_creditors";
														$run_cred = mysqli_query($db, $get_cred);

														while($row_cred = mysqli_fetch_array($run_cred))
														{
															$cred_id 		= $row_cred['creditor_id'];
															$cust_name 		= $row_cred['cust_name'];
															$cust_loc  		= $row_cred['location'];
															$cust_no		= $row_cred['phone_number'];
															$cust_qty		= $row_cred['qty'];
															$total_amt      = $row_cred['total_amount'];
															$amt_paid       = $row_cred['amount_paid'];
															$pymt_period 	= $row_cred['payment_period'];
															

															$amount_left = $total_amt - $amt_paid;


															$i++;
										
													?>
													<tr>
														<td><?php echo $i;         ?></td>
														<td><?php echo $cust_name; ?></td>
														<td><?php echo $cust_loc;  ?></td>
														<td><?php echo $cust_no;   ?></td>
														<td><?php echo $cust_qty;  ?></td>
														<td>₵<?php echo number_format($total_amt, 2);   ?></td>
														<td>₵<?php echo number_format($amt_paid, 2);    ?></td>
														<td>₵<?php echo number_format($amount_left, 2); ?></td>
														<td><?php echo $pymt_period; ?></td>
														<td>
														<?php      

															if($pymt_period == '2 weeks')
                        									{
                          										$date = date('M d, Y',strtotime('+2 week'));
                          										echo $date;
                        									}
														?>
														</td>
														<td>
														<a class="btn ripple btn-primary" data-target="#update<?php echo $cred_id; ?>" data-toggle="modal" href="#update<?php echo $cred_id; ?>"><i class="fa fa-eye"></i></a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $cred_id; ?>" data-toggle="modal" href="#delete<?php echo $cred_id; ?>"><i class="fa fa-trash"></i></a>

														</td>

													</tr>

			            <!-- Large Modal -->
						<div class="modal" id="update<?php echo $cred_id; ?>">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
									<h6 class="modal-title">Update Product Details</h6>
									<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
							        <form method="post" action="update-creditor.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="form-group col-md-9">
											  <label class=""> Customer Name</label>
											  <input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
											  <input class="form-control" required="" name="cust_name" value="<?php echo $cust_name; ?>" type="text">
											</div>
													
													<div class="form-group col-md-9">
														<label class="">Location</label>
														<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
														<input class="form-control" required="" value="<?php echo $cust_loc; ?>" name="cust_loc" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class="">Phone Number</label>
														<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
														<input class="form-control" required="" value="<?php echo $cust_no; ?>" name="cust_no" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Quantity of goods</label>
														<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
														<input class="form-control" required="" value="<?php echo $cust_qty; ?>" name="cust_qty" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Total Amount </label>
														<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
														<input class="form-control" required="" name="total_amt" value="<?php echo $total_amt; ?>" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Amount Paid </label>
														<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
														<input class="form-control" required="" name="amt_paid" value="<?php echo $amt_paid; ?>" type="text">
													</div>

													<div class="form-group col-md-9">
													<label class="">Payment Period</label>
													<input class="form-control" required="" name="cred_id" value="<?php echo $cred_id; ?>" type="hidden">
													 <select name="payment_period" class="form-control select select2" required>
														<option value="<?php echo $pymt_period; ?>"><?php echo $pymt_period; ?></option>
														<option value="2 weeks">2 weeks</option>
													</select>
												   </div>
										</div>
										
									<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit">Update Creditor Details</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $cred_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Creditors Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="creditor-del.php" method="post">
								 <input type="hidden" class="form-control" name="cred_id" value="<?php echo $cred_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Creditor?</p>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" name="delete" type="submit">Yes</button>
							<button class="btn ripple btn-danger" data-dismiss="modal" type="button">No</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Delete Modal -->
													
												 <?php } ?>
												</tbody>
											</table>

											
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