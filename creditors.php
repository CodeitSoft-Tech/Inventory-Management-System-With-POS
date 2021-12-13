<?php 

	include("includes/header.php");


		if(!isset($_SESSION['admin_username']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {


?>

<style type="text/css">
	
      @media print {
          .btn-print {
            display:none !important;
		  }

		  .main-footer	{
			display:none !important;
		  }

		  .box.box-primary {
			  border-top:none !important;
		  }

		  .angel{
			  display:none !important;
		  }
      
</style>

      <!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header btn-print">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Creditors</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Creditors Menu</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12 btn-print">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-gray-800">
									  Creditors Menu
									</div>
									<div class="card-body">

											<div class="row row-sm">
							
							<div class="col-md">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">Creditor POS</h5>
										<hr>
										<a class="card-link btn btn-white" href="creditor-pos.php">Click here</a>
									</div>
								</div>
							</div>

							<div class="col-md">
								<div class="card bg-gray-800 tx-white custom-card">
									<div class="card-body">
										<h5 class="main-content-label tx-dark tx-medium mg-b-10">Creditor Details</h5>
										<hr>
										<a class="card-link btn btn-white" href="creditor-details.php">Click here</a>
									</div>
								</div>
							</div>

							
						</div>
								
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
				</div>
			</div>
			<!-- End Main Content-->



<?php 
  
  include("includes/footer.php"); 

?>
<?php } ?>