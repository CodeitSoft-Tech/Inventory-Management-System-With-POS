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
								<h2 class="main-content-title tx-24 mg-b-5">Product</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Products</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table" id="example2">
												<thead>
													<tr>
														<th class="wd-20p">Product Name</th>
														<th class="wd-15p">Quantity</th>	
														<th class="wd-20p">Selling Price</th>
														<th class="wd-20p">Cost Price</th>
														<th class="wd-20p">Profit</th>
														<th class="wd-20p">Total Profit</th>
														<th class="wd-20p">Expiry Date</th>
														<th class="wd-20p">Expiry Status</th>
														<th class="wd-20p">Reorder</th>
														<th class="wd-15p">Stock Status</th>
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$get_prod = "SELECT * FROM product_tbl ORDER BY prod_name";
													$run_prod = mysqli_query($db, $get_prod);

													while($row_prod = mysqli_fetch_array($run_prod))
													{
														$prod_id 	= $row_prod['prod_id'];
														$prod_name 	= $row_prod['prod_name'];
														$cat_id  	= $row_prod['cat_id'];
														$sup_id		= $row_prod['supplier_id'];
														$brand_id	= $row_prod['brand_id'];
														$price      = $row_prod['prod_price'];
														$qty 		= $row_prod['prod_qty'];
														$reorder    = $row_prod['reorder'];
														$status     = $row_prod['prod_status'];
														$expiry_date = $row_prod['expiry_date'];


														// Get Stock
														$get_stock = "SELECT * FROM tbl_stockin WHERE prod_id = '$prod_id'";
														$run_stock = mysqli_query($db, $get_stock);
														$row_stk   = mysqli_fetch_array($run_stock);
														$cost_price = $row_stk['cost_price'] ?? null;


														// Calculations
														$profit = $price - $cost_price;
														$total_profit = $profit * $qty;


														// Get Category
														$get_cat 	= "SELECT * FROM categories WHERE cat_id = '$cat_id'";
														$run_cat 	= mysqli_query($db, $get_cat);
														$row_cat 	= mysqli_fetch_array($run_cat);
														$cat_name 	= $row_cat['cat_name'];

														
														// Get Supplier
														$get_sup 	= "SELECT * FROM tbl_suppliers WHERE sup_id = '$sup_id'";
														$run_sup 	= mysqli_query($db, $get_sup);
														$row_sup 	= mysqli_fetch_array($run_sup);
														$sup_name 	= $row_sup['sup_name'];


														// Get Brand
														$get_brand 	= "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
														$run_brand 	= mysqli_query($db, $get_brand);
														$row_brand 	= mysqli_fetch_array($run_brand);
														$brand_name = $row_brand['brand_name'];

													?>
													<tr>
														<td><?php echo $prod_name; ?></td>
														<td><?php echo $qty; ?></td>
														<td><?php echo number_format($price,2); ?></td>
														<td><?php echo number_format($cost_price,2); ?></td>
														<td><?php echo number_format($profit,2); ?></td>
														<td><?php echo number_format($total_profit ,2); ?></td>
														<td><?php echo date("M d, Y",strtotime($expiry_date)); ?></td>
														<td>
															<?php 

																$expiration  = $expiry_date; //fetch the expiration on the database in
															    $today       = date('Y/m/d');

															    //convert to strtotime;
															    $convertExp = strtotime($expiration);
															    $convertDay = strtotime($today);

															   $timeleft = $convertExp - $convertDay;

															   $daysleft = round((($timeleft/24)/60)/60); 

															   if($daysleft <= 60)
															   {
															     echo "<span class='badge badge-danger'>Closer to expiry</span>";
															   }
															   else if($daysleft == 60)
															   {
															   	  echo "<span class='badge badge-success'>Product Expired</span>";
															   }
															   else {
															   	 echo "<span class='badge badge-success'>Product Valid</span>";
															   }

															?>
														</td>
														<td><?php echo $reorder; ?></td>
														<td>
														<?php 

															if($qty == $reorder)
															{
																echo "<span class='badge badge-danger'>Low Stock</span>";
															}
															elseif($qty <= 0)
															{
																echo "<span class='badge badge-danger'>Stock Out</span>";
															}
															else
															{
																echo "<span class='badge badge-success'>In Stock</span>";	
															}

														?>	
														</td>
														<td>
														<a class="btn ripple btn-primary" data-target="#update<?php echo $prod_id; ?>" data-toggle="modal" href="#update<?php echo $prod_id; ?>"><i class="fa fa-eye"></i></a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $prod_id; ?>" data-toggle="modal" href="#delete<?php echo $prod_id; ?>"><i class="fa fa-trash"></i></a>

														</td>

													</tr>

			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $prod_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
						<h6 class="modal-title">Update Product Details</h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-product.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class=""> Product Name </label>
														<input class="form-control" value="<?php echo $prod_id; ?>" required="" name="prod_id" type="hidden">
														<input class="form-control" value="<?php echo $prod_name; ?>" required="" name="prod_name" type="text">
													</div>
													
													<div class="form-group col-md-9">
														<div class="row row-sm">

															<div class="col-sm-4">
																<label class="">Product Category</label>
																<input class="form-control" value="<?php echo $prod_id; ?>" required="" name="prod_id" type="hidden">
																<select name="prod_cat" class="form-control select select2">
																	<option value="<?php echo $cat_id; ?>">
																	<?php echo $cat_name; ?>
																	</option>

																	<?php 
																		$get_cat = "SELECT * FROM categories";
																		$run_cat = mysqli_query($db, $get_cat);
																		while($row_cat = mysqli_fetch_array($run_cat))
																		{
																			$cat_id = $row_cat['cat_id'];
																			$cat_name = $row_cat['cat_name'];

																			echo "<option value='$cat_id'>$cat_name</option>";
																		}

																	?>
																</select>
															</div>

															<div class="col-sm-4 mg-t-20 mg-sm-t-0">
																<label class="">Product Supplier</label>
																<select name="prod_sup" class="form-control select select2">
																	<option value="<?php echo $sup_id; ?>">
																	<?php echo $sup_name; ?>
																	</option>
																	<?php 
																		$get_sup = "SELECT * FROM tbl_suppliers";
																		$run_sup = mysqli_query($db, $get_sup);
																		while($row_sup = mysqli_fetch_array($run_sup))
																		{
																			$sup_id = $row_sup['sup_id'];
																			$sup_name = $row_sup['sup_name'];

																			echo "<option value='$sup_id'>$sup_name</option>";
																		}

																	?>
																</select>
															</div>

															<div class="col-sm-4 mg-t-20 mg-sm-t-0">
																<label class="">Product Brand</label>
																<select name="prod_brand" class="form-control select select2">
																	<option value="<?php echo $brand_id; ?>">
																	<?php echo $brand_name; ?>
																	</option>
																	<?php 
																		$get_brand = "SELECT * FROM tbl_brand";
																		$run_brand = mysqli_query($db, $get_brand);
																		while($row_brand = mysqli_fetch_array($run_brand))
																		{
																			$brand_id = $row_brand['brand_id'];
																			$brand_name = $row_brand['brand_name'];

																			echo "<option value='$brand_id'>$brand_name</option>";
																		}

																	?>
																</select>
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label class="">Expiry Date</label>
														<input class="form-control" required="" value="<?php echo $expiry_date; ?>" name="expiry_date" type="date">
													</div>

													<div class="form-group col-md-9">
														<label class="">Product Price</label>
														<input class="form-control" required="" value="<?php echo $price; ?>" name="prod_price" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Reorder Point </label>
														<input class="form-control" value="<?php echo $reorder; ?>" required="" name="reorder" type="text">
													</div>

													<div class="form-group col-md-9">
													<label class="">Product Status</label>
													 <select name="prod_status" class="form-control select select2">
														<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>
												   </div>
													
												</div>
											</div>
										</div>
										
									<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit">Update Product</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $prod_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Product Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="product-del.php" method="post">
								 <input type="hidden" class="form-control" name="prod_id" value="<?php echo $prod_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Product?</p>
							
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


<?php  include("includes/footer.php"); ?>
<?php } ?>