<script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script>  
<?php 
  
session_start(); 
include "config.php";
$edit_status = false;
$name = "";
$user_name = "";
$password = "";
$user_type = "user";


if (isset($_POST['save_user']))
{
	
	$name=mysqli_real_escape_string($conn,$_POST['uname']);
	$user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	

	$sql="INSERT INTO user(`name`, `user_name`, `password`,`user_type`)
			VALUES('$name','$user_name','$password','$user_type')";


if (mysqli_query($conn, $sql))
	{
		$_SESSION["message"]="Success";
		$_SESSION["head"]="The Record Was Saved Successfully";
		$_SESSION["msg_type"]="success";

		
	} 
	else 
	{
		$_SESSION["message"]="Wrong!";
		$_SESSION["head"]="Oops!";
		$_SESSION["msg_type"]="error";

	}

	header("location:users.php");
}


if (isset($_GET["edit_id"])) 
	{
		$id = $_GET["edit_id"];
		$edit_status=true;

		$result=mysqli_query($conn,"select * from user where id='$id'");
		$num_row = mysqli_num_rows($result);
		if ($num_row==1) {
			$row=mysqli_fetch_array($result);
         
            $name=$row["name"];
            $user_name=$row['user_name']; 
            $password=$row['password']; 
         
		}

	}


	if (isset($_POST["edit_user"]))
	{
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$name=mysqli_real_escape_string($conn,$_POST['uname']);
    $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

		$update_sql = "UPDATE user SET `name`='$name',`user_name`='$user_name',`password`='$password' WHERE id=$id";
	
		mysqli_query($conn,$update_sql);

			$_SESSION["message"]="Success";
			$_SESSION["head"]="The Record Was Update Successfully";
			$_SESSION["msg_type"]="success";

			header("location:users.php");

		}
	
?>