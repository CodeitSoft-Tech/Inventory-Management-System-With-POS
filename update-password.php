<?php 

    include("includes/db_conn.php");

    $ErrorReset = array();

   if(isset($_POST['reset']))
   {
   	  $fullname  = mysqli_real_escape_string($db, $_POST['fullname']);
   	  $new_pass  = mysqli_real_escape_string($db, $_POST['new_pass']);
   	  $con_pass  = mysqli_real_escape_string($db, $_POST['con_pass']);

   	  if(empty($fullname) || empty($new_pass) || empty($con_pass))
      {
        if($fullname == "")
        {
          $ErrorReset[] = "Your full name is required";
        }

        if($new_pass == "")
        {
          $ErrorReset[] = "New password field is required";
        }
        if($con_pass == "")
        {
          $ErrorReset[] = "Confirm password field is required";
        }
         if($con_pass != $new_pass)
        {
          $ErrorReset[] = "Passwords do not match";
        }

      }
      else
      {
      	 $query  = "SELECT * FROM admin_tbl WHERE fullname = '$fullname'";
         $Result = mysqli_query($db, $query);

         if(mysqli_num_rows($Result))
         {

      	 	$update = "UPDATE admin_tbl SET admin_password = '$new_pass' WHERE fullname = '$fullname'";
      	 	$run_up = mysqli_query($db, $update);

      	 	echo "<script>alert('Password reset done successfully!')</script>";
      	 	echo "<script>document.location='login.php'</script>";
      	 
         }
         else
         {
            $ErrorReset[] = "Your name does not exists";
         }

      }
      


   }

?>