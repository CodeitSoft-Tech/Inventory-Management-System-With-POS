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
								<h2 class="main-content-title tx-24 mg-b-5">Sales Point</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">POS</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->
											
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-xl-9 col-md-12">
								<div class="card custom-card">
									<div class="card-header">
										<h5 class="mb-3 font-weight-bold tx-14">Sales Transaction</h5>
									</div>
									<div class="card-body">

										<div class="mb-4">
											<form method="post" action="add-sale.php">
											<div class="row">	
											<div class="form-group col-md-6">
											<label class="">Product Name</label>	
											<select name="prod_name" class="form-control select-lg select2">
												<option value="">Large Select</option>
												<?php 

													$get_pro ="SELECT * FROM product_tbl order by prod_name";
													$run_pro = mysqli_query($db, $get_pro);

													while($row_pro = mysqli_fetch_array($run_pro)) 
													{
														$prod_id 	= $row_pro['prod_id'];
														$prod_name	= $row_pro['prod_name'];


														echo "<option value='$prod_id'>$prod_name</option>";
													}

												?>
											</select>
										   </div>

										   <div class="form-group col-md-6">
											<!--<label class="">Product Size</label>	
											<select name="size" class="form-control select-lg select2">
												<option value="">Large Select</option>
												<option value="Full">Full</option>
												<option value="Half">Half</option>
												<option value="Quarter">Quarter</option>
											</select> -->

											<label class="">Quantity</label>
											<input type="text" name="qty" class="form-control" required>
										   </div>
										</div> 

										<div class="form-group">
										<button type="submit" name="" class="btn ripple btn-primary">
											Add to Cart
										</button>	
										</div>

										</form>
										</div>



										<hr>



										<div class="table-responsive mt-4">
											<table class="table border table-hover text-nowrap table-shopping-cart mb-0">
												<thead class="text-muted">
													<tr class="small text-uppercase">
														<th scope="col">Product</th>
														<th scope="col" class="wd-120">Quantity</th>
														<!--<th scope="col" class="wd-120">Size</th>-->
														<th scope="col" class="wd-120">Price</th>
														<th scope="col" class="wd-120">Total</th>
														<th scope="col" class="text-center " >Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

															$get_temp = "SELECT * FROM temp_trans";
														    $run_temp =  mysqli_query($db, $get_temp);
															
															$grand = 0;
															//$half_grand = 0; 
															//$qtr_grand  = 0;
															//$grand_total = 0;

															while($row_temp = mysqli_fetch_array($run_temp))
															{
																$id = $row_temp['temp_trans_id'];
																$prod_id = $row_temp['prod_id'];
																//$size    = $row_temp['size'];
																$price   = $row_temp['price'];
																$qty     = $row_temp['qty'];

																// Get Product Name

																$product = "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
																$run       = mysqli_query($db, $product);
																$row  	   = mysqli_fetch_array($run);
																$prod_name = $row['prod_name'];


																  // Full Cal
																  $total = $qty * $price;
					       										  $grand = $grand + $total;

					       										  // Half Cal
					       										  //$half_total = ((1/2)* $price);
					       										  //$half_grand = $half_grand + $half_total;

					       										  // Qtr Cal
																  //$qtr_total = ((1/4)* $price);
					       										  //$qtr_grand = $qtr_grand + $qtr_total;

					       										  

													?>

													    <tr>
														<td>
														 <div class="media">
														 <h6 class="font-weight-semibold mt-0 text-uppercase">
														 	<?php echo $prod_name; ?></h6>
														 </div>
														</td>
														<td>
															<?php   
															 		echo $qty;

																//if($size == "Full")
														 		//{
														 		//	echo $qty; 
														 		//}
														 		//elseif($size == "Half")
														 	//	{
														 		//	echo 0;
														 	//	}
														// 		else
														 		//{
														 //			echo 0;
														// 		}


															?>
															

														</td>
														<!--<td><?php echo $size; ?></td> -->
														<td><?php echo $price ?></td>
														<td>
														 <div class="price-wrap">
														 <span class="price font-weight-bold tx-16">
														 	<?php echo $total;

														 		//if($size == "Full")
														 		//{
														 			//echo $total; 
														 		//}
														 		//elseif($size == "Half")
														 		//{
														 			//echo $half_total;
														 		//}
														 		//else
														 		//{
														 			//echo $qtr_total;
														 		//}


														 	?>
														 		

														 	</span></div>
														</td>
														<td class="text-center">
														<a class="btn ripple btn-primary" data-target="#update<?php echo $id; ?>" data-toggle="modal" href="#update<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $id; ?>" data-toggle="modal" href="#delete<?php echo $id; ?>"><i class="fa fa-trash"></i></a>

														</td>
													</tr>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Sales Details </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-sales.php">
								<div class="form-group col-md-9">
									<label>Quantity</label>
									<input type="hidden" name="temp_id" class="form-control" value="<?php echo $id; ?>">
									<input type="text" name="qty" class="form-control" value="<?php echo $qty; ?>">
								</div>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Update</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Sales Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="sales-del.php" method="post">
							<input type="hidden" class="form-control" name="temp_id" value="<?php echo $id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>remove</b> this product?</p>
							
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
							<div class="col-lg-12 col-xl-3 col-md-12">
								<div class="card custom-card cart-details">
									<div class="card-body">
										<h5 class="mb-3 font-weight-bold tx-14">Sales Summary</h5>
										<hr>
										<form name="autoSumForm" method="post" action="pos-sale.php">
										<dl class="dlist-align">
											<dt class="">Total:</dt>
											<dd class="text-right ml-auto">
											<input id="total" name="total" class="form-control col-md-6 pull-right" type="text" value="<?php echo $grand; ?>" onFocus="startCalc();" onBlur="stopCalc();" name="" readonly></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Discount:</dt>
											<dd class="text-right text-danger ml-auto">
											<input id="discount" name="discount" value="0" class="form-control col-md-6 pull-right" type="text" onFocus="startCalc();" onBlur="stopCalc();"></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Amount Due:</dt>
											<dd class="text-right ml-auto">
											<input class="form-control col-md-6 pull-right" value="<?php echo number_format($grand,2); ?>" type="text" id="amount_due" name="amount_due" readonly></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Cash Tendered:</dt>
											<dd class="text-right text-success ml-auto">
											<input class="form-control col-md-6 pull-right" type="text" onFocus="startCalc();" onBlur="stopCalc();"  id="cash" name="tendered" required></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Change:</dt>
											<dd class="text-right  ml-auto">
											<input class="form-control col-md-6 pull-right" type="text" id="change" name="change" required></dd>
										</dl>

										  <dl class="dlist-align">
											<dt>Payment Mode:</dt>
											<dd class="text-right ml-auto">
										   <select name="paymt_type" class="form-control col-md-4 select2 pull-right" required>
											<option value="">Select</option>
											<option value="Cash">Cash</option>
											<option value="Momo">Momo</option>
											</select></dd>
										  </dl>

										<div class="step-footer">
										<button type="submit" name="cash" data-direction="next" class="step-btn btn btn-primary btn-block">Checkout</button>
										</div>
									</form>		
								</div>
							</div>
						</div>
						<!-- End Row -->
					</div>						
				</div>
			</div>
			<!-- End Main Content-->


<?php  include("includes/footer.php"); ?>
<?php } ?>