<?php 

	session_start();
	include("includes/db_conn.php"); 

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Callin Ventures -  Admin Panel">
		<meta name="author" content="Calling Ventures">
		<meta name="keywords" content="Callin Ventures">

		<!-- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title> POS | Callin Ventures</title>

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

		<!-- Internal DataTables css-->
		<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />

		<!-- Select2 css -->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!--Bootstrap-datepicker css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">

		<!-- Internal Datetimepicker-slider css -->
		<link href="assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">


		<!-- Internal Daterangepicker css-->
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<!-- InternalFileupload css-->
		<link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

		<!-- Internal TelephoneInput css-->
		<link rel="stylesheet" href="assets/plugins/telephoneinput/telephoneinput.css">


		<!-- Internal Specturm-color picker css-->
		<link href="assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<!-- Internal Ion.rangeslider css-->
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">


		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	</head>

	<body class="horizontalmenu" onload="myFunction()">

		<!-- Loader 
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		 End Loader -->

		<!-- Page -->
		<div class="page">

			<!-- Main Header-->
			<div class="main-header side-header btn-print">
				<div class="container">
					<div class="main-header-left">
						<a class="main-header-menu-icon d-lg-none" href="" id="mainNavShow"><span></span></a>
						<a class="main-logo" href="index.php">
							<img src="images/callin-logo.jpg" class="header-brand-img desktop-logo" alt="logo">
							<img src="images/callin-logo.jpg" class="header-brand-img desktop-logo theme-logo" alt="logo">
						</a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="index.php"><img src="images/callin-logo.jpg" class="mobile-logo" alt="logo"></a>
							<a href="index.php"><img src="images/callin-logo.jpg" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>

					<div class="main-header-right">
						<div class="dropdown main-header-notification">
							<a class="nav-link icon" href="">
								<i class="fe fe-bell header-icons"></i>
								<span class="badge badge-danger nav-link-badge">
								<?php 
			                      $query = mysqli_query($db,"select COUNT(*) as count from product_tbl where prod_qty<=reorder")or die(mysqli_error());
			                      $row = mysqli_fetch_array($query);
			                      echo $row['count'];
			                      ?>  
								</span>
							</a>
							<div class="dropdown-menu">
								<div class="main-notification-list">
									<div class="media new">
										<div class="online"><i class="fas fa-refresh text-red"></i></div>
										<div class="media-body">
											  <?php

						                        // Selecting product with lower quantity

						                        $queryprod = mysqli_query($db,"select prod_name from product_tbl where prod_qty<=reorder")or die(mysqli_error());
						                       
						                        while($rowprod = mysqli_fetch_array($queryprod)){
						                         ?>
											<p> <?php echo $rowprod['prod_name'];?></p>
										<?php } ?>
										</div>
									</div>
									
								</div>
								<div class="dropdown-footer">
									<a href="stock-out.php">View All</a>
								</div>
							</div>
						</div>
						<div class="dropdown main-profile-menu">
							<?php 

								$username = $_SESSION['admin_username'];
								$get_ad   = "SELECT * FROM admin_tbl WHERE admin_username = '$username' AND role = 'Administrator'";
								$run_ad   = mysqli_query($db, $get_ad);
								$row_ad   = mysqli_fetch_array($run_ad);
								$fullname = $row_ad['fullname'];
								$role     = $row_ad['role'];
								$admin_img = $row_ad['admin_img'];

							?>
							<a class="d-flex" href="">
								<span class="main-img-user" ><img alt="avatar" src="user_images/<?php echo $admin_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $fullname; ?></h6>
									<p class="main-notification-text">
										<?php

										if($role == "Employee")
										{
											echo "<span class='badge badge-success'>Employee</span>";
										}
										else
										{
											echo "<span class='badge badge-primary'>Administrator</span>";	
										}


										?>


								    </p>
								</div>
								<a class="dropdown-item" href="profile.php">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="user-account.php">
									<i class="fe fe-settings"></i> Account Settings
								</a>
								<a class="dropdown-item" href="logout.php">
									<i class="fe fe-power"></i> Sign Out
								</a>
							</div>
						</div>
						<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
							aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
						</button><!-- Navresponsive closed -->
					</div>
				</div>
			</div>
			<!-- End Main Header-->

			<!-- Mobile-header -->
			<div class="mobile-main-header btn-print">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="#">
								<span class="main-img-user" ><img alt="avatar" src="user_images/<?php echo $admin_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $fullname; ?></h6>
									<p class="main-notification-text">

									<?php

										if($role == "Employee")
										{
											echo "<span class='badge badge-success'>Employee</span>";
										}
										else
										{
											echo "<span class='badge badge-primary'>Administrator</span>";	
										}

										?>

									</p>
								</div>
								<a class="dropdown-item" href="profile.php">
									<i class="fe fe-edit"></i> Edit Profile
								</a>
								<a class="dropdown-item" href="user-account.php">
									<i class="fe fe-settings"></i> Account Settings
								</a>
								<a class="dropdown-item" href="logout.php">
									<i class="fe fe-power"></i> Sign Out
								</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-header closed -->

			<!-- Horizonatal menu-->
			<?php include("includes/topbar.php"); ?>
			<!--End  Horizonatal menu-->
