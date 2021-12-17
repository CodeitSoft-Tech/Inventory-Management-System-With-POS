<?php 

	session_start();
	include("includes/db_conn.php"); 

	if(!isset($_SESSION['emp_username']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {

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

		<!-- Internal Sweet-Alert css-->
		<link href="assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

		<!-- Internal Specturm-color picker css-->
		<link href="assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<!-- Internal Ion.rangeslider css-->
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">


		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	</head>

	<body class="horizontalmenu" onload="CredFunction()">

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
								<i class="fe fe-shield-off header-icons"></i>
								<span class="badge badge-danger nav-link-badge">
								<?php 

								 $select_latest = "SELECT * FROM product_tbl ORDER BY prod_name DESC";
							     $run_latest 	= mysqli_query($db, $select_latest);
							     $row_latest 	= mysqli_fetch_array($run_latest);
							     
							     $prod_name     = $row_latest['prod_name'];
							     $expiry_date   = $row_latest['expiry_date'];
							     $exp_date      = date("M d, Y",strtotime($expiry_date));

				                   $expiration  = $expiry_date; //fetch the expiration on the database in
							       $today       = date('Y/m/d');

							       //convert to strtotime;
							       $convertExp = strtotime($expiration);
							       $convertDay = strtotime($today);

						           $timeleft = $convertExp - $convertDay;
						           $daysleft = round((($timeleft/24)/60)/60); 
						          $daysleft <= 60;
						              	
							      
							       
						             	$select_lat = "SELECT COUNT(*) as count FROM product_tbl WHERE expiry_date ='$daysleft' ";
						             	$run_c         = mysqli_query($db, $select_lat);
						             	$row 	       = mysqli_fetch_array($run_c);
			                      		echo $row['count'];
							      	 	                      
			                      ?>  
								</span>
							</a>
							<div class="dropdown-menu">
								<div class="main-notification-list">
									<div class="media new">
										<div class="online"></div>
										<div class="media-body">
											<h6>Product Closer to expiration and expired products</h6>
											<hr>
											  <?php

						                        // Selecting product with lower quantity

											  	$select_latest = "SELECT * FROM product_tbl ORDER BY prod_name DESC";
											     $run_latest = mysqli_query($db, $select_latest);
											                        
											     while($row_latest = mysqli_fetch_array($run_latest))
											     {
											       $prod_name       = $row_latest['prod_name'];
											       $expiry_date     = $row_latest['expiry_date'];
											       $exp_date = date("M d, Y",strtotime($expiry_date));

								                   $expiration  = $expiry_date; //fetch the expiration on the database in
											       $today       = date('Y/m/d');

											       //convert to strtotime;
											       $convertExp = strtotime($expiration);
											       $convertDay = strtotime($today);

										           $timeleft = $convertExp - $convertDay;
										           $daysleft = round((($timeleft/24)/60)/60);  
											     
											       if($daysleft <= 60)
										             {
												        echo "<p><i style='color:red' class='fe fe-shield-off text-red'></i> $prod_name</p>";
										             }
											 	}    

						                      ?>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
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


			<!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Creditors Sales Point</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Creditor POS</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->
											
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-xl-9 col-md-12">
								<div class="card custom-card">
									<div class="card-header">
										<h5 class="mb-3 font-weight-bold tx-14">Sales Transaction</h5>
									</div>
									<div class="card-body">

										<div class="mb-4">
											<form method="post" action="add-sale-cred.php">
											<div class="row">	
											<div class="form-group col-md-6">
											<label class="">Product Name</label>	
											<select name="prod_name" class="form-control select-lg select2" required>
												<option value="">Large Select</option>
												<?php 

													$get_pro ="SELECT * FROM product_tbl order by prod_name";
													$run_pro = mysqli_query($db, $get_pro);

													while($row_pro = mysqli_fetch_array($run_pro)) 
													{
														$prod_id 	= $row_pro['prod_id'];
														$prod_name	= $row_pro['prod_name'];


														echo "<option value='$prod_id'>$prod_name</option>";
													}

												?>
											</select>
										   </div>

										   <div class="form-group col-md-6">
											<label class="">Quantity</label>
											<input type="text" name="qty" class="form-control" required>
										   </div>
										</div> 

										<div class="form-group">
										<button type="submit" name="" class="btn ripple btn-primary">
											Add to Cart
										</button>	
										</div>

										</form>
										</div>



										<hr>



										<div class="table-responsive mt-4">
											<table class="table border table-hover text-nowrap table-shopping-cart mb-0">
												<thead class="text-muted">
													<tr class="small text-uppercase">
														<th scope="col">Product</th>
														<th scope="col" class="wd-120">Quantity</th>
														<th scope="col" class="wd-120">Price</th>
														<th scope="col" class="wd-120">Total</th>
														<th scope="col" class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 

															$get_temp = "SELECT * FROM temp_trans_cred";
														    $run_temp =  mysqli_query($db, $get_temp);
															
															$grand = 0;
													
															while($row_temp = mysqli_fetch_array($run_temp))
															{
																$id      = $row_temp['temp_trans_cred_id'];
																$prod_id = $row_temp['prod_id'];
																$price   = $row_temp['price'];
																$qty     = $row_temp['qty'];

														
																$product = "SELECT * FROM product_tbl WHERE prod_id = '$prod_id'";
																$run       = mysqli_query($db, $product);
																$row  	   = mysqli_fetch_array($run);
																$prod_name = $row['prod_name'];


																  // Full Cal
																  $total = $qty * $price;
					       										  $grand = $grand + $total;

					       									  

													?>

													<tr>
														<td>
														 <div class="media">
														 <h6 class="font-weight-semibold mt-0 text-uppercase">
														 	<?php echo $prod_name; ?></h6>
														 </div>
														</td>
														<td><?php echo $qty; ?> </td>
														<td><?php echo $price ?> </td>
														<td>
														 <div class="price-wrap">
														 <span class="price font-weight-bold tx-16">
														 <?php echo $total; ?>
														 </span>
														</div>
														</td>
														<td class="text-center">
														<a class="btn ripple btn-primary" data-target="#update<?php echo $id; ?>" data-toggle="modal" href="#update<?php echo $id; ?>">
														<i class="fa fa-edit"></i>
														</a>
														<a class="btn ripple btn-danger" data-target="#delete<?php echo $id; ?>" data-toggle="modal" href="#delete<?php echo $id; ?>">
														 <i class="fa fa-trash"></i>
														</a>
														</td>
													</tr>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Update Sales Details </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="update-sales-cred.php">
								<div class="form-group col-md-9">
									<label>Quantity</label>
									<input type="hidden" name="temp_id" class="form-control" value="<?php echo $id; ?>">
									<input type="text" name="qty" class="form-control" value="<?php echo $qty; ?>">
								</div>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Update</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Sales Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="sales-del-cred.php" method="post">
							<input type="hidden" class="form-control" name="temp_id" value="<?php echo $id; ?>" required> 
                      
                            <p>Are you sure you want to <b>remove</b> this product?</p>
							
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
							<div class="col-lg-12 col-xl-3 col-md-12">
								<div class="card custom-card cart-details">
									<div class="card-body">
										<h5 class="mb-3 font-weight-bold tx-14">Sales Summary</h5>
										<hr>
										<form name="autoSumCred" target="_blank" method="post" action="pos-sale-cred.php">
										<dl class="dlist-align">
											<dt class="">Total:</dt>
											<dd class="text-right ml-auto">
											<input id="total" name="total" class="form-control col-md-6 pull-right" type="text" value="<?php  echo $grand; ?>" onFocus="startCalc();" onBlur="stopCalc();" name="" readonly></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Discount:</dt>
											<dd class="text-right text-danger ml-auto">
											<input id="discount" name="discount" value="0" class="form-control col-md-6 pull-right" type="text" onFocus="startCalc();" onBlur="stopCalc();"></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Amount Due:</dt>
											<dd class="text-right ml-auto">
											<input class="form-control col-md-6 pull-right" value="<?php echo number_format($grand,2); ?>" type="text" id="amount_due" name="amount_due" readonly></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Amount Paid:</dt>
											<dd class="text-right text-success ml-auto">
											<input class="form-control col-md-6 pull-right" type="text" onFocus="startCalc();" onBlur="stopCalc();" id="cash" name="tendered" required></dd>
										</dl>
										<dl class="dlist-align">
											<dt>Amount Left:</dt>
											<dd class="text-right  ml-auto">
											<input class="form-control col-md-6 pull-right" type="text" id="cash_change" name="change" required></dd>
										</dl>

										 <dl class="dlist-align">
											<dt>Payment Mode:</dt>
											<dd class="text-right ml-auto">
										    <select name="paymt_type" class="form-control col-md-4 select2 pull-right" required>
											<option value="">Select</option>
											<option value="Cash">Cash</option>
											<option value="Momo">Momo</option>
											</select></dd>
										  </dl>


										<div class="step-footer">
										<button type="submit" name="cash" data-direction="next" class="step-btn btn btn-primary btn-block">Checkout</button>
										</div>
									</form>
								
								</div>
							</div>
						</div>
						<!-- End Row -->




				   </div>
								
							
						
				</div>
			</div>
			<!-- End Main Content-->



			<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2021 <a href="#">Codeitsoft Technology</a>. All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
			<!--End Footer-->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>





		  <script>
	      $("#cash").click(function(){
	          $("#tendered").show('slow');
	          $("#cash_change").show('slow');
	      });

	    $(function() {

	      $(".btn_delete").click(function(){
	      var element = $(this);
	      var id = element.attr("id");
	      var dataString = 'id=' + id;
	      if(confirm("Sure you want to delete this item?"))
	      {
		$.ajax({
		type: "GET",
		url: "temp_trans_del.php",
		data: dataString,
		success: function(){
			
		      }
		  });
		  
		  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		  .animate({ opacity: "hide" }, "slow");
	      }
	      return false;
	      });

	      });
	    </script>


		<script type="text/javascript" src="autosum-cred.js"></script>
		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Internal Sweet-Alert js-->
		<script src="assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>
		<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
		

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Internal Data Table js -->
		<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/jszip.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
		<script src="assets/js/table-data.js"></script>


		<!-- Jquery-Ui js-->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!-- Internal Daternagepicker js-->
		<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Internal Fileuploads js-->
		<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

		<!-- InternalFancy uploader js-->
		<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
        <script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>

		<!-- Internal Form-elements js-->
		<script src="assets/js/advanced-form-elements.js"></script>
		<script src="assets/js/select2.js"></script>

		<!-- Internal TelephoneInput js-->
		<script src="assets/plugins/telephoneinput/telephoneinput.js"></script>
		<script src="assets/plugins/telephoneinput/inttelephoneinput.js"></script>


		<!-- Sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Internal Jquery-Ui js-->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		
		<!-- Internal Jquery.maskedinput js-->
		<script src="assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

		<!-- Internal Specturm-colorpicker js-->
		<script src="assets/plugins/spectrum-colorpicker/spectrum.js"></script>

		<!-- Internal Ion-rangeslider js-->
		<script src="assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script src="assets/js/select2.js"></script>

		<!-- Internal Form-elements js-->
		<script src="assets/js/form-elements.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!--Bootstrap-datepicker js-->
		<script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

		<!-- Internal jquery-simple-datetimepicker js -->
		<script src="assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>


		<!-- Sticky js -->
		<script src="assets/js/sticky.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>

	</body>
</html>
<?php } ?>