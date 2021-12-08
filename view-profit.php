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
								<h2 class="main-content-title tx-24 mg-b-5">Profits</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Profits</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table" id="exportexample">
												<thead>
													<tr>
														<th class="wd-20p">Net Sales</th>
														<th class="wd-15p">Cost of Goods Sold</th>	
														<th class="wd-20p">Expenses</th>
														<th class="wd-20p">Gross Profit</th>
														<th class="wd-15p">Date</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$get_prof = "SELECT * FROM tbl_profit";
													$run_prof = mysqli_query($db, $get_prof);

													while($row_prof = mysqli_fetch_array($run_prof))
													{
														$net_sales 		= $row_prof['net_sales'];
														$cogs  	        = $row_prof['cogs'];
														$expenses		= $row_prof['expenses'];
														$gross_profit	= $row_prof['gross_profit'];
														$profit_date    = $row_prof['profit_date'];
														
													?>
													<tr>
														<td>₵<?php echo number_format($net_sales,2); ?></td>
														<td>₵<?php echo number_format($cogs, 2); ?></td>
														<td>₵<?php echo number_format($expenses, 2); ?></td>
														<td>₵<?php echo number_format($gross_profit, 2); ?></td>
														<td><?php echo date("M d, Y",strtotime($profit_date)); ?></td>
														
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
			<!-- End Main Content-->


<?php  include("includes/footer.php"); ?>
<?php } ?>