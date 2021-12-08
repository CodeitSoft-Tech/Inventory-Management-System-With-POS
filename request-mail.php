<?php  

	include("includes/db_conn.php");

	if(isset($_POST['send-mail']))
	{

		$sup_email = mysqli_real_escape_string($db, $_POST['sup_email']);
		$prod_name = mysqli_real_escape_string($db, $_POST['prod_name']);
		$qty       = mysqli_real_escape_string($db, $_POST['qty']);


		$headers = "From: francistawiah11@gmail.com";
		
		$to      = $sup_email;
		//$from    = "francistawiah11@gmail.com";
		$subject = "Product Request";
		$body    = "Callin Ventures is requesting for $qty  of  $prod_name";

		mail($to, $subject, $body, $headers);

		
	}

?>