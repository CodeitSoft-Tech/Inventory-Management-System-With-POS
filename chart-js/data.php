<?php
    
    header('Content-Type: application/json');

    $db = mysqli_connect("localhost","root","","store_db");

    $sqlQuery = "SELECT * FROM tbl_sales_details";
    $result = mysqli_query($db, $sqlQuery);
    $row = mysqli_fetch_array($result);
    $prod_id   = $row['prod_id'];
    $qty       = $row['qty']; 
    //$donation_date = date("M d, Y",strtotime($row['date_donated']));

    $data = array();
    foreach ($result as $row) {
      $data[] = $row;
    }

    mysqli_close($db);

    echo json_encode($data);
    
?>