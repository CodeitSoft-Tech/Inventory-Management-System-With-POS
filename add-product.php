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
									<li class="breadcrumb-item active" aria-current="page">Add Product</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<form method="post" action="product-add.php">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class=""> Product Name</label>
														<input class="form-control" required="" name="prod_name" type="text">
													</div>
													
													<div class="form-group col-md-9">
														<div class="row row-sm">

															<div class="col-sm-4">
																<label class="">Product Category</label>
																<select name="prod_cat" class="form-control select select2">
																	<option label="Date"></option>
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
																	<option label="Month"></option>
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
																	<option label="year"></option>
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
														<input class="form-control" required="" name="expiry_date" type="date">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Product Price</label>
														<input class="form-control" required="" name="prod_price" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Reorder Point </label>
														<input class="form-control" required="" name="reorder" type="text">
													</div>

													<div class="form-group col-md-9">
													<label class="">Product Status</label>
													 <select name="prod_status" class="form-control select select2">
														<option label="year"></option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>
												   </div>
													
													<div class="form-group col-md-9">
													<button type="submit" name="btn-prod" class="btn ripple btn-main-primary">
														Add Product
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
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->


<?php  include("includes/footer.php"); ?>
<?php } ?>