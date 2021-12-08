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
									<li class="breadcrumb-item active" aria-current="page">View moved products</li>
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
														<th class="wd-15p">Quantity Moved</th>	
														<th class="wd-20p">Date Moved</th>
													</tr>
												</thead>
												<tbody>
													<?php

													$username = $_SESSION['emp_username'];
												    $get_admin = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
												    $run_admin = mysqli_query($db, $get_admin);
												    $row_admin = mysqli_fetch_array($run_admin);
												    $admin_id  = $row_admin['emp_id'];     

													$get_hse = "SELECT * FROM tbl_warehse_prod_moved WHERE emp_id = '$admin_id'";
													$run_hse = mysqli_query($db, $get_hse);

													while($row_hse = mysqli_fetch_array($run_hse))
													{
														$moved_prod_id = $row_hse['prod_moved_id'];
														$prod_id       = $row_hse['prod_id'];
														$emp_id 	   = $row_hse['emp_id'];
														$prod_qty      = $row_hse['product_qty'];
														$date_moved    = $row_hse['date_moved'];
														
														// Get Product
														$get_pro 	= "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
														$run_pro 	= mysqli_query($db, $get_pro);
														$row_pro 	= mysqli_fetch_array($run_pro);
														$prod_name 	= $row_pro['prod_name'];
																

													?>
													<tr>
														<td><?php echo $prod_name; ?></td>
														<td><?php echo $prod_qty; ?></td>
														<td><?php echo date("M d, Y",strtotime($date_moved)); ?></td>
														
														<td>
														
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $moved_prod_id; ?>" data-toggle="modal" href="#delete<?php echo $moved_prod_id; ?>"><i class="fa fa-trash"></i></a>

														</td>

													</tr>
				
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