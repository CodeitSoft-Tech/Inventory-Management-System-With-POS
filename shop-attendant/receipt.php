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

		<!-- Internal Specturm-color picker css-->
		<link href="assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<!-- Internal Ion.rangeslider css-->
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">


		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	</head>
	<style type="text/css">
     
      @media print {
          .btn-print {
            display:none !important;
          }
      }

     
      .btn-back
      {
          background: #6259CA;
          padding: 10px;
          margin-left: 280px;
          border-radius: 5px;
          color: #fff;
          font-size: 15px;

      }

    

      .btn-display
      {
          background: #6259CA;
          padding: 10px;
          border-radius: 5px;
          color: #fff;
          font-size: 15px;

      }

      .btn-display:hover
      {
         background: #6259CA;
         color: #fff;
         border: 1px solid #6259CA;
      }

      .btn-prt
      {
          background: #6259CA;
          text-decoration: ;
          padding: 10px;
          margin-top: 40px;
          border-radius: 5px;
          color: #fff;
          font-size: 15px;
      }

     

    .box
     {
        border-top: 5px solid #6259CA;
        border-left: 4px solid #e3e3e3; 
        border-right: 4px solid #e3e3e3; 
        border-bottom: 4px solid #e3e3e3; 
     }

     .select2
     {
       border: 1px solid #6259CA;
     }

    .content-cus
    {
      position: relative;
      top: 30px;
    }

    /* Receipt  */
#invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}


#invoice-POS::selection{
  background: #f31544;
  color: #FFF;
}
#invoice-POS::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: 0.9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: 0.7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 60px;
  width: 60px;
  background-size: 60px 60px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: 0.5em;
  background: #EEE;

}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
  padding: 5px;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: 0.5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
  text-align: center;
}
  

    </style>

	<body class="horizontalmenu" onload="myFunction()">
		<!-- Loader --> 
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		 <!-- End Loader -->

		<!-- Page -->
		<div class="page">
			<!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header no-print">
							<div>
							
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<!-- Receipt Form -->

								 <form method="post" action="">
					                  <?php

					                
					                      $username  =  $_SESSION['emp_username'];
					                      $get_ad    = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
										            $run_ad    = mysqli_query($db, $get_ad);
										            $row_ad    = mysqli_fetch_array($run_ad);
										            $fullname  = $row_ad['fullname'];

					 
					                      $query = mysqli_query($db, "select * from tbl_sales order by sales_id desc LIMIT 0,1")or die(mysqli_error($db));
					                        
					                          $row = mysqli_fetch_array($query);
					                         
					                          $sales_id = $row['sales_id']; 
					                          $sid      = $row['sales_id'];
					                          $due      = $row['amount_due'];
					                          $discount = $row['discount'];
					                          $grandtotal = $due - $discount;
					                          $tendered = $row['cash_tendered'];
					                          $change   = $row['cash_change'];
					                          $date     = $row['date_added'];

					                         $query1 = mysqli_query($db, "select * from tbl_payment where sales_id='$sales_id'")or die(mysqli_error($db));
					                         $row1 = mysqli_fetch_array($query1);

					                  ?>    
					                  
					  <div id="invoice-POS">
					    
					    <center id="top">
					      <div class="logo"></div>
					      <div class="info"> 
					        <h2>Callin Ventures</h2>
					      </div><!--End Info-->
					    </center><!--End InvoiceTop-->
					    
					    <div id="mid">
					      <div class="info">
					      	<?php 
					             $queryb    = "SELECT * FROM tbl_shop_details";
					             $runb      = mysqli_query($db, $queryb);
					             $rowb      = mysqli_fetch_array($runb);
					                          
					         ?>   		
					        <p class="mt-2"> 
					           <ul style="list-style: none; padding: 0; font-size: 9px;">
					            <li> Address : <?php echo $rowb['address'];?> </li>
					            <li> Phone   : <?php echo $rowb['phone_number'];?></br> </li>
					            <li> Date/Time: <?php echo date("M d, Y h:i a",strtotime($date)); ?></br> </li>
					            </ul>
					        </p>
					      </div>
					    </div><!--End Invoice Mid-->
					    
					    <div id="bot">

					          <div id="table">
					            <table>
					              <tr class="tabletitle">
					                <td class="item"><h2>Item</h2></td>
					                <td class="Hours"><h2>Qty</h2></td>
					                <td class="Rate"><h2>Sub Total</h2></td>
					              </tr>

					                  <?php
					                          
					                          $query = mysqli_query($db,"select * from tbl_sales_details natural join product_tbl where sales_id ='$sid'")or die(mysqli_error($db));
					                          
					                          $grand = 0;
					                          
					                          while($row = mysqli_fetch_array($query))
					                          {
					                              $total = $row['qty'] * $row['price'];
					                              $grand = $grand + $total;       
					                  ?>
					              <tr class="service">
					                <td class="tableitem"><p class="itemtext"><?php echo $row['prod_name'];?></p></td>
					                <td class="tableitem"><p class="itemtext"><?php echo $row['qty'];?></p></td>
					                <td class="tableitem"><p class="itemtext">₵<?php echo number_format($total,2);?></p></td>
					              </tr>
					              <?php } ?>  
					              
					              <tr class="tabletitle">
					                <td></td>
					                <td class="Rate"><h2>Sub-total</h2></td>
					                <td class="payment"><h2>₵<?php echo number_format($grand,2);?></h2></td>
					              </tr>	

					              <tr class="tabletitle">
					                <td></td>
					                <td class="Rate"><h2>Discount</h2></td>
					                <td class="payment"><h2>₵<?php echo number_format($discount,2);?></h2></td>
					              </tr>

					              <tr class="tabletitle">
					                <td></td>
					                <td class="Rate"><h2>Cash Tendered</h2></td>
					                <td class="payment"><h2>₵<?php echo number_format($tendered,2);?></h2></td>
					              </tr>

					              <tr class="tabletitle">
					                <td></td>
					                <td class="Rate"><h2>Change</h2></td>
					                <td class="payment"><h2>₵<?php echo number_format($change,2);?></h2></td>
					              </tr>

					              <tr class="tabletitle">
					                <td></td>
					                <td class="Rate"><h2>Total</h2></td>
					                <td class="payment"><h2>₵<b><?php echo number_format($grand-$discount,2);?></b></h2></td>
					              </tr>

					            </table>
					          </div><!--End Table-->

					          <div id="legalcopy">
					          	<p class="legal"><strong>Issued By: <span style="padding-right:10px;"> <?php echo $fullname; ?> </span></strong>
					            <p class="legal"><strong>Thank you !</strong>  
					            </p>
					          </div>

					        </div><!--End InvoiceBot-->
					  </div><!--End Invoice-->



					                   </div>
					        				  </div>  
					        				</form>
                

										<!-- Recipt Form End -->
									</div>
									<div style="padding-bottom: 40px;">
				                <a class="btn-back btn-print" style="color: #fff;" onclick="doPrint();"><i class ="fa fa-print text-white"></i> Print</a>
				                <a class="btn-prt btn-print" href ="pos.php"><i class ="fa fa-arrow-left"></i> Back to Sales Point</a></div>
              </div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->



		

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

      <script>
		function doPrint() {
			window.print();            
			window.location.href = "pos.php"; 
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