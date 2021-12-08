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
								<h2 class="main-content-title tx-24 mg-b-5">Product Category</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product Category</li>
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
										<form method="post" action="add-category.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													<div class="form-group col-md-9">
														<label class=""> Category Name </label>
														<input class="form-control" required="" name="cat_name" type="text">
													</div>
		
													<div class="form-group col-md-9">
												      <button type="submit" name="add_prod" class="btn ripple btn-main-primary">
														Add Category
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
														<th class="wd-20p">No</th>
														<th class="wd-15p">Category Name</th>	
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$i = 0;
													$get_cat = "SELECT * FROM categories";
													$run_cat = mysqli_query($db, $get_cat);

													while($row_cat  = mysqli_fetch_array($run_cat))
													{
														$cat_id  	= $row_cat['cat_id'];
														$cat_name	= $row_cat['cat_name'];

														$i++;

													?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $cat_name; ?></td>
														
														<td>
														<a class="btn ripple btn-primary" data-target="#update<?php echo $cat_id; ?>" data-toggle="modal" href="#update<?php echo $cat_id; ?>"><i class="fa fa-eye"></i></a>

														<a class="btn ripple btn-danger" data-target="#delete<?php echo $cat_id; ?>" data-toggle="modal" href="#delete<?php echo $cat_id; ?>">
															<i class="fa fa-trash"></i>
														</a>

														</td>

													</tr>

			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $cat_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-category.php">
								<div class="form-group col-md-9">
									<label>Category Name</label>
									<input type="hidden" name="cat_id" class="form-control" value="<?php echo $cat_id; ?>">
									<input type="text" name="cat_name" class="form-control" value="<?php echo $cat_name; ?>">
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
			<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $cat_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Category Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="category-del.php" method="post">
							<input type="hidden" class="form-control" name="cat_id" value="<?php echo $cat_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this category?</p>
							
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