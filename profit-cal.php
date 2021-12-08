<?php 


	  include("includes/header.php"); 
	  include("profitCal.php");

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
								<h2 class="main-content-title tx-24 mg-b-5">Profit Calculator</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Gross Profit</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<h4 class="mt-4 col-md-6">Gross Profit Calculator</h4>
									<hr class="mb-4">
									<div class="card-body">
									 <form method="post" action="profit-cal.php" enctype="multipart/form-data">
						                <div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<div class="">
													
													<div class="row">
													
														<div class="form-group col-md-6">
														<label class=""> Net Sales </label>
														 <input type="text" class="form-control" name="net_sales" placeholder="Net Sales(₵)" value="<?php echo isset($_POST['net_sales']) ? $_POST['net_sales'] : '' ?>" required>
													    </div>

													    <div class="form-group col-md-6">
														<label class=""> Cost of Goods Sold </label>
														<input class="form-control" required="" placeholder="COGS(₵)" value="<?php echo isset($_POST['goods_cost']) ? $_POST['goods_cost'] : '' ?>" name="goods_cost" type="text">
													    </div>


													    <div class="form-group col-md-6">
														<label class=""> Expenses </label>
														<input class="form-control" required="" placeholder="Expenses(₵)" value="<?php echo isset($_POST['expenses']) ? $_POST['expenses'] : '' ?>" name="expenses" type="text">
													    </div> 

													     <div class="form-group col-md-6">
														<label class=""> Date </label>
														<input class="form-control" required="" value="<?php echo isset($_POST['profit_date']) ? $_POST['profit_date'] : '' ?>" name="profit_date" type="date">
													    </div> 

												</div>


												   <div class="form-group">
												   	<textarea name="result" class="form-control" style="width: 65%; height: 150px; box-sizing:border-box; text-align: center; border: 2px solid #ccc; border-radius: 4px; background-color: #f8f8f8;resize: none; margin-left: 150px;">
												   		 <?php 
								                            
								                            echo $total; 

								                          ?>
												   	</textarea>
												   </div>
													

													
													<div class="row">
												    <div class="form-group col-md-4">
												   	 <button class="btn ripple btn-primary" name="cal-profit" type="submit">Calculate Profit</button>
												   	 <button class="btn ripple btn-primary" name="save-profit" type="submit">Save Profit</button>
												   </div>
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