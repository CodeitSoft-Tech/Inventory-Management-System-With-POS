<?php

    session_start();
    require("fpdf182/fpdf.php");
    include_once "includes/db_conn.php";

 

                                    
       $username  =  $_SESSION['emp_username'];
       $get_ad    = "SELECT * FROM tbl_employees WHERE emp_username = '$username'";
       $run_ad    = mysqli_query($db, $get_ad);
       $row_ad    = mysqli_fetch_array($run_ad);
       $fullname  = $row_ad['fullname'];

       $query = mysqli_query($db, "select * from tbl_cred_sales order by sales_id desc LIMIT 0,1")or die(mysqli_error($db));          
       $row = mysqli_fetch_array($query);
                                             
       $sales_id = $row['sales_id']; 
       $sid      = $row['sales_id'];
       $due      = $row['amount_due'];
       $discount = $row['discount'];
       $grandtotal = $due - $discount;
       $tendered = $row['cash_tendered'];
       $change   = $row['cash_change'];
       $date     = $row['date_added'];
       $pymt_mode = $row['modeofpayment'];

       $query1 = mysqli_query($db, "select * from tbl_cred_payment where sales_id='$sales_id'")or die(mysqli_error($db));
       $row1 = mysqli_fetch_array($query1);


       $queryb    = "SELECT * FROM tbl_shop_details";
       $runb      = mysqli_query($db, $queryb);
       $rowb      = mysqli_fetch_array($runb);
       $address   = $rowb['address'];
       $phone     = $rowb['phone_number'];
       $date      = date("M d, Y h:i a",strtotime($date));




       $image = "images/callin.jpg";






                                              
                            
                             
                              
                               

$pdf = new FPDF ('P','mm',array(120,145));
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);

$pdf->Cell(60,8,'CALL IN VENTURES',1,1,'C');
$pdf->SetFont('Arial','B',8);

//Line break
$pdf->Ln(1);

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Address: ',0,0,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(10,4,$address,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Contact: ',0,0,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(10,4,$phone,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Date/TIme: ',0,0,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(10,4,$date,0,1,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(20,4,'Cashier: ',0,0,'');

$pdf->SetFont('Arial','BI',8);
$pdf->Cell(10,4,$fullname,0,1,'');

//Line break
$pdf->Ln(1);

$pdf->SetX(7);
$pdf->SetFont('Courier','B',8);
$pdf->SetFillColor(67, 187, 70);
$pdf->SetFillColor(238,238,238);
$pdf->Cell(34,5,'ITEMS',0,0,'L', true); //100
$pdf->Cell(15,5,'QTY',0,0,' L', true);
$pdf->Cell(16,5,'TOTAL',0,1,'L', true);

$query = mysqli_query($db,"select * from tbl_sales_details_cred natural join product_tbl where sales_id ='$sid'")or die(mysqli_error($db));
$grand = 0;
                                              
while($row = mysqli_fetch_array($query))
{
    $total = $row['qty'] * $row['price'];
    $grand = $grand + $total; 
    $product_name = $row['prod_name'];
    $quantity = $row['qty'];
    $price    = $row['price'];

    $pdf->SetX(7);   
    $pdf->SetFont('Helvetica','B',7);
    $pdf->Cell(34,5,$product_name,0,0,'L'); //100
    $pdf->Cell(15,5,$quantity,0,0,'L');
    $pdf->Cell(16,5,number_format($total,2),0,1,'L');
        
}


//Line break
$pdf->Ln(1);

$pdf->SetX(7);
$pdf->SetFont('courier','B',8);
$pdf->Cell(0.01,5,'',0,0,'L'); //100
$pdf->Cell(49,5,'SUB-TOTAL',0,0,'L', true);
$pdf->Cell(16,5,number_format($grand,2),0,1,'L', true);

$pdf->SetX(7);
$pdf->SetFont('courier','B',8);
$pdf->Cell(0.01,5,'',0,0,'L'); //100
$pdf->Cell(49,5,'DISCOUNT',0,0,'L', true);
$pdf->Cell(16,5,number_format($discount,2),0,1,'L', true);


$pdf->SetX(7);
$pdf->SetFont('courier','B',8);
$pdf->Cell(1,5,'',0,0,'L', true); //100
$pdf->Cell(48,5,'AMOUNT PAID',0,0,'L',true);
$pdf->Cell(16,5,number_format($tendered,2),0,1,'L',true);

$pdf->SetX(7);
$pdf->SetFont('courier','B',8);
$pdf->Cell(1,5,'',0,0,'L',true); //100
$pdf->Cell(48,5,'AMOUNT LEFT',0,0,'L',true);
$pdf->Cell(16,5,number_format($change,2),0,1,'L',true);

$pdf->SetX(7);
$pdf->SetFont('courier','B',10);
$pdf->Cell(1,5,'',0,0,'L',true); //100
$pdf->Cell(48,5,'TOTAL',0,0,'L',true);
$pdf->Cell(16,5,number_format($grand-$discount,2),0,1,'L',true);

$pdf->SetX(7);
$pdf->SetFont('courier','B',8);
$pdf->Cell(1,5,'',0,0,'L',true); //100
$pdf->Cell(48,5,'PAYMENT MODE',0,0,'L',true);
$pdf->Cell(16,5,$pymt_mode,0,1,'L',true);


$pdf->Cell(20,5,'',0,1,'');

$pdf->SetX(7);
$pdf->SetFont('Courier','B',8);
$pdf->Cell(65,5,'Thank you!',0,1,'C');//100
$pdf->SetX(7);
$pdf->Cell(20,7,'-------------------------------------',0,1,'');

$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(75,3,'Developed By : SPM Sparrow Multimedia',0,1,'');

$pdf->SetX(7);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(75,3,'Contact Us:    0542686544',0,1,'');

//$pdf->Image($image,50,50);

//$pdf->SetX(7);
//$pdf->Cell(20,7,'',0,1,'');
//$pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 20.78);
$pdf->Image($image,25, 120, 29, 15, 'JPG', '', 1, 1, 'C');

$pdf->Output();
?>