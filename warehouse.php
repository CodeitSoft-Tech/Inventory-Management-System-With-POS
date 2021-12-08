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
									<li class="breadcrumb-item active" aria-current="page">Warehouse</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-gray-800">
									  Warehouse Menu
									</div>
									<div class="card-body">
										<!-- Row -->
						<div class="row row-sm">
							
							<div class="col-md-4">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">Add Product To Warehouse</h5>
										<hr>
										<a class="card-link btn btn-white" href="add-prod-warehouse.php">Click here</a>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">View Warehouse Products</h5>
										<hr>
										<a class="card-link btn btn-white" href="view-prod-warehouse.php">Click here</a>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">Move Products To Store</h5>
										<hr>
										<a class="card-link btn btn-white" href="move-prod-warehouse.php">Click here</a>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">View Products Moved To Store</h5>
										<hr>
										<a class="card-link btn btn-white" href="view-moved-prod.php">Click here</a>
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">Warehouse Report</h5>
										<hr>
										<a class="card-link btn btn-white" href="warehouse-report.php">Click here</a>
									</div>
								</div>
							</div>

						</div>

							
						</div>
						<!--End Row -->
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->


<?php 
  
  include("includes/footer.php"); 

?>
<?php } ?>