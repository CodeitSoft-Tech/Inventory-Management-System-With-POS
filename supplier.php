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
								<h2 class="main-content-title tx-24 mg-b-5">Product Suppliers</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product Suppliers</li>
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
										<form method="post" action="add-supplier.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class=""> Supplier Name </label>
														<input class="form-control" required="" name="sup_name" type="text">
													</div>
													<div class="form-group col-md-9">
														<label class=""> Location </label>
														<input class="form-control" required="" name="sup_loc" type="text">
													</div>
													<div class="form-group col-md-9">
														<label class=""> Phone Number </label>
														<input class="form-control" required="" name="sup_phone" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Email </label>
														<input class="form-control" required="" name="sup_email" type="text">
													</div>
		
													<div class="form-group col-md-9">
												      <button type="submit" name="add_sup" class="btn ripple btn-main-primary">
														Add Supplier
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
														<th class="wd-20p">Name</th>
														<th class="wd-15p">Location</th>
														<th class="wd-15p">Phone Number</th>	
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$i = 0;
													$get_sup = "SELECT * FROM tbl_suppliers";
													$run_sup = mysqli_query($db, $get_sup);

													while($row_sup  = mysqli_fetch_array($run_sup))
													{
														$sup_id  	= $row_sup['sup_id'];
														$sup_name	= $row_sup['sup_name'];
														$sup_loc	= $row_sup['sup_loc'];
														$sup_phone	= $row_sup['sup_phone'];
														$sup_email 	= $row_sup['sup_email'];

														$i++;

													?>
													<tr>
														<td><?php echo $sup_name; ?></td>
														<td><?php echo $sup_loc; ?></td>
														<td><?php echo $sup_phone; ?></td>
														
														<td>
														<a class="btn ripple btn-primary" data-target="#update<?php echo $sup_id; ?>" data-toggle="modal" href="#update<?php echo $sup_id; ?>"><i class="fa fa-eye"></i></a>

														<a class="btn ripple btn-danger" data-target="#delete<?php echo $sup_id; ?>" data-toggle="modal" href="#delete<?php echo $sup_id; ?>">
															<i class="fa fa-trash"></i>
														</a>

														</td>

													</tr>

			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $sup_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Supplier Details </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-supplier.php">
								<div class="form-group col-md-9">
									<label class=""> Supplier Name </label>
									<input type="hidden" name="sup_id" class="form-control" value="<?php echo $sup_id; ?>">
									<input class="form-control" required="" value="<?php echo $sup_name; ?>" name="sup_name" type="text">
								</div>
								<div class="form-group col-md-9">
									<label class=""> Location </label>
									<input type="hidden" name="sup_id" class="form-control" value="<?php echo $sup_id; ?>">
									<input class="form-control" required="" value="<?php echo $sup_loc; ?>" name="sup_loc" type="text">
								</div>
								<div class="form-group col-md-9">
									<label class=""> Phone Number </label>
									<input type="hidden" name="sup_id" class="form-control" value="<?php echo $sup_id; ?>">
									<input class="form-control" required="" value="<?php echo $sup_phone; ?>" name="sup_phone" type="text">
								</div>
								<div class="form-group col-md-9">
									<label class=""> Email </label>
									<input type="hidden" name="sup_id" class="form-control" value="<?php echo $sup_id; ?>">
									<input class="form-control" required="" value="<?php echo $sup_email; ?>" name="sup_email" type="text">
								</div>

							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Update Supplier</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $sup_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Supplier Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="supplier-del.php" method="post">
							<input type="hidden" class="form-control" name="sup_id" value="<?php echo $sup_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this supplier?</p>
							
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
