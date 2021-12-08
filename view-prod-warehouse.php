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
								<h2 class="main-content-title tx-24 mg-b-5">Warehouse</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Warehouse Products</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<a href="warehouse.php" class="btn btn-primary">Back to warehouse</a><hr class="mb-4">
										<div class="table-responsive">
											<table class="table" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">Product Name</th>
														<th class="wd-15p">Quantity</th>
														<th class="wd-15p">Expiry Date</th>	
														<th class="wd-20p">Date Stocked</th>
														<th class="wd-15p">Stock Status</th>
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$get_hse = "SELECT * FROM tbl_warehouse";
													$run_hse = mysqli_query($db, $get_hse);

													while($row_hse = mysqli_fetch_array($run_hse))
													{
														$warehse_id   = $row_hse['warehse_id'];
														$prod_id 	  = $row_hse['prod_id'];
														$qty 		  = $row_hse['prod_qty'];
														$expiry_date  = $row_hse['expiry_date'];
														$warehse_date = $row_hse['warehse_date'];
														

														// Get Product
														$get_pro 	= "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
														$run_pro 	= mysqli_query($db, $get_pro);
														$row_pro 	= mysqli_fetch_array($run_pro);
														$prod_name 	= $row_pro['prod_name'];



													?>
													<tr>
														<td><?php echo $prod_name; ?></td>
														<td><?php echo $qty; ?></td>
														<td><?php echo date("M d, Y",strtotime($expiry_date)); ?></td>
														<td><?php echo date("M d, Y h:i a",strtotime($warehse_date)); ?></td>
														<td>
														<?php 

															if($qty <= 20)
															{
																echo "<span class='badge badge-danger'>Low Stock</span>";
															}
															elseif($qty < 0)
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
														<a class="btn ripple btn-primary" data-target="#update<?php echo $warehse_id; ?>" data-toggle="modal" href="#update<?php echo $warehse_id; ?>"><i class="fa fa-eye"></i></a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $warehse_id; ?>" data-toggle="modal" href="#delete<?php echo $warehse_id; ?>"><i class="fa fa-trash"></i></a>

														</td>

													</tr>

			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $warehse_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
						<h6 class="modal-title">Update Warehouse Product Details</h6>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-warehse-product.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
													<label class="">Product Name</label>
													 <input class="form-control" value="<?php echo $warehse_id; ?>" required="" name="warehse_id" type="hidden">
														 <select name="prod_name" class="form-control select select2">
														  <option value="<?php echo $prod_id; ?>"><?php echo $prod_name; ?></option>
														  <?php 
															 $get_prod = "SELECT * FROM product_tbl";
															 $run_prod = mysqli_query($db, $get_prod);
															 while($row_prod = mysqli_fetch_array($run_prod))
															 {
																 $prod_id = $row_prod['prod_id'];
																 $prod_name = $row_prod['prod_name'];

																 echo "<option value='$prod_id'>$prod_name</option>";
															 }

														 ?>
													     </select>
													     </div>
													
													<div class="form-group col-md-9">
													 <label class=""> Expiry Date </label>
													 <input class="form-control" value="<?php echo $warehse_id; ?>" required="" name="warehse_id" type="hidden">
													 <input class="form-control" value="<?php echo $expiry_date; ?>" required="" name="expiry_date" type="date">
													</div>
													
													
													<div class="form-group col-md-9">
													 <label class=""> Product Quantity </label>
													 <input class="form-control" value="<?php echo $warehse_id; ?>" required="" name="warehse_id" type="hidden">
													 <input class="form-control" value="<?php echo $qty; ?>" required="" name="prod_qty" type="text">
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
			<div class="modal" id="delete<?php echo $warehse_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Product Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="warehouse-del.php" method="post">
								 <input type="hidden" class="form-control" name="warehse_id" value="<?php echo $warehse_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this product from the warehouse?</p>
							
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