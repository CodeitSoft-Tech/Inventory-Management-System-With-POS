<?php 

	include("includes/db_conn.php");
	include("update-password.php");

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Callin Ventures -  Admin Panel">
		<meta name="author" content="Callin Ventures">
		<meta name="keywords" content="Callin Ventures">

		<!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title>Callin Ventures - Reset Password </title>

		<!-- Bootstrap css-->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">

	</head>
	<style type="text/css">
		#bg-img
		{
			 background-image: linear-gradient(rgba(0, 0, 0, 0.23), rgba(0, 0, 0, 0.85)),url('images/banner3.png');
             /* Full height */
             height: 100vh; 
             /* Center and scale the image nicely */
             background-position: center;
             background-repeat: no-repeat;
             background-size: cover;   
		}
	</style>

	<body class="main-body leftmenu" id="bg-img">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
								<div class="mt-4 pt-5 p-2 pos-absolute">
									<h4 class="mb-4 text-white">Callin Ventures</h4>
									<!--<img src="assets/img/brand/logo-light.png" class="header-brand-img mb-4" alt="logo">-->
									<div class="clearfix"></div>
									<img src="images/banner3.png" class="ht-100 mb-0" alt="user">
									<h5 class="mt-4 text-white">Reset Your Password</h5>
									<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Reset your password by entering a new password of your choice</span>
								</div>
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="assets/img/brand/logo.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
											<div class="clearfix"></div>
											<h5 class="text-left mb-2">Reset Your Password</h5>
											<p class="mb-4 text-muted tx-13 ml-0 text-left">Fill the form below to reset your password.</p>
											<form method="post" action="reset.php">
												<div class="text-left">
													<?php 
										                  if($ErrorReset)
										                  {
										                    foreach ($ErrorReset as $key => $value) {
										                      echo '<div class="alert alert-danger  role="alert">
										                      <i class="fas fa-exclamation text-white"></i>
										                      '.$value.'
										                      </div>';
										                    }
										                  }

										              ?>
										          </div>
												<div class="form-group text-left">
												  <label>Full Name</label>
												  <input class="form-control" name="fullname" placeholder="Enter your full name" type="text">
												</div>
												<div class="form-group text-left">
													<label>New Password</label>
													<input class="form-control" name="new_pass" placeholder="New password" type="password">
												</div>
												<div class="form-group text-left">
													<label>Confirm Password</label>
													<input class="form-control" name="con_pass" placeholder="Confirm password" type="password">
												</div>
												<button type="submit" name="reset" class="btn ripple btn-main-primary btn-block">Reset Password</button>
											</form>
											<div class="text-left mt-4 ml-0">
												<div class="mb-1"><a href="login.php">Back to login</a></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->



		</div>
		<!-- End Page -->

		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>

	</body>
</html>