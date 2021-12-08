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
								<h2 class="main-content-title tx-24 mg-b-5">History Log</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Employees History Log</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<!-- Row -->
										<div class="row row-sm">
											<div class="col-lg-12">
												<div class="card custom-card">
													<div class="card-body">
														<div class="table-responsive border">
															<table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
																<thead>
																	<tr>
																		<th>Employees History Log</th>
																	</tr>
																</thead>
																<tbody>
																<?php
				                      		
										                      		$query = mysqli_query($db,"select * from history_log natural join tbl_employees order by log_date desc")or die(mysqli_error());
										                      		while($row=mysqli_fetch_array($query))
										                      		{
				                      		
				                      							?>

				                      							<tr>
										                        <td><?php echo $row['fullname']." ".$row['action']." last ".date("M d, Y h:i a",strtotime($row['log_date'])); ?></td>
										                       
										                      </tr>
																<?php } ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Row -->
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