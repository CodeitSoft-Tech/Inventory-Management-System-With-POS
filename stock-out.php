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
								<h2 class="main-content-title tx-24 mg-b-5">Stocks</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Stock Out</li>
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
											<table class="table" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">Product Name</th>
														<th class="wd-15p">Quantity Left</th>	
														<th class="wd-20p">Supplier</th>
													    <th class="wd-15p">Stock Status</th>
														<!--<th class="wd-15p">Action</th> -->
													</tr>
												</thead>
												<tbody>
													<?php 

													$get_prod = "SELECT * FROM product_tbl WHERE prod_qty <= reorder";
													$run_prod = mysqli_query($db, $get_prod);

													while($row_prod = mysqli_fetch_array($run_prod))
													{
														$prod_id 	= $row_prod['prod_id'];
														$prod_name 	= $row_prod['prod_name'];
														$sup_id		= $row_prod['supplier_id'];
														$qty 		= $row_prod['prod_qty'];
														$status     = $row_prod['prod_status'];
														$reorder    = $row_prod['reorder'];


														// Get Supplier
														$get_sup 	= "SELECT * FROM tbl_suppliers WHERE sup_id = '$sup_id'";
														$run_sup 	= mysqli_query($db, $get_sup);
														$row_sup 	= mysqli_fetch_array($run_sup);
														$sup_name 	= $row_sup['sup_name'];
														$sup_email 	= $row_sup['sup_email'];


													?>
													<tr>
														<td><?php echo $prod_name; ?></td>
														<td><?php echo $qty; ?></td>
														<td><?php echo $sup_name; ?></td>
														<td>
														<?php 

															if($qty == $reorder)
															{
																echo "<span class='badge badge-danger'>Low Stock</span>";
															}
															elseif($qty < 0)
															{
																echo "<span class='badge badge-danger'>Stock Out</span>";
															}
															else
															{
																echo "<span class='badge badge-success'>In Stock</span>";	
															}


														?>	
														</td>
														<!--<td>
														
														<a class="btn ripple btn-primary" data-target="#delete<?php echo $prod_id; ?>" data-toggle="modal" href="#delete<?php echo $prod_id; ?>">Make A Request</a>

														</td> -->

													</tr>

		

			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $prod_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Product Request</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="request-mail.php" method="post">
								 <div class="form-group">
								 	<label>Supplier Email</label>
								 <input type="email" class="form-control" name="sup_email" value="<?php echo $sup_email; ?>" required> 
                      			</div>

                      			<div class="form-group">
								 	<label>Product Name</label>
								 <input type="text" class="form-control" name="prod_name" value="<?php echo $prod_name; ?>" required> 
                      			</div>

                      			<div class="form-group">
								 	<label>Quantity Needed</label>
								 <input type="text" class="form-control" name="qty" required> 
                      			</div>
                                
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" name="send-mail" type="submit">Submit</button>
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
						</div>
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->


<?php  include("includes/footer.php"); ?>
<?php } ?>