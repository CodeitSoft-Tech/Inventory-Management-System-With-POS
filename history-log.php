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
									<li class="breadcrumb-item active" aria-current="page">History Log</li>
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
													<div class="col-md-9">
													<form method="post" action="">
														   
															<button name="btn" type="submit" class="btn btn-primary mb-4 mt-4">Click to delete after 30 days</button>
														</form>
													    </div>
												
													<div class="card-body">
														<div class="table-responsive border">
															
															<table class="table text-nowrap text-md-nowrap table-striped mg-b-0">
																<thead>
																	<tr>
																		<th>History Log</th>
																	</tr>
																</thead>
																<tbody>
																<?php
				                      		
										                      		$query = mysqli_query($db,"select * from history_log natural join admin_tbl order by log_date desc")or die(mysqli_error());
										                      		while($row = mysqli_fetch_array($query))
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
<?php 
	
	if(isset($_POST['btn']))
	{
		$del = "DELETE FROM history_log WHERE DATE_FORMAT(log_date, '%m/%d/%Y') < DATE_SUB(NOW(), INTERVAL 30 DAY)";
	    $run = mysqli_query($db, $del);


	    if($run)
	    {
	    	echo "<script>alert('Done!')</script>";
	    	echo "<script>document.location='history-log.php'</script>";
	    }
	}

?>

<?php } ?>

