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
								<h2 class="main-content-title tx-24 mg-b-5">Stocks</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Stock In</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="row">

										<!-- Add Category Form -->
										<div class="col-md-6" style="border: 1px solid #eee; padding: 10px;">
										<div class="col">
										<form method="post" action="stock-in.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
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

													<div class="form-group col-md-9">
														<label class=""> Product Quantity </label>
														<input class="form-control" required="" name="qty" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Cost Price Per Product </label>
														<input class="form-control" required="" name="cost_price" type="text">
													</div>
		
													<div class="form-group col-md-9">
												      <button type="submit" name="" class="btn ripple btn-main-primary">
														Stock In
													</button>
												  </div>
												</div>
											</div>
										</div>
										</form>
						                 </div>
										</div>


										<!--  -->
										<div class="col-md-6">
											<div class="table-responsive">
											<table class="table" id="example2">
												<thead>
													<tr>
														<th class="wd-20p">Product Name</th>
														<th class="wd-15p">Quantity</th>
														<th class="wd-15p">Cost Price</th>
														<th class="wd-15p">Total Cost</th>
														<th class="wd-15p">Date Stocked</th>	
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													    $sel_stock = "SELECT * FROM tbl_stockin";
								                        $run_stock = mysqli_query($db, $sel_stock);
								                    		
								                        while($row = mysqli_fetch_array($run_stock))
								                        {

								                        	$stockin_id = $row['stockin_id'];
								                            $prod_id    = $row['prod_id'];
								                            $qty        = $row['qty'];
								                            $cp         = $row['cost_price'];
								                            $date       = $row['stockin_date'];

								                            $total = $qty * $cp;
								                            
								                            // Get Product
								                            $sel_prod = "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
								                            $run_prod = mysqli_query($db, $sel_prod);
								                            $row_prod = mysqli_fetch_array($run_prod);
								                            $product_name = $row_prod['prod_name'];
											

													?>
													<tr>
														<td><?php echo $product_name; ?></td>
														<td><?php echo $qty; ?></td>
														<td>₵<?php echo number_format($cp, 2); ?></td>
														<td>₵<?php echo number_format($total, 2); ?></td>
														<td><?php echo date("M d, Y h:i a",strtotime($date)); ?></td>

														<td>
														<!--<a class="btn ripple btn-primary" data-target="#update<?php // echo $cat_id; ?>" data-toggle="modal" href="#update<?php // echo $cat_id; ?>"><i class="fa fa-eye"></i></a>-->

														<a class="btn ripple btn-danger" data-target="#delete<?php echo $stockin_id; ?>" data-toggle="modal" href="#delete<?php echo $stockin_id; ?>">
															<i class="fa fa-trash"></i>
														</a>

														</td>

													</tr>

			<!-- 
			<div class="modal" id="update<?php //echo $cat_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-category.php">
								<div class="form-group col-md-9">
									<label>Category Name</label>
									<input type="hidden" name="cat_id" class="form-control" value="<?php //echo $cat_id; ?>">
									<input type="text" name="cat_name" class="form-control" value="<?php //echo $cat_name; ?>">
								</div>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Update Category</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $stockin_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Stock Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="stockin-del.php" method="post">
							<input type="hidden" class="form-control" name="stockin_id" value="<?php echo $stockin_id; ?>" required>
							<input type="hidden" class="form-control" name="qty" value="<?php echo $qty; ?>" required> 
							<input type="hidden" class="form-control" name="prod_id" value="<?php echo $prod_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this stock details?</p>
							
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
							</div>
						</div>
						<!-- End Row -->
					</div>
				</div>
			</div>
			<!-- End Main Content-->


<?php  include("includes/footer.php"); ?>
<?php } ?>