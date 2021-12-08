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
								<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Account</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
									<?php 

										$username = $_SESSION['emp_username'];
										$get_ad   = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
										$run_ad   = mysqli_query($db, $get_ad);
										$row_ad   = mysqli_fetch_array($run_ad);
										$admin_id = $row_ad['emp_id'];
										$fullname = $row_ad['fullname'];
										$admin_img = $row_ad['emp_img'];
										$username  = $row_ad['emp_username'];
										$password  = $row_ad['emp_password'];

									?>
									 <form method="post" action="update-account.php" enctype="multipart/form-data">
						                <div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													
													<div class="form-group col-md-9">
														<label class=""> Username </label>
														<input class="form-control" required="" value="<?php echo $admin_id; ?>" name="admin_id" type="hidden">
														<input class="form-control" required="" value="<?php echo $username; ?>" name="username" type="text">
													</div>
													

													<div class="form-group col-md-9">
														<label class="">Password</label>
														<input class="form-control" required="" value="<?php echo $admin_id; ?>" name="admin_id" type="hidden">
														<input class="form-control" required="" placeholder="**************" name="password" type="password">
													</div>

												

												   <div class="form-group col-md-9">
												   	 <button class="btn ripple btn-primary" name="update-profile" type="submit">Update Account Details</button>
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