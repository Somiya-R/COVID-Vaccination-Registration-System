<script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script>  
<?php 
  
session_start(); 
include "config.php";
	$edit_status = false;
	$name="";
	$email="";
	$subject="";
	$message="";
	
	


if (isset($_POST['save_message']))
{
	
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$subject=mysqli_real_escape_string($conn,$_POST['subject']);
	$message=mysqli_real_escape_string($conn,$_POST['message_user']);
	
	

	$sql="INSERT INTO message(`name`, `email`, `subject`,`message_user`)
			VALUES('$name','$email','$subject','$message')";


if (mysqli_query($conn, $sql))
	{
		$_SESSION["message"]="Success";
		$_SESSION["head"]="The Message Was Sent Successfully";
		$_SESSION["msg_type"]="success";

		
	} 
	else 
	{
		$_SESSION["message"]="Wrong!";
		$_SESSION["head"]="Oops!";
		$_SESSION["msg_type"]="error";

	}

	header("location:../index.php?mes=The Message Was Sent Successfully");
}



	
?>