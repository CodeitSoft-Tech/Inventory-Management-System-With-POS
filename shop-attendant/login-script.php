<?php
    
  include("includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['emp_login']))
 {

    $emp_name    = mysqli_real_escape_string($db, $_POST['emp_name']);
    $emp_pass    = mysqli_real_escape_string($db, $_POST['emp_pass']);

      if(empty($emp_name) || empty($emp_pass))
      {
        if($emp_name == "")
        {
          $ErrorLogin[] = "Username is required";
        }

        if($emp_pass == "")
        {
          $ErrorLogin[] = "Password is required";
        }

      }

      else
      {

        $query ="SELECT * FROM tbl_employees WHERE emp_username = '$emp_name'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
         
          $MainSql = "SELECT * FROM tbl_employees WHERE emp_username ='$emp_name' AND emp_password = '$emp_pass'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {

            $value = $MainResult->fetch_assoc();
            $emp_name = $value['emp_username'];
            $emp_id   = $value['emp_id'];
            
            // set session
            $_SESSION['emp_username'] = $emp_name;
            

            $remarks = "has logged into the system at";  
            mysqli_query($db,"INSERT INTO history_log(emp_id, action, log_date) VALUES('$emp_id','$remarks', NOW())")or die(mysqli_error($db));

            echo "<script>alert('Login successful. Welcome!')</script>";
            echo "<script>document.location='pos.php'</script>";

          } 
          else
          {
            $ErrorLogin[] = "Incorrect username/password combination";
          }

        }

        else
        {
          $ErrorLogin[] = "Username does not exists";
        }

        
      }

      }


?>