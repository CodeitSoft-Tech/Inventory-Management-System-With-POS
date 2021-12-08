<?php

    session_start();
    include("includes/db_conn.php");

    $username = $_SESSION['admin_username'];
    $get_ad   = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
    $run_ad   = mysqli_query($db, $get_ad);
    $row_ad   = mysqli_fetch_array($run_ad);
    $admin_id = $row_ad['admin_id'];

    $remarks  = "has logged out of the system at ";  
    mysqli_query($db, "INSERT INTO history_log(admin_id, action, log_date)VALUES('$admin_id', '$remarks', NOW())")or die(mysqli_error($db));
    
    session_destroy();
 
    echo "<script>document.location='login.php'</script>";

?>