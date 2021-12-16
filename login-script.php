<?php
    
  include("includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['admin_login']))
 {

    $admin_name    = mysqli_real_escape_string($db, $_POST['admin_name']);
    $admin_pass    = mysqli_real_escape_string($db, $_POST['admin_pass']);

      if(empty($admin_name) || empty($admin_pass))
      {
        if($admin_name == "")
        {
          $ErrorLogin[] = "Username is required";
        }

        if($admin_pass == "")
        {
          $ErrorLogin[] = "Password is required";
        }

      }

      else
      {
      
        $query ="SELECT * FROM admin_tbl WHERE admin_username = '$admin_name'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
        
          $MainSql = "SELECT * FROM admin_tbl WHERE admin_username ='$admin_name' AND admin_password = '$admin_pass'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {
            $value = $MainResult->fetch_assoc();
            $admin_name = $value['admin_username'];
            $admin_id   = $value['admin_id'];
            
            // set session
            $_SESSION['admin_username'] = $admin_name;
            

            $remarks = "has logged into the system at";  
            mysqli_query($db,"INSERT INTO history_log(admin_id, action, log_date) VALUES('$admin_id','$remarks', NOW())")or die(mysqli_error($db));

            echo "<script>


                $('#swal-success').click(function () {
                  swal(
                    {
                      title: 'Login successful!',
                      type: 'success',
                      confirmButtonColor: '#57a94f'
                    }
                  )
                });

            </script>";
            echo "<script>document.location='pos.php'</script>";

          } 
          else
          {
            $ErrorLogin[] = "Incorrect username/password combination";
          }

        }

        else
        {
          $ErrorLogin[] = "username does not exists";
        }

        
      }

      }


?>