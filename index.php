<?php 

	session_start();
	include("includes/db_conn.php");
	include("record-script.php"); 


	
	if(!isset($_SESSION['admin_username']))
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
		<link rel="icon" href="images/callin.jpg" type="image/x-icon"/>

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

		<!-- Internal Specturm-color picker css-->
		<link href="assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<!-- Internal Ion.rangeslider css-->
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">


		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

		<script type="text/javascript" src="chart-js/js/jquery.min.js"></script>
        <script type="text/javascript" src="chart-js/js/Chart.min.js"></script>

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
			<div class="main-header side-header">
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
						<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
						</button><!-- Navresponsive closed -->
					</div>
				</div>
			</div>
			<!-- End Main Header-->

			<!-- Mobile-header -->
			<div class="mobile-main-header">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="#">
								<span class="main-img-user"><img alt="avatar" src="user_images/<?php echo $admin_img; ?>"></span>
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
								<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

			
					    <!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										
									    <div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Sales </h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowSalesAmt();  ?></h2>
												<p class="mb-0 text-muted">For Last 30 Days</p>
												
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Discounts</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowDiscountAmt(); ?></h2>
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Expenses</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowExpenses(); ?></h2>
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Amount On Credit</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵<?php echo ShowCreditAmt();  //ShowProduct()  ?></span></h2>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->


											    <!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										
									    <div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Profit </h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php //echo ShowSalesAmt();  ?></h2>
												
												
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Products</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter"></span><?php echo ShowProduct(); ?></h2>
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Stock At Store</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter"></span><?php echo ShowStoreStock(); ?></h2>
											</div>
										</div>

										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h6 class="mb-0">Total Stock At Warehouse</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter"><?php echo ShowWhseStock(); ?></span></h2>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						 <!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										
						<div class="col-md-6 grid-margin">
						<div class="card custom-card">
						<div class="card-body">
						<h5>Latest Products</h5> <hr>
						<div class="table-responsive border">
						<table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
							<thead>
								<tr>
									<th>No.</th>
									<th>Product Name</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php  

							     $i = 0;
							     $product_stop = 10;
							     $select_latest = "SELECT * FROM product_tbl ORDER BY prod_id DESC";
							     $run_latest    = mysqli_query($db, $select_latest);
							                        
							     while($row_latest = mysqli_fetch_array($run_latest))
							     {
							       $prod_name    = $row_latest['prod_name'];
							       $prod_qty     = $row_latest['prod_qty'];
							      
							       $i++;

							       if( $i < $product_stop)
							       {
							                          
							                          
							                        
							    ?>

							     <tr>
							     <td><?php echo $i; ?></td>                         
							      <td><?php echo $prod_name; ?></td>
							      <td><?php echo $prod_qty; ?></td>
							     </tr>

							       <?php }                          
							                          
							      else
							      {
							        break;
							      }
							                      

							  } ?>
							
							</tbody>
						</table>
					   </div>
				       </div>
				      </div>
				     </div>


				     	<div class="col-md-6 grid-margin">
				     	<div class="card custom-card">
						<div class="card-body">					
						<h5>Top Selling Products</h5> <hr>
						<div class="table-responsive border">
						<table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
							<thead>
							 <tr>
							  <th>No.</th>
							  <th>Product Name</th>
							  <th>Quantity Sold</th>
							</tr>
							</thead>
							<tbody>
							<?php  

							     $i = 0;
							     $product_stop = 10;
							     $select_latest = "SELECT p.prod_name, SUM(s.qty) as totalQty FROM product_tbl as p INNER JOIN  tbl_sales_details as s ON p.prod_id = s.prod_id GROUP BY p.prod_id ORDER BY SUM(s.qty) desc limit 10";
							     $run_latest = mysqli_query($db, $select_latest);
							                        
							     while($row_latest = mysqli_fetch_array($run_latest))
							     {
							       $prod_name    = $row_latest['prod_name'];
							       $prod_qty     = $row_latest['totalQty'];
							      
							       $i++;

							       if( $i < $product_stop)
							       {
							                          
							                          
							                        
							    ?>

							     <tr>
							     <td><?php echo $i; ?></td>                         
							      <td><?php echo $prod_name; ?></td>
							      <td><?php echo $prod_qty; ?></td>
							     </tr>

							       <?php }                          
							                          
							      else
							      {
							        break;
							      }
							                      

							  } ?>
						  </tbody>
						 </table>
					    </div>
					   </div>
				      </div>
				     </div>


				        <div class="col-md-6 grid-margin">
				     	<div class="card custom-card">
						<div class="card-body">						
						<h5>Out of Stock Products</h5> <hr>
						<div class="table-responsive border">
						<table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
							<thead>
								<tr>
									<th>No.</th>
									<th>Product Name</th>
									<th>Quantity Left</th>
								</tr>
							</thead>
							<tbody>
							<?php  

							     $i = 0;
							     $product_stop = 10;
							     $select_latest = "SELECT * FROM product_tbl WHERE prod_qty <= reorder ORDER BY prod_id DESC";
							     $run_latest = mysqli_query($db, $select_latest);
							                        
							     while($row_latest = mysqli_fetch_array($run_latest))
							     {
							       $prod_name    = $row_latest['prod_name'];
							       $prod_qty     = $row_latest['prod_qty'];
							      
							       $i++;

							       if( $i < $product_stop)
							       {
							                          
							                          
							                        
							    ?>

							     <tr>
							     <td><?php echo $i; ?></td>                         
							      <td><?php echo $prod_name; ?></td>
							      <td><?php echo $prod_qty; ?></td>
							     </tr>

							       <?php }                          
							                          
							      else
							      {
							        break;
							      }
							                      

							  } ?>
						 </tbody>
						</table>
					   </div>
				    

					   </div>
				      </div>
				     </div>

				     	<div class="col-md-6 grid-margin">
				     	<div class="card custom-card">
						<div class="card-body">						
						<h5>Products Closer to Expiration & Expired Products</h5> <hr>
						<div class="table-responsive border">
						<table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
							<thead>
								<tr>
									<th>No.</th>
									<th>Product Name</th>
									<th>Expiry Date</th>
								</tr>
							</thead>
							<tbody>
							<?php  

							     $i = 0;
							     $product_stop = 10;
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

						              			
							      
							       $i++;

							      
							       	 if($daysleft <= 60)
						                {
								            echo "
								            <tr>
								            	<td>$i</td>
								                <td>$prod_name</td>
								                <td>$exp_date</td>
								            </tr>
								               ";
						                }
							                          
							                                             
							   
							                      

							  } ?>
						 </tbody>
						</table>
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
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("chart-js/data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                     var marks = [];
                    
                    for (var i in data) {
                        name.push(data[i].type);
                        marks.push(data[i].amount);

                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Products',
                                backgroundColor: '#007bff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: quantit
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
  </script>



		  <script>
	      $("#cash").click(function(){
	          $("#tendered").show('slow');
	          $("#change").show('slow');
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


		<script type="text/javascript" src="autosum.js"></script>
		<!-- Jquery js-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

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

		<!-- Sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Internal Jquery-Ui js-->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!-- Internal Chartjs charts js-->
		<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>
		<script src="assets/js/chart.chartjs.js"></script>

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