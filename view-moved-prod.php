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
														<th class="wd-20p">Moved By</th>	
														<th class="wd-15p">Quantity Moved</th>	
														<th class="wd-20p">Date Moved</th>
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$get_hse = "SELECT * FROM tbl_warehse_prod_moved";
													$run_hse = mysqli_query($db, $get_hse);

													while($row_hse = mysqli_fetch_array($run_hse))
													{
														$moved_prod_id = $row_hse['prod_moved_id'];
														$admin_id 	   = $row_hse['admin_id'];
														$prod_id       = $row_hse['prod_id'];
														$emp_id 	   = $row_hse['emp_id'];
														$prod_qty      = $row_hse['product_qty'];
														$date_moved    = $row_hse['date_moved'];
														

														// Get Product
														$get_pro 	= "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
														$run_pro 	= mysqli_query($db, $get_pro);
														$row_pro 	= mysqli_fetch_array($run_pro);
														$prod_name 	= $row_pro['prod_name'];
														
														// Get Employee
														$get_emp 	= "SELECT * FROM tbl_employees WHERE emp_id = '$emp_id'";
														$run_emp 	= mysqli_query($db, $get_emp);
														$row_emp 	= mysqli_fetch_array($run_emp);
														$emp_name 	= $row_emp['fullname']?? null;
														
														// Get  Admin
														$get_ad 	= "SELECT * FROM admin_tbl WHERE admin_id = '$admin_id'";
														$run_ad   	= mysqli_query($db, $get_ad);
														$row_ad  	= mysqli_fetch_array($run_ad);
														$ad_name 	= $row_ad['fullname']?? null;
														

													?>
													<tr>
														<td><?php echo $prod_name; ?></td>
														<td><?php echo $ad_name; ?><?php echo $emp_name; ?></td>
														<td><?php echo $prod_qty; ?></td>
														<td><?php echo date("M d, Y",strtotime($date_moved)); ?></td>
														
														<td>
														
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $moved_prod_id; ?>" data-toggle="modal" href="#delete<?php echo $moved_prod_id; ?>"><i class="fa fa-trash"></i></a>

														</td>

													</tr>


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $moved_prod_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Product Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="warehse-moved-prod-del.php" method="post">
								 <input type="hidden" class="form-control" name="moved_prod_id" value="<?php echo $moved_prod_id; ?>" required> 
                      
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