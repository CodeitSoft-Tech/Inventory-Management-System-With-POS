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
								<h2 class="main-content-title tx-24 mg-b-5">Manage Administrators</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Manage Administrators</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<a href="#add" data-target="#add" data-toggle="modal" class="btn btn-primary">Add New Administrator</a><hr class="mb-4">
										<table class="table" id="example1">
												<thead>
													<tr>
														<th class="wd-15p">Full Name</th>
														<th class="wd-15p">Role</th>
														<th class="wd-15p">Username</th>
														<th class="wd-15p">Password</th>
														<th class="wd-15p">Status</th>	
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

														$select_ad = "SELECT * FROM admin_tbl";
														$run_ad    = mysqli_query($db, $select_ad);

														while($row = mysqli_fetch_array($run_ad))
														{

															$admin_id = $row['admin_id'];
															$fullname = $row['fullname'];
															$role     = $row['role'];
															$username = $row['admin_username'];
															$password = $row['admin_password'];
															$status   = $row['status'];
														

													?> 
													<tr>
														<td><?php echo $fullname;    ?></td>
														<td><?php echo $role;    ?></td>	
														<td><?php echo $username;    ?></td>
														<td><?php echo "**********"; ?></td>
														<td>
															<?php 

																if($status == "Active")
																{
																	echo "<span class='badge badge-success'>Active</span>";
																}
																else
																{
																	echo "<span class='badge badge-danger'>Inactive</span>";	
																}

															?>
														</td>
														<td>
														<a class="btn ripple btn-primary" data-target="#update<?php echo $admin_id; ?>" data-toggle="modal" href="#update<?php echo $admin_id; ?>"><i class="fa fa-eye"></i></a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $admin_id; ?>" data-toggle="modal" href="#delete<?php echo $admin_id; ?>"><i class="fa fa-trash"></i></a>
														</td>
													</tr>


													<!-- Large Modal -->
			<div class="modal" id="update<?php echo $admin_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
						<h6 class="modal-title">Update Admin Details</h6>
						<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-user.php" enctype="multipart/form-data">
										<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													
													<div class="form-group col-md-9">
														<label class=""> Full Name </label>
														<input class="form-control" value="<?php echo $admin_id; ?>" required="" name="admin_id" type="hidden">
														<input class="form-control" value="<?php echo $fullname; ?>" required="" name="fullname" type="text">
													</div>
													

													<div class="form-group col-md-9">
														<label class="">Role</label>
														<select name="role" class="form-control select select2">
															<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
															<option value="Administrator">Administrator</option>
															<option value="Employee">Employee</option>
														</select>
													</div>

													<div class="form-group col-md-9">
													<label class="">Status</label>
													 <select name="status" class="form-control select select2">
														<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>
												   </div>
													
												</div>
											</div>
										</div>
										
									<div class="modal-footer">
									<button class="btn ripple btn-primary" type="submit">Update Details</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
					<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $admin_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Admin Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="user-del.php" method="post">
								 <input type="hidden" class="form-control" name="admin_id" value="<?php echo $admin_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Admin?</p>
							
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


			 <!-- Delete Modal -->
			<div class="modal" id="add">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Add New Administrator</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						<form method="post" action="add-user.php" enctype="multipart/form-data">
						 <div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													
													<div class="form-group col-md-9">
														<label class=""> Full Name </label>
														<input class="form-control" required="" name="fullname" type="text">
													</div>
													
													<div class="form-group col-md-9">
														<label class="">Role</label>
														<select name="role" class="form-control select select2">
															<option label="date"></option>
															<option value="Administrator">Administrator</option>
															<option value="Employee">Employee</option>
														</select>
													</div>

													<div class="form-group col-md-9">
														<label class="">Username</label>
														<input class="form-control" required="" name="username" type="text">
													</div>

													<div class="form-group col-md-9">
														<label class=""> Password </label>
														<input class="form-control" required="" name="password" type="text">
													</div>

													<div class="form-group col-md-9">
													<label class="">Status</label>
													 <select name="status" class="form-control select select2">
														<option label="date"></option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
													</select>
												   </div>
													
												</div>
											</div>
						 </div>
										
						 <div class="modal-footer">
						 <button class="btn ripple btn-primary" type="submit">Add Details</button>
						 <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
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
						<!-- End Row -->



					</div>
				</div>
			</div>
			<!-- End Main Content-->

			


<?php  include("includes/footer.php"); ?>
<?php } ?>