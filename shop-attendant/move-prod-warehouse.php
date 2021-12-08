	<?php 


		include("includes/header.php");

		if(!isset($_SESSION['emp_username']))
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
									<li class="breadcrumb-item active" aria-current="page">Move Product to Store </li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">

									<div class="card-body">
										<a href="warehouse.php" class="btn btn-primary mb-4">Back to warehouse</a><hr>
										<form method="post" action="move-product.php">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class="">Product Name</label>
														 <select name="prod_name" class="form-control select select2">
														  <option label="Date"></option>
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
														<label class=""> Quantity Moved </label>
														<input class="form-control" required="" name="prod_qty" type="text">
													  </div>

													
													
													<div class="form-group col-md-9">
													<button type="submit" name="add-prod" class="btn ripple btn-main-primary">
														Move Product
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